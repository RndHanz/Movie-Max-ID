<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\Admin\MovieAdminController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;


// Tambahan route untuk /home agar tidak 404
Route::get('/', function () {
    return view('home');
});

Route::get('/signup', [SignupController::class, 'create']);
Route::post('/signup', [SignupController::class, 'store'])->name('signup.store');

Route::get('/login', function () {
    return view('login');
});

// login authenticate
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
// logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// protect moviepage with simple session check
Route::get('/moviepage', function () {
    if (!session('user_id')) {
        return redirect('/login');
    }
    return view('moviepage');
});

// Movie Steaming Route
Route::get('/spiderman', function () {
    return view('/movie_stream/spidermannwh');
});
