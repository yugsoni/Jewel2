<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Business_type;

class Businesstype_masterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.business_type_master.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */ 

    public function store(Request $request)
    {
        $bt = $request->input('bt');
        $user_id = Auth::user()->id;
        $user_name = Auth::user()->name;
        $insert = array('Business_type' => $bt, 'user_id' => $user_id, 'user_name' => $user_name);
        DB::table('business_types')->insert($insert);
        return back()->with('success', 'Business Type added Successfully');
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
        $business = DB::table('business_types')->get();

        return view('pages.business_type_master.view', [
            'id' => $id,
            'business' => $business
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
        $business_edit = Business_type::findOrFail($id);

        // dd($speciality_explode);die();
        return view('pages.business_type_master.edit', [
            'business_edit' => $business_edit
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
            'edited_bt' => ['string', 'max:255'],
        ]);

        $bt_edit = Business_type::findOrFail($id);
        $bt_edit->Business_type = $request->input('edited_bt');
        
        $bt_edit->save();
        return back()
            ->with('success', 'Your Business Type is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $business_type_destroy = Business_type::findOrFail($id);
        $business_type_destroy->delete();
        return back()->with("success", "You have successfully Deleted the Business Type."); 
    }
}
