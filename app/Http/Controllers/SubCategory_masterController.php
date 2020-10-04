<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\SubCategory;

class SubCategory_masterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $main_ca = DB::table('categories')->get();
        return view('pages.sub_category_master.index', ['main_ca' => $main_ca]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $SubCategory = $request->input('Sub_Category');
        $MainCategory = $request->input('category');
        $user_id = Auth::user()->id;
        $user_name = Auth::user()->name;
        $insert = array('MainCategory' => $MainCategory, 'SubCategory' => $SubCategory, 'user_id' => $user_id, 'user_name' => $user_name);
        DB::table('sub_categories')->insert($insert);
        return back()->with('success', 'Sub Category added Successfully');
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
        $sub_category_show = DB::table('sub_categories')->get();

        return view('pages.sub_category_master.view', [
            'id' => $id,
            'sub_category_show' => $sub_category_show
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
        $main_ca = DB::table('categories')->get();
        $subcategory_edit = SubCategory::findOrFail($id);

        // dd($speciality_explode);die();
        return view('pages.sub_category_master.edit', [
            'subcategory_edit' => $subcategory_edit,
            'main_ca' => $main_ca
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
            'edited_SubCategory' => ['string', 'max:255'],
            'edited_category' => ['string', 'max:255'],
        ]);

        $sc_edit = SubCategory::findOrFail($id);
        $sc_edit->MainCategory = $request->input('edited_category');
        $sc_edit->SubCategory = $request->input('edited_SubCategory');
        
        $sc_edit->save();
        return back()
            ->with('success', 'Your Sub Category is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $SubCategory_destroy = SubCategory::findOrFail($id);
        $SubCategory_destroy->delete();
        return back()->with("success", "You have successfully Deleted the Sub Category."); 
    }
}
