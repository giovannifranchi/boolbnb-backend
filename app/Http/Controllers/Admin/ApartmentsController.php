<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ApartmentStoreRequest;
use App\Models\Apartment;
use App\Models\Plan;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;


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
        $apartments = Apartment::where('user_id', $user->id)->get();
        
        return view('admin.apartments.index', compact('apartments'));
        
        
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
        return view('admin.apartments.create', compact('apartments','services'));
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
        // $response = Http::get('https://api.tomtom.com/search/2/geocode/' . urlencode($data['address'] . ', ' . $data['city'] . ', ' . $data['state']) . '.json', [
        //     'key' => env('TOM_TOM_KEY')
        // ]);

        // $data = $response->json();

        // if (!empty($data['results']) && isset($data['results'][0]['position'])) {
        //     $apartment->latitude = $data['results'][0]['position']['lat'];
        //     $apartment->longitude = $data['results'][0]['position']['lon'];
        // }else {
        //     return response(['error'=>'internal service error'], 500);
        // }
        $apartment->longitude = $request['longitude'];
        $apartment->latitude = $request['latitude'];


        $apartment->save();

        if(isset($request['services'])) {
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
        return view('admin.apartments.show', compact('apartment', 'plans'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apartment = Apartment::where('id', $id)->first();
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
    public function update(ApartmentStoreRequest $request, Apartment $apartment)
    {
        $data = $request->validated();

        $apartment->slug = Str::slug($data['name']);

        if(isset($data['services'])){
            $apartment->services()->sync($data['services']);
        }else{
            $apartment->services()->detach();
        }
        

        $apartment->update($data);
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
