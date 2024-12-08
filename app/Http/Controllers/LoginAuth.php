<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginAuth extends Controller
{
    public function LoginPage()
    {
        if (session()->has('user')) {
            $role_id = session('user')->role_id;
            return $this->redirectToRolePage($role_id); 
        }

        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = DB::table('users')->where('username', $request->username)->first();

        if ($user && $user->password === $request->password) {
            session(['user' => $user]); 
            return $this->redirectToRolePage($user->role_id); 
        }

        return redirect()->route('login')->withErrors('Invalid username or password');
    }

    private function redirectToRolePage($role_id)
    {
        //change role_id to what ur database has for roles
        if ($role_id == 1) {
            return redirect()->route('admin');  // Admin or registrar
        } elseif ($role_id == 2) {
            return redirect()->route('registrar'); // Admin or registrar
        } elseif ($role_id == 4) {
            return redirect()->route('treasury'); // Treasury
        } elseif ($role_id == 5) {
            return redirect()->route('program_head'); // Program Head
        } elseif ($role_id == 'human_resource') {
            return redirect()->route('course'); // Human Resource
        } elseif ($role_id == 6) {
            return redirect()->route('professor'); // Professors
        } elseif ($role_id == 7) {
            return redirect()->route('student_dashboard'); // Students
        }
    
        // Default route if no role matches
        return redirect()->route('login')->withErrors(['Role not found']);
    }

    public function logout()
    {
        session()->forget('user');
        return redirect()->route('login');
    }

    public function Unback()
    {
        if (session()->has('user')) {
            $role_id = session('user')->role_id;
            return $this->redirectToRolePage($role_id);  
        }

        return view('login');
    }


    public function RootPage()
    {
        if (session()->has('user')) {
            $role_id = session('user')->role_id;
            return $this->redirectToRolePage($role_id); 
        }

        return view('welcome'); 
    }
}


