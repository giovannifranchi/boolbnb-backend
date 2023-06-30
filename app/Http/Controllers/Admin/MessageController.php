<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Apartment $apartment)
    {

        $newMessages = Message::where('apartment_id', $apartment->id)->get();

        return view('admin.messages.index', compact( 'apartment' ,'newMessages'));
    }


    public function destroy($id, Apartment $apartment){

        $message = Message::where('id', $id)->first();
        $message->delete();

        $newMessages = Message::where('apartment_id', $apartment->id)->get();

        return view('admin.messages.index', compact('apartment', 'newMessages'));
    }
}
