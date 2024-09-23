<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view(view:"auth.login");
    }

    function loginPost(Request $request){
        $request->validate([
            "email" => "required",
            "password" => "required",
        ]);
        $credentials = $request->only("email","password");
        if (Auth::attempt($credentials)){
            return redirect()->intended(route("home"));
        }
        return redirect(route("login"))
            ->with("error", "Login failed");
    }

    function register()
    {
        return view("auth.register");
    }

    function registerPost(Request $request){
        $request ->validate([
            "firstname" => "required",
            "lastname" => "required",
            "email" => "required",
            "password" => "required",
        ]);

        $user = new User();
        $user->name = $request->firstname;
        $user->name = $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if ($user->save()){
            return redirect(route("login"))
            ->with("success", "User created successfully");
        }
        return redirect(route("register"))
        ->with("error", "Failed to create account");
    }
}
