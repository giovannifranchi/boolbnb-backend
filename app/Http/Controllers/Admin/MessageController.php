<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request)
    {

        $newMessage = Message::where('apartment_id', $request->apartment_id)->get();

        return view('admin.messages.index', compact('apartments', 'message'));
    }


    public function destroy($id){
        $message = Message::where('id', $id)->first();
        $message->delete();
        
    }
}
