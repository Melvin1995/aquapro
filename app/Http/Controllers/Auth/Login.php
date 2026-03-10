<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    public function __invoke(Request $request)
    {
        // Validation
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Attempt to log in
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            // Regenerate session for security
            $request->session()->regenerate();

            // Redirect to intended page or home
            return redirect()->intended('/')->with('success', greeting() . '' . $request->username);
        }

        // If login fails, redirect back with error
        return back()
            ->withErrors(['username' => 'Gebruikersnaam onjuist.'])
            ->onlyInput('username');
    }
}
