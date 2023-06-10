<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show signup form
    public function signup()
    {
        return view('users.signup');
    }

    // Handle signup form data
    public function store(Request $request)
    {
        // Validate the form fields
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6']
        ]);

        // Hash the password
        $formFields['password'] = bcrypt($formFields['password']);

        // Save the user to the database
        $user = User::create($formFields);

        // Login the user
        auth()->login($user);

        return redirect('/')->with('message', 'User created!');
    }

    // Login form
    public function login()
    {
        return view('users.login');
    }

    // Authenticate user
    public function authenticate(Request $request)
    {
        // Validate the form fields
        $formFields = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        // Attempt to log the user in
        // If successful, regenerate the session
        if (auth()->attempt($formFields)) {
            // Regenerate the session: meaning that the session ID will be regenerated and the session data will be copied to the new session
            $request->session()->regenerate();

            // Redirect to the homepage
            return redirect('/')->with('message', 'Logged in!');
        }

        // If unsuccessful, redirect back to the login with the form data
        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }

    // Logout user
    public function logout(Request $request)
    {
        // remove the authenticated user
        auth()->logout();

        // invalidate the session
        $request->session()->invalidate();

        // regenerate the CSRF token
        $request->session()->regenerateToken();

        // redirect to the homepage
        return redirect('/')->with('message', 'Logged out!');
    }
}
