<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ApartmentStoreRequest;
use App\Http\Requests\Admin\ApartmentUpdateRequest;
use App\Models\Apartment;
use App\Models\Image;
use App\Models\Plan;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\FlareClient\Http\Exceptions\NotFound;

use function PHPUnit\Framework\isEmpty;

class ApartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $user = $request->user();
        $apartments = Apartment::where('user_id', $user->id)->orderBy('created_at', 'DESC')->get();
        $services = Service::all();


        return view('admin.apartments.index', compact('apartments', 'services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $apartments = Apartment::all();
        $services = Service::all();
        return view('admin.apartments.create', compact('apartments', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApartmentStoreRequest $request)
    {

        $data = $request->validated();
        $user = $request->user();
        $apartment = new Apartment();
        $apartment->fill($data);
        $apartment->slug = Str::slug($apartment->name);
        $apartment->user_id = $user->id;

        // Salvataggio della copertina
        if ($request->hasFile('thumb')) {
            $thumb = $request->file('thumb');
            $path = $thumb->store('images', 'public');
            $apartment->thumb = "storage/" . $path;
        }


        $apartment->longitude = $request['longitude'];
        $apartment->latitude = $request['latitude'];

        if (!$request->is_visible) {

            $apartment->is_visible = false;
        }

        $apartment->save();

        // Salvataggio delle immagini aggiuntive

        if ($request->hasFile('additional_images')) {
            $additionalImages = $request->file('additional_images');
            $additionalImageNames = [];

            foreach ($additionalImages as $additionalImage) {
                $path = $additionalImage->store('images', 'public');
                $image = new Image();
                $image->apartment_id = $apartment->id;
                $image->path = "storage/" . $path;
                $image->save();
            }

            $apartment->additional_images = $additionalImageNames;
        }

        if (isset($request['services'])) {
            $apartment->services()->sync($request['services']);
        }

        return redirect()->route('admin.apartments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {

        $plans = Plan::all();
        $images = Image::where('apartment_id', $apartment->id)->get();
        $pics = $images->pluck('path')->toArray();
        $thumb = $apartment->thumb;
        $galleries = array_merge([$thumb], $pics);


        return view('admin.apartments.show', compact('apartment', 'plans', 'images', 'galleries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Apartment $apartment)
    {

        $services = Service::all();
        return view('admin.apartments.edit', compact('apartment', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ApartmentUpdateRequest $request, Apartment $apartment)
    {
        $data = $request->validated();

        $apartment->slug = Str::slug($data['name']);

        // Salvataggio della copertina
        if ($request->hasFile('thumb')) {
            $thumb = $request->file('thumb');
            $path = $thumb->store('images', 'public');
            $data['thumb'] = "storage/" . $path;
        }
        if (!$request->is_visible) {

            $apartment->is_visible = false;
        } elseif ($request->is_visible) {
            $apartment->is_visible = true;
        }

        $apartment->update($data);

        // Salvataggio delle immagini aggiuntive

        if ($request->hasFile('additional_images')) {
            $additionalImages = $request->file('additional_images');
            $additionalImageNames = [];

            foreach ($additionalImages as $additionalImage) {
                $path = $additionalImage->store('images', 'public');
                $image = new Image();
                $image->apartment_id = $apartment->id;
                $image->path = "storage/" . $path;
                $image->save();
            }

            $apartment->additional_images = $additionalImageNames;
        }

        if (isset($data['services'])) {
            $apartment->services()->sync($data['services']);
        } else {
            $apartment->services()->detach();
        }



        return redirect()->route('admin.apartments.show', $apartment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        // Storage::delete($game->thumb);
        // $game->delete();
        // return to_route('admin.games.index');

        $old_id = $apartment->id;

        $apartment->delete();

        return redirect()->route('admin.apartments.index')->with('message', "Apartment $old_id deleted successfully");
    }
}
