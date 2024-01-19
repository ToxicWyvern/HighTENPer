<?php
/* De klasse RegisterController verzorgt de registratie van nieuwe gebruikers, inclusief de validatie
en het aanmaken van gebruikersaccounts. */
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

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
    protected $redirectTo = RouteServiceProvider::DASHBOARD;

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
            'profileImage' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);


    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    

   /**
    * De functie maakt een nieuwe gebruiker aan met een profielafbeelding, indien opgegeven, en
    * retourneert het gebruikersobject.
    * 
    * //param array data Een array met de gegevens van de gebruiker, zoals naam, e-mailadres, wachtwoord
    * en profielafbeelding.
    * 
    * return het gemaakte gebruikersobject.
    */
   /**
    
    */
    protected function create(array $data)
    {
        $profileImage = null;

        if (isset($data['profileImage']) && $data['profileImage']->isValid()) {
            $profileImage = $data['profileImage']->store('profileImages', 'public');
        }

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        if ($profileImage) {
            $user->profileImage = $profileImage;
            $user->save();
        }

        return $user;
    }


}
