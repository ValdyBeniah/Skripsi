<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Password extends Controller
{
    public function index()
    {
        return view('password');
    }

    public function changePassword(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:3',
        ]);

        // Find the user by email
        $user = User::where('email', $request->email)->firstOrFail();

        // Update the user's password (automatically hashed by Laravel)
        $user->password = bcrypt($request->password);
        $user->save();

        // Send a confirmation email (assuming you have a method set up for this)
        // Mail::to($user->email)->send(new PasswordResetSuccess($user));

        // Redirect with a success message
        return redirect()->route('login')->with('success', 'Password successfully reset.');
    }


}
