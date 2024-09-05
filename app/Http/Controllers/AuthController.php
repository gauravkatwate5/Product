<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function loginview()
    {
        return view('auth.login');
    }

    public function ragisterview()
    {
        return view('auth.ragister');
    }

    public function register(Request $request)
    {
         // Validate the request
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:auths,email',
            'password' => 'required|min:6',
            'role' => 'sometimes|in:admin,user' // Validate role if provided
        ]);
        if(!$validated)
        {
            return back()->with('error', 'Invalid credentials');
        }
        $user = new auth();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role ?? 'user';
        $user->save();

        return redirect()->route('loginview')->with('success', 'Registration successful. Please login.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = auth::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Session::put('user', $user);
              // Redirect based on user role
            if ($user->role === 'admin') {
                return redirect()->route('admin'); // Replace with actual admin dashboard route
            } elseif ($user->role === 'user') {
                return redirect()->route('/'); // Replace with actual user dashboard route
            } else {
                return redirect()->route('login')->with('error', 'Role not recognized.');
            }
        } else {
            return back()->with('error', 'Invalid credentials');
        }
    }

    public function logout()
    {
        Session::forget('user');
        return redirect()->route('loginview');
    }
}
