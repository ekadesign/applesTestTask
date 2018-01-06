<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
	
	protected $redirectAfterLogin = "/admin/gifts";
	protected $redirectAfterLogout = "/admin";

	public function __construct()
	{
		//$this->middleware('guest', ['except' => 'getLogout']);
	}

	public function getLogin()
	{
		return view('admin.login');
	}
	
	public function postLogin(Request $request)
	{
		$this->validate($request, [
			'email' => 'required|email', 'password' => 'required',
		]);

		$credentials = $request->only('email', 'password');

		if (Auth::attempt($credentials, $request->has('remember')))
		{
			return redirect()->intended( $this->redirectAfterLogin );
		}

		return redirect('/admin/login')
					->withInput($request->only('email', 'remember'))
					->withErrors([
						'email' => "Wrong data",
					]);
	}
	
	public function getLogout()
	{
		Auth::logout();
		return redirect( $this->redirectAfterLogout );
	}


}
