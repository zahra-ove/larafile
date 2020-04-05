<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Models\Role;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;


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
    // protected $redirectTo = RouteServiceProvider::HOME;
    public  function redirectTo()
    {
        //get authenticated user object
        $user = Auth::user();

        //if user has Admin role then redirect to admin panel otherwise redirect to profile page
        if($user->isAdmin())
        {
            return route('admin.index');
        }
        else
        {
            return route('user.index');
        }
    }

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
        // return Validator::make($data, [
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        // ]);


        return Validator::make($data, [
            'fullname'   =>  ['nullable', 'string', 'max:255'],
            'username'   =>  ['required', 'string', 'max:255'],
            'email'      =>  ['required', 'string', 'email', 'max:255', 'unique:users'],
            'gender_id'  =>  ['nullable', 'numeric'],
            'age'        =>  ['nullable', 'numeric'],
            'mobile'     =>  ['nullable', 'string', 'max:20'],
            'password'   =>  ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        // ]);

        $newUser = User::create([
            'fullname'  =>  $data['fullname'],
            'username'  =>  $data['username'],
            'email'     =>  $data['email'],
            'gender_id' =>  $data['gender_id'],
            'age'       =>  $data['age'],
            'mobile'    =>  $data['mobile'],
            'password'  =>  Hash::make($data['password'])
        ]);



        // assigning Generic User role to any new user
        $userRole = Role::where('name', 'User')->first();  //get user role
        $newUser->roles()->attach($userRole);             //assign it to new user that is registered.

        return $newUser;

    }
}
