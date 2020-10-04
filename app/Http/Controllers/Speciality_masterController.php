<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Speciality;

class Speciality_masterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.speciality_master.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sp = $request->input('Specialities');
        $user_id = Auth::user()->id;
        $user_name = Auth::user()->name;
        $insert = array('Speciality' => $sp, 'user_id' => $user_id, 'user_name' => $user_name);
        DB::table('specialities')->insert($insert);
        return back()->with('success', 'Speciality added Successfully');
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
        $speciality = DB::table('specialities')->get();

        return view('pages.speciality_master.view', [
            'id' => $id,
            'speciality' => $speciality
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
        $speciality_edit = Speciality::findOrFail($id);

        // dd($speciality_explode);die();
        return view('pages.speciality_master.edit', [
            'speciality_edit' => $speciality_edit
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
            'edited_speciality' => ['string', 'max:255'],
        ]);

        $sp_edit = Speciality::findOrFail($id);
        $sp_edit->Speciality = $request->input('edited_speciality');
        
        $sp_edit->save();
        return back()
            ->with('success', 'Your Speciality is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Speciality_destroy = Speciality::findOrFail($id);
        $Speciality_destroy->delete();
        return back()->with("success", "You have successfully Deleted the Speciality."); 
    }
}
