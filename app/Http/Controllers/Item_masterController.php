<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Item;

class Item_masterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.item_master.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item_name = $request->input('Item_name');
        $item_price = $request->input('Item_price');
        $item_description = $request->input('Item_description');
        $item_image = $request->file('Item_image');
        $user_id = Auth::user()->id;
        $user_name = Auth::user()->name;

        $request->validate([
            'Item_name' => ['required', 'string', 'max:255'],
            'Item_price' => ['required', 'string', 'max:255'],
            'Item_description' => ['required', 'string', 'max:500'],
        ]);

        $request->validate([
            'image_upload' => 'required|mimes:png,jpg,jpeg|image',
        ]);

        

        $fileName = time().'.'.$request->image_upload->extension();  
        $path1 = $request->image_upload->getClientOriginalName();
        // $path2 = "temp";
        $request->image_upload->move(public_path('uploads'), $path1);

        $insert = array('item_name' => $item_name, 'item_price' => $item_price, 'item_description' => $item_description, 'item_image' => $path1, 'user_id' => $user_id, 'user_name' => $user_name);
        // dd($insert);
        DB::table('items')->insert($insert);
        return back()->with('success', 'Item added Successfully');
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
        $item_show = DB::table('items')->get();

        return view('pages.item_master.view', [
            'id' => $id,
            'item_show' => $item_show
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
        $item_edit = Item::findOrFail($id);

        // dd($speciality_explode);die();
        return view('pages.item_master.edit', [
            'item_edit' => $item_edit,
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
        $item_name = $request->input('edited_Item_name');
        $item_price = $request->input('edited_Item_price');
        $item_description = $request->input('edited_Item_description');
        $item_image = $request->file('edited_Item_image');
        $user_id = Auth::user()->id;
        $user_name = Auth::user()->name;

        $request->validate([
            'edited_Item_name' => ['max:255'],
            'edited_Item_price' => ['max:255'],
            'edited_Item_description' => ['max:500'],
        ]);

        $request->validate([
            'edited_image_upload' => 'mimes:png,jpg,jpeg|image',
        ]);

        

        

        if(request()->has('edited_image_upload'))
        {
            $fileName = time().'.'.$request->edited_image_upload->extension();  
        $path1 = $request->edited_image_upload->getClientOriginalName();
        // $path2 = "temp";
        $request->edited_image_upload->move(public_path('uploads'), $path1);

            $im_edit = Item::findOrFail($id);
            $im_edit->item_name = $request->input('edited_Item_name');
            $im_edit->item_price = $request->input('edited_Item_price');
            $im_edit->item_description = $request->input('edited_Item_description');
            $im_edit->item_image = $path1;
            
            $im_edit->save($request->all());
        }

        $im_edit = Item::findOrFail($id);
        $im_edit->item_name = $request->input('edited_Item_name');
        $im_edit->item_price = $request->input('edited_Item_price');
        $im_edit->item_description = $request->input('edited_Item_description');
        
        $im_edit->save();
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
        $Item_destroy = Item::findOrFail($id);
        $Item_destroy->delete();
        return back()->with("success", "You have successfully Deleted the Item."); 
    }
}
