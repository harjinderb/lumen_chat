<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use DB;
use Hash;
use Input;
use Mail;
use Redirect;
use Request;
use Session;
use Validator;
use \App\User;

class UsersController extends Controller {

	public function index() {
		$data = Auth::user();
		return $data;
	}

	public function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	public function register() {
		if (Request::isMethod('post')) {

			$validator = Validator::make(Input::all(), [
				'first_name' => 'required',
				'last_name' => 'required',
				'email' => 'required|email|unique:users',
				'mobile' => 'required|numeric',
				'password' => 'required|min:6',
				'confirmPassword' => 'required|min:6|same:password',
				'company_name' => 'required',
				'company_email' => 'required|email',
				'company_mobile' => 'required|numeric',
			]);

			if ($validator->fails()) {
				return redirect('register')->withInput(Input::all())->withErrors($validator->errors()->getMessages());
			}

			$data = Input::all();
			$data = Input::except(array('_token', 'confirmPassword'));

			$data1 = array('password' => Hash::make($data['password']), 'role' => 'owner', 'status' => 0);
			$data2 = array_replace($data, $data1);

			$newuser = User::create($data2);

			if ($newuser) {
				$randonString = $this->generateRandomString();
				$current_date = new \MongoDB\BSON\UTCDateTime(strtotime(date("Y-m-d H:i:s")) * 1000);
				$secret_key = sha1($newuser->id . $randonString);
				$access_key = md5($newuser->id);
				$tocken = sha1($secret_key . $access_key);
				$userCompanyRelation = [
					'user_id' => new \MongoDB\BSON\ObjectID($newuser->id),
					'name' => $data['company_name'],
					'email' => $data['company_email'],
					'mobile' => $data['company_mobile'],
					'secret_key' => $secret_key,
					'access_key' => $access_key,
					'tocken' => $tocken,
					'status' => 0,
					'created_at' => $current_date,
					'updated_at' => $current_date,
				];

				DB::table('companies')->insert($userCompanyRelation);
			}

			$user = array(
				'to' => Input::get('email'),
				'from' => 'harjinder.bali@offshoresolutions.nl',
				'subject' => 'Company registered.',
				'name' => Input::get('first_name') . ' ' . Input::get('last_name'),
			);

			$data['emaildata'] = array(
				'name' => Input::get('first_name') . ' ' . Input::get('last_name'),
				'link' => base64_encode(Input::get('email')) . 'balilab' . base64_encode($data1['password']),
			);

			Mail::send('emails.activation', $data, function ($message) use ($user) {
				$message->from($user['from'], 'Chat Server - ' . $user['name'] . '!');
				$message->to($user['to'], $user['name'])->subject($user['subject']);
			});

			Session::flash('message', 'Successfully registration. Please check your email and activate your account.');
			Session::flash('alert-class', 'alert-success');
			return Redirect::to('/register');

		} else {
			return Redirect::to('/register');
		}

	}

	public function forgot_password() {
		if (Request::isMethod('post')) {

			$validator = Validator::make(Input::all(), [
				'email' => 'required|email|exists:users',
			]);

			if ($validator->fails()) {
				return redirect('forgot')->withInput(Input::all())->withErrors($validator->errors()->getMessages());
			}

			$data = Input::all();
			$email = $data['email'];

			$users = User::where('email', $email)->get()->jsonSerialize()[0];

			$randonString = $this->generateRandomString();
			$randonString1 = $this->generateRandomString();

			$user = array(
				'to' => $email,
				'from' => 'harjinder.bali@offshoresolutions.nl',
				'subject' => 'Change password request..',
				'name' => $users['first_name'] . ' ' . $users['last_name'],
			);

			$data['emaildata'] = array(
				'name' => $users['first_name'] . ' ' . $users['last_name'],
				'link' => sha1($users['password']) . $randonString1 . base64_encode($randonString1 . $users['password'] . $randonString . md5($users['email'])),
			);

			Mail::send('emails.forgot', $data, function ($message) use ($user) {
				$message->from($user['from'], 'Chat Server - ' . $user['name'] . '!');
				$message->to($user['to'], $user['name'])->subject($user['subject']);
			});

			Session::flash('message', 'Chage password link sent on your email.');
			Session::flash('alert-class', 'alert-success');
			return Redirect::to('/forgot');

		} else {
			return Redirect::to('/forgot');
		}
	}

	public function user_activate($link = null) {
		if ($link) {
			$link = explode('balilab', $link);

			$user_data = User::where('email', base64_decode($link[0]))->get()->jsonSerialize();

			if ($user_data) {
				$userData = $user_data[0];
				if ($userData['status'] == 0) {
					$user = User::find($userData['_id']);
					$user->status = 1;
					$user->save();
					Session::flash('message', 'Your account has been activate successfully. You can login.');
					Session::flash('alert-class', 'alert-success');
				} else {
					Session::flash('message', 'Your account has been activated already!');
					Session::flash('alert-class', 'alert-danger');
				}

			} else {
				Session::flash('message', 'Activation link expired.');
				Session::flash('alert-class', 'alert-danger');
			}
		} else {
			Session::flash('message', 'Activation link expired.');
			Session::flash('alert-class', 'alert-danger');
		}

		return Redirect::to('/login');
	}

	public function reset_password() {
		if (Request::isMethod('post')) {

			$validator = Validator::make(Input::all(), [
				'password' => 'required|min:6',
				'confirmPassword' => 'required|min:6|same:password',
			]);

			if ($validator->fails()) {
				return redirect('resetpassword/' . Input::get('token'))->withInput(Input::all())->withErrors($validator->errors()->getMessages());
			}

			$data = Input::all();
			$data = Input::except(array('_token', 'confirmPassword'));
			$token = substr($data['token'], 50);
			$token = substr(base64_decode($token), 10, -42);

			$token = utf8_encode(utf8_decode($token));
			$user_data = User::where('password', $token)->get()->jsonSerialize();

			if ($user_data) {
				$userData = $user_data[0];
				$password = Hash::make($data['password']);
				$user = User::find($userData['_id']);
				$user->password = $password;
				$user->save();
			} else {
				Session::flash('message', 'Wrong change password link.');
				Session::flash('alert-class', 'alert-danger');
				return Redirect::to('/forgot');

			}

			Session::flash('message', 'Password changed successfully.');
			Session::flash('alert-class', 'alert-success');
			return Redirect::to('/login');

		} else {
			return Redirect::to('/login');
		}

	}

	public function login() {

		$userdata = array(
			'email' => trim(Input::get('email')),
			'password' => trim(Input::get('password')),
			'status' => 1,
		);

		if (Auth::attempt($userdata)) {

			$current = new \MongoDB\BSON\UTCDateTime(strtotime(date("Y-m-d H:i:s")) * 1000);
			DB::table('users')->where('email', $userdata['email'])->update(['updated_at' => $current]);

			if (Auth::user()->role == 'admin') {
				return Redirect::to('/admin/dashboard');
			} else {
				return Redirect::to('/');
			}

		} else {
			Session::flash('message', 'Please enter correct email or Password.');
			Session::flash('alert-class', 'alert-danger');
			return Redirect::to('/login')->withInput(Input::all());

		}

	}

//---------------------End Class
}
