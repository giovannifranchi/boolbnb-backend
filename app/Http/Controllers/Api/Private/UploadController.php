<?php

namespace App\Http\Controllers\Api\Private;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        if($request->hasFile('image')){
            try {
                $file = $request->file('image');
                $path = $file->store('images', 'public');
                
                return response()->json([
                    'message'=>'file uploaded successfully',
                    'path' => asset("storage/".$path),
                ], 200);
                
            } catch(\Exception $e) {
                return response()->json([
                    'message'=>$e->getMessage()
                ]);
            }
        }
    }
     
    
}
