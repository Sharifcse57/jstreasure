<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Validator;

class RegisterController extends Controller {
	/*
		    |--------------------------------------------------------------------------
		    | Register Controller
		    |--------------------------------------------------------------------------
		    |
		    | This controller handles the registration of new users as well as their
		    | validation and creation. By default this controller uses a trait to
		    | provide this functionality without requiring any additional code.
		    |
	*/

	use RegistersUsers;

	/**
	 * Where to redirect users after login / registration.
	 *
	 * @var string
	 */
	protected $redirectTo = '/myadmin';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
		$this->middleware('auth');
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data) {
		return Validator::make($data, [
			'name' => 'required|max:255',
			'role_id' => 'required',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|min:6|confirmed',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	protected function create(array $data) {

		return User::create([
			'name' => $data['name'],
			'role_id' => $data['role_id'],
			'email' => $data['email'],
			'status' => $data['status'],
			'password' => bcrypt($data['password']),
		]);
	}

	public function showUserLists(\Request $request) {
		$users = User::with('role')->get();
		return view('auth.show_user_lists', compact('users'));
	}

	public function showUser($id) {
		$users = User::findOrFail($id);
		dd($users);
		//return view('auth.show_user_lists',compact('users'));
	}
	public function editUser($id) {
		$users = User::findOrFail($id);
		$roles = Role::where('id', '>=', auth()->user()->role_id)->pluck('name', 'id');
		//dd($users);
		return view('auth.edit_user', compact('users', 'roles'));
	}

	public function editUserPassword($id) {
		$users = User::findOrFail($id);

		//dd($users);
		return view('auth.edit_user_password', compact('users'));
	}

	public function updateUser($id) {
		$data = request()->only('name', 'role_id', 'status');
		$users = User::find($id);
		$users->fill($data);
		$users->save();
		return redirect('/users');
		// return redirect()->back();
	}

	public function destroyUser($id) {
		$users = User::findOrFail($id);
		$users->delete();
		return redirect()->route('users.index');
	}

	public function editPassword() {
		return view('auth.edit_password');
	}
	public function updatePassword() {
		$id = auth()->user()->id;

	}
}
