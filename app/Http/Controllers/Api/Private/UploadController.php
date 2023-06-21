<?php

namespace App\Http\Controllers\Api\Private;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request){

        return response()->json([
            'message'=>'ok',
        ]);
    }
}
