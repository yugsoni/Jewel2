<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Keyword;

class Keyword_masterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.keyword_master.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $keyword = $request->input('Keywords');
        $user_id = Auth::user()->id;
        $user_name = Auth::user()->name;
        $insert = array('Keyword' => $keyword, 'user_id' => $user_id, 'user_name' => $user_name);
        DB::table('keywords')->insert($insert);
        return back()->with('success', 'Keyword added Successfully');
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
        $keyword_show = DB::table('keywords')->get();

        return view('pages.keyword_master.view', [
            'id' => $id,
            'keyword_show' => $keyword_show
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
        $keyword_edit = Keyword::findOrFail($id);

        // dd($speciality_explode);die();
        return view('pages.keyword_master.edit', [
            'keyword_edit' => $keyword_edit
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
            'edited_keyword' => ['string', 'max:255'],
        ]);

        $k_edit = Keyword::findOrFail($id);
        $k_edit->Keyword = $request->input('edited_keyword');
        
        $k_edit->save();
        return back()
            ->with('success', 'Your Keyword is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Keyword_destroy = Keyword::findOrFail($id);
        $Keyword_destroy->delete();
        return back()->with("success", "You have successfully Deleted the Keyword."); 
    }
}
