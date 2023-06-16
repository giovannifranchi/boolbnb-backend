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
        $apartments = Apartment::with('views', 'images', 'services', 'tags', 'plans', 'user')->get();



        return response()->json([
            'success' => true,
            'results' => $apartments

        ]);
    }

    public function highlighted()
    {
        $now = Carbon::now();

        $apartments = Apartment::all();

        $highlightedApartments = [];

        foreach($apartments as $apartment){

            $expirationDates = $apartment->plans()->pluck('expire_date')->toArray();

            if(!empty($expirationDates)){

                $expirationDate = max($expirationDates);
                if($expirationDate > $now){
                    array_push($highlightedApartments, $apartment);
                }
            }
        }

        return response($highlightedApartments, 200);
    }

    public function show(Request $request)
    {
        $apartments = Apartment::with('views', 'images', 'services', 'tags', 'plans', 'user')->where('id', $request['id'])->get();
        if ($apartments) {
            return response()->json([
                'success' => true,
                'results' => $apartments
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => null
            ], 404);
        }
    }
}
