<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'bn' => ['required', 'string', 'max:255'],
            'mn' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'adre' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'bs1' => ['required', 'string', 'max:255'],
            'bs2' => ['max:255'],
            'bs3' => ['max:255'],
            'bk1' => ['required', 'string', 'max:255'],
            'bk2' => ['max:255'],
            'bk3' => ['max:255'],
            'bk4' => ['max:255'],
            'bk5' => ['max:255'],
            'ut' => ['required', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {   
        // dd($data);

        $bs_array[0] = $data['bs1'];
        $bs_array[1] = $data['bs2'];
        $bs_array[2] = $data['bs3'];
        $bs_array_e = implode(", ", $bs_array);
        // dd($bs_array_e);

        $bk_array[0] = $data['bk1'];
        $bk_array[1] = $data['bk2'];
        $bk_array[2] = $data['bk3'];
        $bk_array[3] = $data['bk3'];
        $bk_array[4] = $data['bk3'];
        $bk_array_e = implode(", ", $bk_array);
        
        $ut = $data['ut'];
        // $text_implod = explode(",", $text);
        // dd($ut);
        return User::create([
            'name' => $data['name'],
            'Business_name' => $data['bn'],
            'mobile_number' => $data['mn'],
            'user_type' => $ut,
            'Address' => $data['adre'],
            'City' => $data['city'],
            'State' => $data['state'],
            'email' => $data['email'],
            'bs' => $bs_array_e,
            'bk' => $bk_array_e,
            'password' => Hash::make($data['password']),
        ]);
    }
}
