<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ApartmentStoreRequest;
use App\Models\Apartment;
use Illuminate\Http\Request;
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
        return view('admin.apartments.create');
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
        $apartment->save();

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

        return view('admin.apartments.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        $apartments = Apartment::all();
        return view('admin.apartments.edit', compact('apartment', 'apartments'));
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
        $data = $request->all();

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





        $apartment->delete();

        return redirect()->route('admin.apartments.index')->with('message', "Post eliminato con successo");
    }
}
