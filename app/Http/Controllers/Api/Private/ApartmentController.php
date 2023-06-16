<?php

namespace App\Http\Controllers\Api\Private;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ApartmentStoreRequest;
use App\Http\Requests\Api\ApartmentUpdateRequest;
use App\Models\Apartment;
use App\Models\User;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class ApartmentController extends Controller
{

    public function index(Request $request)
    {
        $user = $request->user();

        $apartments = Apartment::all()->where('user_id', $user->id);

        return response($apartments, 200);
    }

 
    public function store(ApartmentStoreRequest $request)
    {
        $fields = $request->validated();

        $user = $request->user();

        $newApartment = new Apartment();

        $newApartment->fill($fields);

        $newApartment->user_id = $user->id;

        $newApartment->slug = Str::slug($fields['name']);

        $response = Http::get('https://api.tomtom.com/search/2/geocode/' . urlencode($fields['address'] . ', ' . $fields['city'] . ', ' . $fields['state']) . '.json', [
            'key' => env('TOM_TOM_KEY')
        ]);

        $data = $response->json();

        if (!empty($data['results']) && isset($data['results'][0]['position'])) {
            $newApartment->latitude = $data['results'][0]['position']['lat'];
            $newApartment->longitude = $data['results'][0]['position']['lon'];
        }else {
            return response(['error'=>'internal service error'], 500);
        }

        $newApartment->save();

        return response($newApartment, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ApartmentUpdateRequest $request)
    {
        $fields = $request->validated();
        $user = $request->user();

        $apartment = Apartment::where('user_id', $user->id)->where('slug', $fields['slug'])->first();

        if(!$apartment){
            return response(['error'=> 'apartment not found'], 404);
        }

        if($apartment->address !== $fields['address'] || $apartment->city !== $fields['city'] || $apartment->state !== $fields['state']){
            $response = Http::get('https://api.tomtom.com/search/2/geocode/' . urlencode($fields['address'] . ', ' . $fields['city'] . ', ' . $fields['state']) . '.json', [
                'key' => env('TOM_TOM_KEY')
            ]);
    
            $data = $response->json();
            if (!empty($data['results']) && isset($data['results'][0]['position'])) {
                $apartment->latitude = $data['results'][0]['position']['lat'];
                $apartment->longitude = $data['results'][0]['position']['lon'];
            }else {
                return response(['error'=>'internal service error'], 500);
            }
        }

        if($apartment->name !== $fields['name']){
            $apartment->slug = Str::slug($fields['name']);
        }

        $apartment->update($fields);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
