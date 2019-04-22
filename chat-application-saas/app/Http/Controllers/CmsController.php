<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Plan;
use DB;
use View;

class CmsController extends Controller {

	public function __construct() {

	}

	protected $layout = 'layouts.UI';

	public function index() {

		$data['page_title'] = 'Home Page';

		return View::make('UI.index', $data);
	}

	public function all_plans() {
		$data['page_title'] = 'Plans';
		$data['features'] = DB::table('chat_features')->orderBy('position_order')->get();
		$planData = Plan::getAllPlans();

		if ($planData) {
			$data['planData'] = $planData;
		}

		return View::make('UI.plans', $data);
	}

	public function features() {
		$data['page_title'] = 'Features';

		return View::make('UI.features', $data);
	}

	public function login() {
		$data['page_title'] = 'Login';

		return View::make('auth.login', $data);
	}

	public function register() {
		$data['page_title'] = 'Register Company';

		return View::make('auth.register', $data);
	}

	public function forgot_password() {
		$data['page_title'] = 'Forgot Password';

		return View::make('auth.password', $data);
	}

	public function reset_password($link) {
		$data['page_title'] = 'Reset Password';
		$data['token'] = $link;

		return View::make('auth.reset', $data);
	}
}
