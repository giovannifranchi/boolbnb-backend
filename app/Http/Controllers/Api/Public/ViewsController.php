<?php

namespace App\Http\Controllers\Api\Public;

use App\Http\Controllers\Controller;
use App\Models\View;
use Illuminate\Http\Request;

class ViewsController extends Controller
{
    public function store(Request $request, $id){
        
        $ip = $request->ip();

        $view = new View();

        $view->apartment_id = $id;
        $view->ip_address = $ip;

        $view->save();

        return response('ok', 201);
    }
}
