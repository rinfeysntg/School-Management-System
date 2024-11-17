<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Users;
use Illuminate\Support\Facades\Session;

class LoginAuth extends Controller
{

    public function LoginPage()
    {
        if (session()->has('user')) {
            return redirect()->route('registrar');
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
            return redirect()->route('registrar');
        }
    
        return redirect()->route('login')->withErrors('Invalid username or password');


        // $user = DB::table('users')->where('username', $request->username)->first();

        // if ($user && $user->password === $request->password) {
        //     Session::put('user_id', $user->id);
        //     Session::put('username', $user->username);
        //     Session::put('role_id', $user->role_id);
        //     return $this->redirectToRolePage($user->role_id);
        // } 

        return redirect()->back()->withErrors(['Invalid username or password']);
    }

    private function redirectToRolePage($role_id)
    {
        if ($role_id == 1) {
            return redirect()->route('registrar');
        } elseif ($role_id == 2) {
            return redirect()->route('courses');
        }

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
            return redirect()->route('registrar'); 
        }

        return view('login');
    }

    //function userLogin(Request $req)
    //{
       // $data= $req->input();
        //$req->session()->put('user',$data['user']);
        //return redirect('registrar');
    //}
    
}
