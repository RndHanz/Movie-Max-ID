<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Signup;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
	// proses login
	public function authenticate(Request $request)
	{
		$request->validate([
			'login' => 'required|string',
			'password' => 'required|string',
		]);

		$login = $request->input('login');
		$password = $request->input('password');

		$user = Signup::where('email', $login)->orWhere('username', $login)->first();

		if (!$user || !Hash::check($password, $user->password)) {
			return back()->withErrors(['login' => 'Username/email atau password salah'])->withInput();
		}

		// set session sederhana
		session(['user_id' => $user->id, 'username' => $user->username]);

		return redirect('/moviepage');
	}

	// logout
	public function logout(Request $request)
	{
		$request->session()->forget(['user_id', 'username']);
		$request->session()->flush();
		return redirect('/login');
	}
}
