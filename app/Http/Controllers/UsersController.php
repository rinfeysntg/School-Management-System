<?php

namespace App\Http\Controllers;
use App\Models\users;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function index()
    {
        $users = Users::get();

        return view('user/users')->with('users', $users);
    }

    public function store(Request $request)
    {

        $users = new Users();
        $users->name = $request->get('name');
        $users->age = $request->get('age');
        $users->address = $request->get('address');
        $users->username = $request->get('username');
        $users->email = $request->get('email');
        $users->password = $request->get('password');
        $users->role_id = $request->get('role_id');


        $users->save();

        return redirect()->route('usersController')->with('success', 'Users created successfully.');
    }

    public function delete($id)
    {
        $users = Users::find($id);

        if (!$users) {
            return redirect()->route('usersController')->with('error', 'Users not found.');
        }

        $users->delete();

        return redirect()->route('usersController')->with('success', 'Users deleted successfully.');
    }

    public function preEdit($id)
    {
        $users = Users::find($id);

        if (!$users) {
            return redirect()->route('usersController')->with('error', 'Users not found.');
        }

        return view('Users.edit', ['Users' => $users]);
    }

    public function edit(Request $req)
    {
        $users = Users::find($req->id);

        if (!$users) {
            return redirect()->route('usersController')->with('error', 'Users not found.');
        }

        $users->name = $req->name;
        $users->age = $req->age;
        $users->address = $req->address;
        $users->username = $req->username;
        $users->email = $req->email;
        $users->password = $req->password;
        $users->role_id = $req->role_id;

        $users->save();

        return redirect()->route('usersController')->with('success', 'Users updated successfully.');
    }
}
