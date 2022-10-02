<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    // Get user register form
    public function registerForm()
    {
        //Include blade
        return view('users.register');
    }

    // Creating new user 
    public function registerUser(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        // Hash the password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create user in db
        $user = User::create($formFields);

        // Then Login
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');
    }

    // get login form
    public function loginFrom()
    {
        return view('users.login');
    }

    //Logged in user
    public function loggedInUser(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are now logged in');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    // Logout User
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Session::flash('message', '');
        return redirect('/login')->with('message', 'You have been logged out');
    }
}
