<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryImagesController extends Controller
{
    public function index($apartment)
    {

        $images = Image::where('apartment_id', $apartment)->get();
        return view('admin.gallery.index', compact('images'));
    }

    public function store(Request $request)
    {
        $name = $request->file('image')->getClientOriginalName();

        $request->file('image')->store('public/images/');
        $image = new Image();
        $image->name = $name;
        $image->save();
        return redirect()->back();
    }
    public function removeImage(Image $image)
    {
        // Rimuovi l'immagine dal database
        $image->delete();

        // Rimuovi il file fisico dall'archivio
        Storage::delete('public/' . $image->path);

        return redirect()->back()->with('success', 'Immagine rimossa con successo.');
    }

    public function destroy(Image $image)
    {
        // Elimina il file fisico
        Storage::delete($image->path);

        // Elimina il record dell'immagine dal database
        $image->delete();

        return redirect()->back()->with('message', 'Immagine eliminata con successo');
    }
}
