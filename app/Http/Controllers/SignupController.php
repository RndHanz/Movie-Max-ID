<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Signup;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
	public function create()
	{
		return view('signup');
	}

	public function store(Request $request)
	{
		$validated = $request->validate([
			'email' => 'required|email|unique:signups,email',
			'username' => 'required|string|unique:signups,username',
			'password' => 'required|string|min:6',
		]);

		Signup::create([
			'email' => $validated['email'],
			'username' => $validated['username'],
			'password' => Hash::make($validated['password']),
		]);

		return redirect('/login')->with('success', 'Akun berhasil dibuat. Silakan login.');
	}
}
