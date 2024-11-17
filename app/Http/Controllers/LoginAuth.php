<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use App\Models\Users;

class LoginAuth extends Controller
{
    public function Login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $users = Users::where('email', $request->email)->first();

        // Check if user exists and password matches directly (plain text comparison)
        if ($users && $users->password === $request->password) {
            
            // role id redirect
            switch ($users->role_id) {
                case 1:
                    return redirect()->route('registrar'); // Define this route
                case 2:
                    return redirect()->route('registrar');
                case 3:
                    return redirect()->route('registrar');
                case 4:
                    return redirect()->route('registrar');
                case 5:
                    return redirect()->route('programHead');
                case 6:
                    return redirect()->route('professor');
                case 7:
                    return redirect()->route('treasury');
                case 8:
                    return redirect()->route('HumanResource');
                case 9:
                    return redirect()->route('student');
                default:
                    return redirect()->route('home');
            }
        } else {
            return back()->withErrors(['email' => 'Invalid credentials.']);
        }
    }
}                       
