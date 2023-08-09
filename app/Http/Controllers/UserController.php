<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //show register/create form

    public function register() {
        return view('users.register');

    }

   
    //create new users

    public function store(Request $request) {
        $formfields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
            'is_admin' => 'boolean',

        ]);


        //Hash Passwored
        $formfields['password'] = bcrypt($formfields['password']);

        //create user
        $user = User::create($formfields);



        $user->is_admin = $request->input('is_admin', false);
        $user->save();

        //login
        auth()->login($user);



        return redirect('/')->with('message', 'User Created and logged in');

    }


    // logout
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Hey You are Logged Out');

    }


    // show login
    public function login() {
        return view('users.login');
    }

    // authenticate user
    public function authenticate(Request $request) {
        $formfields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formfields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are now logged in!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');


    }
}
