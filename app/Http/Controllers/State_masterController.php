<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\State;

class State_masterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.state_master.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $State = $request->input('State');
        $user_id = Auth::user()->id;
        $user_name = Auth::user()->name;
        $insert = array('State' => $State, 'user_id' => $user_id, 'user_name' => $user_name);
        DB::table('states')->insert($insert);
        return back()->with('success', 'State added Successfully');
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
        $state = DB::table('states')->get();

        return view('pages.state_master.view', [
            'id' => $id,
            'state' => $state
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
        $state = State::findOrFail($id);

        // dd($speciality_explode);die();
        return view('pages.state_master.edit', [
            'state' => $state
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
            'edited_state' => ['string', 'max:255'],
        ]);

        $state_edit = State::findOrFail($id);
        $state_edit->State = $request->input('edited_state');
        
        $state_edit->save();
        return back()
            ->with('success', 'Your State is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $state_destroy = State::findOrFail($id);
        $state_destroy->delete();
        return back()->with("success", "You have successfully Deleted the State.");
    }
}
