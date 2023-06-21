<?php

namespace App\Http\Controllers\Api\Public;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Carbon\Carbon;
use Illuminate\Http\Request;

// work on accessors to sanitize response cleand the pivot entity

class ApartmentsController extends Controller

{
    public function index()
    {
        $apartments = Apartment::where('is_visible', true)->with('images')->get();

        return response($apartments, 200);
    }

    public function highlighted()
    {
        $now = Carbon::now();

        $highlightedApartments = Apartment::whereHas('latestPlan', function ($query) use ($now) {
            $query->where('expire_date', '>', $now);
        })
        ->with(['services', 'images'])
        ->get();
    

        return response($highlightedApartments, 200);
    }

    public function show($id)
    {
        $apartments = Apartment::with('views', 'images', 'services', 'tags', 'plans', 'user')->where('id', $id)->first();
        if ($apartments && $apartments->is_visible) {
            return response($apartments, 200);
        } else {
            return response(['error'=>'apartment not found'], 404);
        }
    }

    public function search(Request $request){

        $filteredByDistance  = Apartment::closeTo($request->latitude, $request->longitude, $request->radius);
    
        if($request->has('minPrice') && $request->has('maxPrice')){
            $filteredByDistance = $filteredByDistance->priceRange($request->minPrice, $request->maxPrice);
        }
    
        $apartments = $filteredByDistance->get();
    
        return response($apartments, 200);
        // return response($request);
    }
}
