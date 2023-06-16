<?php

namespace App\Http\Controllers\Api\Public;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
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
        // $apartments = Apartment::all()->where()
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
