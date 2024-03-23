<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|unique:users|min:3|max:255',
            'email' => 'required|unique:users|email:dns',
            'password' => 'required|min:5|max:255',
        ]);

        User::create($validatedData);
        return redirect('/login')->with('success', 'Registration successfull! Please login');
    }
}
