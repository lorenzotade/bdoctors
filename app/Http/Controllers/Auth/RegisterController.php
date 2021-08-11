<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Spec;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
        $messages = [
            'first_name.required' => 'Questo campo è obbligatorio.',
            'first_name.min' => 'Questo campo deve essere almeno :min caratteri.',
            'first_name.max' => 'Questo campo deve essere al massimo :max caratteri.',
            'last_name.required' => 'Questo campo è obbligatorio.',
            'last_name.min' => 'Questo campo deve essere almeno :min caratteri.',
            'last_name.max' => 'Questo campo deve essere al massimo :max caratteri.',
            'email.required' => 'Questo campo è obbligatorio.',
            'email.email' => 'Questo campo deve essere un\'email.',
            'email.max' => 'Questo campo deve essere al massimo :max caratteri.',
            'email.unique' => 'Questa email è già presente nel database.',
            'password.required' => 'Questo campo è obbligatorio.',
            'password.min' => 'La password deve essere lunga almeno :min caratteri.',
            'street.required' => 'Questo campo è obbligatorio.',
            'street.min' => 'Questo campo deve essere almeno :min caratteri.',
            'street.max' => 'Questo campo deve essere al massimo :max caratteri.',
            'postal_code.required' => 'Questo campo è obbligatorio.',
            'postal_code.numeric' => 'Questo campo deve essere di sole cifre.',
            'postal_code.digits' => 'Questo campo deve essere di :digits cifre.',
            'city.required' => 'Questo campo è obbligatorio.',
            'city.min' => 'Questo campo deve essere almeno :min caratteri.',
            'city.max' => 'Questo campo deve essere al massimo :max caratteri.',
            'gender.required' => 'Questo campo è obbligatorio.',
        ];

        return Validator::make($data, [
            'first_name' => ['required', 'string', 'min:2', 'max:255'],
            'last_name' => ['required', 'string', 'min:2', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'street' => ['required', 'string', 'min:2', 'max:255'],
            'postal_code' => ['required', 'numeric', 'digits:5' ],
            'city' => ['required', 'string', 'min:2', 'max:255'],
            'gender' => ['required'],
        ], $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $data['slug'] = Str::slug($data['first_name'] . ' ' . $data['last_name'], '-');

        $slug_exist = User::where('slug',$data['slug'])->first();
        $counter = 0;
        while($slug_exist){
            $last_name = $data['last_name'] . '-' . $counter;
            $slug = Str::slug($data['first_name'] . ' ' . $last_name, '-');
            $data['slug']  = $slug;
            $slug_exist = User::where('slug',$slug)->first();
            $counter++;
        }
        
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'slug' => $data['slug'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'street' => $data['street'],
            'postal_code' => $data['postal_code'],
            'city' => $data['city'],
            'gender' => $data['gender']
        ]);
    }

    /**
      * Show the application registration form.
      *
      * @return \Illuminate\Http\Response
      */
      public function showRegistrationForm()
      {
          $specs=Spec::all();
          return view('auth.register', compact('specs'));
      }

}
