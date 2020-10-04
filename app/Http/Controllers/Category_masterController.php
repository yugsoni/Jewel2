<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Category;

class Category_masterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.category_master.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Category = $request->input('Category');
        $user_id = Auth::user()->id;
        $user_name = Auth::user()->name;
        $insert = array('Category' => $Category, 'user_id' => $user_id, 'user_name' => $user_name);
        DB::table('categories')->insert($insert);
        return back()->with('success', 'Category added Successfully');
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
        $category_show = DB::table('categories')->get();

        return view('pages.category_master.view', [
            'id' => $id,
            'category_show' => $category_show
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
        $category_edit = Category::findOrFail($id);

        // dd($speciality_explode);die();
        return view('pages.category_master.edit', [
            'category_edit' => $category_edit
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
            'edited_Category' => ['string', 'max:255'],
        ]);

        $ca_edit = Category::findOrFail($id);
        $ca_edit->Category = $request->input('edited_Category');
        
        $ca_edit->save();
        return back()
            ->with('success', 'Your Category is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Category_destroy = Category::findOrFail($id);
        $Category_destroy->delete();
        return back()->with("success", "You have successfully Deleted the Category."); 
    }
}
