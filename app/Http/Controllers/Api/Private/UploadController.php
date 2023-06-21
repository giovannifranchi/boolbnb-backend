<?php

namespace App\Http\Controllers\Api\Private;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        if($request->hasFile('images')){
            try {
                $paths = [];
                $files = $request->file('images');
                foreach($files as $file) {
                    $path = $file->store('images', 'public');
                    $paths[] = asset("storage/".$path);
                }
                
                return response()->json([
                    'message'=>'files uploaded successfully',
                    'paths' => $paths
                ], 200);
                
            } catch(\Exception $e) {
                return response()->json([
                    'message'=>$e->getMessage()
                ]);
            }
        }
    }
    
    
     
    
}
