<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\City;
use DB;

class City_masterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.city_master.index');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $city = $request->input('City');
        $user_id = Auth::user()->id;
        $user_name = Auth::user()->name;
        $insert = array('City' => $city, 'user_id' => $user_id, 'user_name' => $user_name);
        DB::table('cities')->insert($insert);
        return back()->with('success', 'City added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $id = '1';
        $city = DB::table('cities')->get();

        return view('pages.city_master.view', [
            'id' => $id,
            'city' => $city
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::findOrFail($id);

        // dd($speciality_explode);die();
        return view('pages.city_master.edit', [
            'city' => $city
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'edited_city' => ['string', 'max:255'],
        ]);

        $city = City::findOrFail($id);
        $city->City = $request->input('edited_city');
        
        $city->save();
        return back()
            ->with('success', 'Your City is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city_destroy = City::findOrFail($id);
        $city_destroy->delete();
        return back()->with("success", "You have successfully Deleted the City.");
    }
}
