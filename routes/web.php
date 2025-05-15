<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UploadManager;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::middleware("auth")->group(function(){
    Route::view(uri:"/", view:"welcome")->name("home");
    Route::view(uri:"/about", view:"about")->name("about");
    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');
    Route::post('/contact', function (\Illuminate\Http\Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
        return redirect()->back()->with('success', 'Thank you for your message!');
    })->name('contact.submit');
});

Route::get("/login", [AuthController::class, "login"])
    ->name("login");
Route::post("/login", [AuthController::class, "loginPost"])
    ->name("login.post");

Route::get("/register", [AuthController::class, "register"])
    ->name("register");
Route::post("/register", [AuthController::class, "registerPost"])
    ->name("register.post");

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

Route::get('/home', function () {
    return view('homepage');
})->name('home');

