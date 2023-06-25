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

        $user = $request->user();
        $apartments = Apartment::where('user_id', $user->id)->orderBy('created_at', 'DESC')->get();
        $message = Message::all();
        

        return view('admin.messages.index', compact('apartments', 'message'));
    }
}
