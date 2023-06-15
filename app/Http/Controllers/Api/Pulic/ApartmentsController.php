<?php

namespace App\Http\Controllers\Api\Pulic;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;

// work on accessors to sanitize response cleand the pivot entity

class ApartmentsController extends Controller

{
    public function index(){
        $apartments = Apartment::with(['services', 'user', 'plans', 'messages', 'views'])->get();

        return response($apartments);
    }
}
