<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $speciality = User::findOrFail(Auth::id());
        $special_bs = $speciality->bs;
        $special_bk = $speciality->bk;

        $speciality_explode = explode(", ", $special_bs);
        $keywoard_explode = explode(", ", $special_bk);

        $speciality_one = $speciality_explode[0];
        $speciality_two = $speciality_explode[1];
        $speciality_three = $speciality_explode[2];

        $keyword_one = $keywoard_explode[0];
        $keyword_two = $keywoard_explode[1];
        $keyword_three = $keywoard_explode[2];
        $keyword_four = $keywoard_explode[3];
        $keyword_five = $keywoard_explode[4];

        // dd($speciality_explode);die();
        return view('pages.profile', [
            'speciality_explode' => $speciality_explode, 
            'keywoard_explode' => $keywoard_explode,
            'speciality_one' => $speciality_one,
            'speciality_two' => $speciality_two,
            'speciality_three' => $speciality_three,
            'keyword_one' => $keyword_one,
            'keyword_two' => $keyword_two,
            'keyword_three' => $keyword_three,
            'keyword_four' => $keyword_four,
            'keyword_five' => $keyword_five,
        ]);
    }

    public function edit_page()
    {
        $speciality = User::findOrFail(Auth::id());
        $special_bs = $speciality->bs;
        $special_bk = $speciality->bk;

        $speciality_explode = explode(", ", $special_bs);
        $keywoard_explode = explode(", ", $special_bk);

        $speciality_one = $speciality_explode[0];
        $speciality_two = $speciality_explode[1];
        $speciality_three = $speciality_explode[2];

        $keyword_one = $keywoard_explode[0];
        $keyword_two = $keywoard_explode[1];
        $keyword_three = $keywoard_explode[2];
        $keyword_four = $keywoard_explode[3];
        $keyword_five = $keywoard_explode[4];

        // dd($speciality_explode);die();
        return view('pages.edit_profile', [
            'speciality_explode' => $speciality_explode, 
            'keywoard_explode' => $keywoard_explode,
            'speciality_one' => $speciality_one,
            'speciality_two' => $speciality_two,
            'speciality_three' => $speciality_three,
            'keyword_one' => $keyword_one,
            'keyword_two' => $keyword_two,
            'keyword_three' => $keyword_three,
            'keyword_four' => $keyword_four,
            'keyword_five' => $keyword_five,
        ]);
    }


    public function edit(Request $request)
    {
        // $name = $request->input('edited_email');
        // dd($name);

        $request->validate([
            'edited_bn' => ['string', 'max:255'],
            'edited_mn' => ['max:255'],
            'edited_name' => ['max:255'],
            'email' => ['string', 'email', 'max:255', 'unique:users'],
            'edit_ut' => ['string', 'max:255'],
            'edited_adre' => ['string', 'max:500'],
            'edited_city' => ['string', 'max:500'],
            'edited_state' => ['string', 'max:500'],
            'edited_bs1' => ['string', 'max:500'],
            'edited_bs2' => ['max:500'],
            'edited_bs3' => ['max:500'],
            'edited_bk1' => ['string', 'max:500'],
            'edited_bk2' => ['max:500'],
            'edited_bk3' => ['max:500'],
            'edited_bk4' => ['max:500'],
            'edited_bk5' => ['max:500'],
        ]);
        $bs_array[0] = $request->input('edited_bs1');
        $bs_array[1] = $request->input('edited_bs2');
        $bs_array[2] = $request->input('edited_bs3');
        $bs_array_e = implode(", ", $bs_array);
        // dd($bs_array_e);

        $bk_array[0] = $request->input('edited_bk1');
        $bk_array[1] = $request->input('edited_bk2');
        $bk_array[2] = $request->input('edited_bk3');
        $bk_array[3] = $request->input('edited_bk4');
        $bk_array[4] = $request->input('edited_bk5');
        $bk_array_e = implode(", ", $bk_array);

        $user = Auth::user();
        $user->name = $request->input('edited_name');
        $user->email = $request->input('edited_email');
        $user->user_type = $request->input('edit_ut');
        $user->Business_name = $request->input('edited_bn');
        $user->mobile_number = $request->input('edited_mn');
        $user->Address = $request->input('edited_adre');
        $user->City = $request->input('edited_city');
        $user->state = $request->input('edited_state');
        $user->bs = $bs_array_e;
        $user->bk = $bk_array_e;
        
        $user->save();
        return back()
            ->with('success', 'Your profile is updated');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
