<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Client;
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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'prenom' => ['required', 'string', 'min:3', 'max:20' ],
            'adresse' => ['required', 'string', 'min:3', 'max:200' ],
            'ville' => ['required', 'string', 'min:3', 'max:200' ],
            'CP' => ['required', 'string', 'regex:/^([ABCEGHJKLMNPRSTVXY][0-9][A-Z][ ]*[0-9][A-Z][0-9])$/' ],
            'telephone' => ['required', 'string', 'regex:/^[1-9]\d{2}-\d{3}-\d{4}/' ],
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

        $client=Client::create([
            'nom' => $data['name'],
            'courriel' => $data['email'],
            'prenom' => $data['prenom'],
            'ville' => $data['ville'],
            'adresse' => $data['adresse'],
            'CP' => $data['CP'],
            'telephone' => $data['telephone'],
            'genre' => $data['genre'],
            'province_id' => $data['province_id'],
            'premierContact_id' => $data['premierContact_id'],
        ]);
        return User::create([
            'name' => $data['name'],
            'client_id' => $client->id,
            'email' => $data['email'],
            'prenom' => $data['prenom'],
            'ville' => $data['ville'],
            'adresse' => $data['adresse'],
            'CP' => $data['CP'],
            'telephone' => $data['telephone'],
            'genre' => $data['genre'],
            'province_id' => $data['province_id'],
            'premierContact_id' => $data['premierContact_id'],
            'password' => Hash::make($data['password']),
        ]);
    }
}