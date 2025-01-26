<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginAuth extends Controller
{
    public function LoginPage()
    {
    if (session()->has('user')) {
        $user = session('user');

        if ($user->first_time_log_in == 1) {
            return redirect()->route('change_password');
        }

        return $this->redirectToRolePage($user->role_id); 
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

        if ($user->first_time_log_in == 1) {
            return redirect()->route('change_password');
        }

        return $this->redirectToRolePage($user->role_id);
    }

    return redirect()->route('login')->withErrors('Invalid username or password');
    }


    private function redirectToRolePage($role_id)
    {
        $user = session('user');
    
        if ($user->first_time_log_in == 1) {
            return redirect()->route('change_password'); 
        }
    
        if ($role_id == 'admin') {
            return redirect()->route('registrar'); // Admin or registrar
        } elseif ($role_id == 'registrar') {
            return redirect()->route('registrar'); // Admin or registrar
        } elseif ($role_id == 'treasury') {
            return redirect()->route('course'); // Treasury
        } elseif ($role_id == 'program_head') {
            return redirect()->route('course'); // Program Head
        } elseif ($role_id == 'human_resource') {
            return redirect()->route('course'); // Human Resource
        } elseif ($role_id == 'professors') {
            return redirect()->route('course'); // Professors
        } elseif ($role_id == 'student') {
            return redirect()->route('student_dashboard'); // Students
        }
    
        // Default route if no role matches
        return redirect()->route('login')->withErrors(['Role not found']);
    }
    
    public function changePasswordPage()

    {
    return view('first_time_log_in'); 
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed',
        ]);
    
        $user = session('user');
    
        if ($user->password === $request->password) {
            return redirect()->back()->with('error', 'The new password cannot be the same as the current password.');
        }
    
        DB::table('users')
            ->where('id', $user->id)
            ->update([
                'password' => $request->password,
                'first_time_log_in' => 0,
            ]);
    
        $user->first_time_log_in = 0;
        $user->password = $request->password;
        session(['user' => $user]);
    
        return $this->redirectToRolePage($user->role_id);
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


