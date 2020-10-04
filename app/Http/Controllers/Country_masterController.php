<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Country;

class Country_masterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.country_master.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Country = $request->input('Country');
        $user_id = Auth::user()->id;
        $user_name = Auth::user()->name;
        $insert = array('Country' => $Country, 'user_id' => $user_id, 'user_name' => $user_name);
        DB::table('countries')->insert($insert);
        return back()->with('success', 'Country added Successfully');
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
        $country = DB::table('countries')->get();

        return view('pages.country_master.view', [
            'id' => $id,
            'country' => $country
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
        $country = Country::findOrFail($id);

        // dd($speciality_explode);die();
        return view('pages.country_master.edit', [
            'country' => $country
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
            'edited_country' => ['string', 'max:255'],
        ]);

        $country_edit = Country::findOrFail($id);
        $country_edit->Country = $request->input('edited_Country');
        
        $country_edit->save();
        return back()
            ->with('success', 'Your Country is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country_destroy = Country::findOrFail($id);
        $country_destroy->delete();
        return back()->with("success", "You have successfully Deleted the Country.");
    }
}
