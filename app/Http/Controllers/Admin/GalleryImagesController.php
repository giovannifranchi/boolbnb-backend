<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Image;
use Illuminate\Http\Request;

class GalleryImagesController extends Controller
{
    public function index($apartment)
    {

        $images = Image::where('apartment_id', $apartment)->get();
        return view ('admin.gallery.index', compact('images'));
    }

    public function store (Request $request)
    {
        $name = $request->file('image')->getClientOriginalName();

        $request->file('image')->store('public/images/');
        $image = new Image();
        $image->name= $name;
        $image->save();
        return redirect()->back();
    }

}
