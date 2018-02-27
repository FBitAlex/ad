<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller {
	
	public function reguserForm() {
		return view('pages.reguser');
	}

	public function reguser(Request $request) {
		
		$this->validate($request, [
			'name' 		=> 'required',
			'email' 	=> 'required|email|unique:users',
			'password' 	=> 'required',
		]);

		$user = User::add($request->all());
		$user->generatePassword($request->get('password'));

		return redirect('/login');
	}



	public function loginForm() {
		return view('pages.login');
	}

	public function login(Request $request) {
		//dd($request->all());

		$this->validate($request, [
			'email' 	=> 'required|email',
			'password' 	=> 'required',
		]);

		$result = Auth::attempt([
			'email' => $request->get('email'),
			'password' => $request->get('password'),
		]);

		if ($result) {
			return redirect('/admin');
		} 

		return redirect()->back()->with('status', 'Wrong Login or Password !' );
	}

	public function logout() {
		Auth::logout();
		return redirect('/');
	}
}
