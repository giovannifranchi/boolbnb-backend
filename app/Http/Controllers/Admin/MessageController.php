<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index($id)
    {
       
       
        $newMessages = Message::where('apartment_id', $id)->get();

        return view('admin.messages.index', compact( 'newMessages'));
    }


    public function destroy($id){
        $message = Message::where('id', $id)->first();
        $message->delete();
    }
}
