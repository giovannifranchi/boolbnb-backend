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
        $apartments = Apartment::with('images')->get();

        return response($apartments, 200);
    }

    public function highlighted()
    {
        $now = Carbon::now();

        // $apartments = Apartment::all();

        // $highlightedApartments = [];

        // foreach($apartments as $apartment){

        //     $expirationDates = $apartment->plans()->pluck('expire_date')->toArray();

        //     if(!empty($expirationDates)){

        //         $expirationDate = max($expirationDates);
        //         if($expirationDate > $now){
        //             array_push($highlightedApartments, $apartment);
        //         }
        //     }
        // }

        $highlightedApartments = Apartment::whereHas('latestPlan', function ($query) use ($now) {
            $query->where('expire_date', '>', $now);
        })
        ->with(['services'])
        ->get();
    

        return response($highlightedApartments, 200);
    }

    public function show($id)
    {
        $apartments = Apartment::with('views', 'images', 'services', 'tags', 'plans', 'user')->where('id', $id)->first();
        if ($apartments) {
            return response($apartments, 200);
        } else {
            return response(['error'=>'apartment not found'], 404);
        }
    }

    public function search(){
        
    }
}
