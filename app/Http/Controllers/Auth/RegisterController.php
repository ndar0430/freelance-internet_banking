<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\UserDetails;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use App\Role;

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
    protected $redirectTo = '/admin/unregistered_users';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showRegistrationForm($id)
    {
        $user_details = UserDetails::find($id);

        $getID = $id;
        return view('auth.register', compact('user_details', 'getID'));
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

            'user_id' => 'required|integer|digits:10|unique:users',
            'users_details_id' => 'required|integer|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'show_password' => 'required',
        ]);
        
    }

    public function register(Request $request)
    {
        $success = array('ok'=> 'The User has been Registered Successfully');

        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath())->with($success);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user =  User::create([
            'user_id' => $data['user_id'],
            'users_details_id' => $data['users_details_id'],
            'password' => Hash::make($data['password']),
            'show_password' => $data['show_password']
        ]);

        $user->attachRole(Role::where('name','normal-user')->first());
        
        return $user;
    }
}
