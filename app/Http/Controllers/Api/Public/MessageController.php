<?php

namespace App\Http\Controllers\Api\Public;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request){

        $newMessage = new Message();

        $newMessage->name = $request['name'];
        $newMessage->lastname = $request['lastname'];
        $newMessage->email  = $request['email'];
        $newMessage->text = $request['text'];
        $newMessage->apartment_id = $request['apartment_id'];
        $newMessage->save();

        return response()->json([
            'message' => 'message sent successfully'
        ]);
    }
}
