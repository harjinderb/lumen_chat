<?php
namespace App\Http\Controllers;
use App\Comapny;
use App\Http\Controllers\Controller;
use App\Plan;
use App\User;
use Auth;
use DB;
use File;
use Hash;
use Illuminate\Validation\Rule;
use Image;
use Input;
use Redirect;
use Request;
use Session;
use URL;
use Validator;
use View;

class AdminController extends Controller {

	public function __construct() {
		$this->middleware('auth');

		$this->middleware(function ($request, $next) {
			$this->user = Auth::user();

			if ($this->user->role != 'admin') {
				return Redirect::to($this->user->role . '/dashboard');
			}
			return $next($request);
		});

	}

	public function notUse() {
		$avuthdata = $this->Auth();
	}

	public function index() {
		$data['page_title'] = 'Home Page';

		return view('admin.dashboard', $data);
	}

	public function addnew() {

		return view('admin.adduser');
	}

	public function manageuser() {

		$users = User::getusers();

		$data['allUsers'] = $users;
		return View::make('admin.manageuser', $data);

	}

	public function user_view() {
		$id = Auth::user()->_id;
		$data['userId'] = $id;
		$data['page_title'] = 'View Profile';
		$data['userData'] = '';

		$userData = User::getUserData($id);

		if ($userData) {
			$data['userData'] = $userData[0];
		}

		return View::make('admin.userView', $data);

	}
	public function user_edit() {

		if (Request::isMethod('post')) {

			$data = Input::all();
			$id = $data['id'];
			$bsonId = new \MongoDB\BSON\ObjectID($id);

			$validator = Validator::make(Input::all(), [
				'first_name' => 'required',
				'last_name' => 'required',
				'email' => [
					'required',
					Rule::unique('users')->where(function ($query) use ($bsonId) {
						return $query->where('_id', '!=', $bsonId);
					}),
				],
				'mobile' => 'required|numeric',
				'address' => 'required|min:5',
				'about_me' => 'required|min:15',
				'password' => 'nullable|min:6',
				'confirmPassword' => 'nullable|min:6|same:password',
			]);

			if ($validator->fails()) {
				return redirect('admin/profile')->withInput(Input::all())->withErrors($validator->errors()->getMessages());
			}

			$data = Input::except(array('_token', 'confirmPassword', 'id'));

			if (Input::file('avtar') !== null) {

				$destinationPath = 'uploads/' . $id;

				$oldumask = umask(0);
				if (!file_exists(base_path() . "/public/" . $destinationPath)) {
					mkdir(base_path() . "/public/" . $destinationPath, 0777);
				}
				umask($oldumask);

				$path_parts = pathinfo(Input::file('avtar')->getClientoriginalName());
				$file = array('file' => Input::file('avtar'),
					'file_name' => Input::file('avtar')->getClientoriginalName(),
					'extension' => Input::file('avtar')->getClientOriginalExtension());

				$rules = array('file' => 'required|max:50000',
					'extension' => 'required|in:png,jpg,jpeg,gif',
					'file_name' => 'required',
				);

				$validator = Validator::make($file, $rules);

				if ($validator->fails()) {
					return redirect('admin/profile')->withInput(Input::all())->withErrors($validator->errors()->getMessages());
				} else {
					$path_parts = pathinfo(Input::file('avtar')->getClientoriginalName());

					if (Input::file('avtar')->isValid()) {
						$image = Input::file('avtar');

						$extension = $image->getClientOriginalExtension(); // getting image extension
						$fileName = $path_parts['filename'] . '-75x75.' . $extension; // renameing image
						$fileName1 = $path_parts['filename'] . '-120x120.' . $extension; // renameing image
						$fileName2 = $path_parts['filename'] . '-200x200.' . $extension; // renameing image

						$filename = $image->getClientOriginalName();

						Image::make($image->getRealPath())->save($destinationPath . '/' . $filename);
						Image::make($image->getRealPath())->resize(75, 75)->save($destinationPath . '/' . $fileName);
						Image::make($image->getRealPath())->resize(120, 120)->save($destinationPath . '/' . $fileName1);
						Image::make($image->getRealPath())->resize(200, 200)->save($destinationPath . '/' . $fileName2);
						$fileBasePath = URL::to('/') . "/" . $destinationPath . "/" . $path_parts['filename'] . '.' . $extension;
						$data['image'] = $fileBasePath;
						unset($data['avtar']);

					}

				}
			}

			if (Input::get('password') != '') {
				$data['password'] = Hash::make(Input::get('password'));
			} else {
				unset($data['password']);
			}

			DB::table('users')->where('_id', $bsonId)->update($data);
			Session::flash('message', 'Profile has successfully been updated.');
			Session::flash('alert-class', 'alert-success');
			return Redirect::to('admin/profile');

		}

		return Redirect::to('admin/profile');

	}

	public function re_ordering_feature() {

		if (Request::isMethod('post')) {

			$data = Input::all();
			$newOrder = $data['order'];
			$totalFeatures = count($newOrder);

			for ($i = 0; $i < $totalFeatures; $i++) {
				$featureId = new \MongoDB\BSON\ObjectID(substr($newOrder[$i], 3));
				$orderNumber = (int) $i + 1;

				$newData = array('position_order' => $orderNumber);
				DB::table('chat_features')->where('_id', $featureId)->update($newData);
			}

			return 'success';
		}

	}

	public function manage_features() {
		$id = Auth::user()->_id;
		$data['userId'] = $id;
		$data['page_title'] = 'Manage Chat Features';
		$data['features'] = '';

		$planData = DB::table('chat_features')->orderBy('position_order')->get();

		if ($planData) {
			$data['features'] = $planData;
		}
		return View::make('admin.managePlansFeatures', $data);

	}

	public function add_feature() {

		if (Request::isMethod('post')) {

			$data = Input::all();
			$featureId = new \MongoDB\BSON\ObjectID($data['id']);

			$validator = Validator::make(Input::all(), [
				'feature' => 'required',
			]);

			if ($validator->fails()) {
				return $validator->errors()->getMessages();
			}

			$data1 = Input::except(array('_token', 'id'));

			$featureId = DB::table('chat_features')->insertGetId($data1);

			$response = array('status' => 'sucess', 'featureId' => (string) $featureId);
			return $response;
		}

	}

	public function edit_feature() {

		if (Request::isMethod('post')) {

			$data = Input::all();
			$featureId = new \MongoDB\BSON\ObjectID($data['id']);

			$validator = Validator::make(Input::all(), [
				'feature' => 'required',
			]);

			if ($validator->fails()) {
				return $validator->errors()->getMessages();
			}

			$data1 = Input::except(array('_token', 'id'));

			DB::table('chat_features')->where('_id', $featureId)->update($data1);

			return 'sucess';
		}
	}

	public function delete_feature() {

		if (Request::isMethod('post')) {

			$data = Input::all();
			$featureId = new \MongoDB\BSON\ObjectID($data['id']);

			DB::table('chat_features')->where('_id', $featureId)->delete();
			return;
		}
	}

	public function manage_plans() {
		$id = Auth::user()->_id;
		$data['userId'] = $id;
		$data['page_title'] = 'Manage Plans';
		$data['planData'] = '';

		$planData = Plan::all();

		if ($planData) {
			$data['planData'] = $planData;
		}

		return View::make('admin.managePlans', $data);

	}

	public function add_plan() {
		$id = Auth::user()->_id;
		$data['page_title'] = 'Add New Plan';

		$data['features'] = DB::table('chat_features')->orderBy('position_order')->get();

		if (Request::isMethod('post')) {

			$validator = Validator::make(Input::all(), [
				'name' => 'required',
				'price' => 'required|numeric',
				'trial_days' => 'required|numeric',
			]);

			if ($validator->fails()) {
				return redirect('admin/plans/add')->withInput(Input::all())->withErrors($validator->errors()->getMessages());
			}

			$data1 = Input::except(array('_token', 'feature'));
			$current = new \MongoDB\BSON\UTCDateTime(strtotime(date("Y-m-d H:i:s")) * 1000);

			$data1['currency'] = '$';
			$data1['status'] = 0;
			$data1['created_at'] = $current;
			$data1['updated_at'] = $current;

			$features = Input::get('feature');

			$planId = DB::table('plans')
				->insertGetId($data1);

			$planId = (string) $planId;
			if (!empty($features)) {
				foreach ($features as $key => $feature) {
					DB::table('plan_features')->insert(['plan_id' => new \MongoDB\BSON\ObjectID($planId), 'feature_id' => new \MongoDB\BSON\ObjectID($feature)]);
				}
			}
			Session::flash('message', 'The new plan has successfully been created.');
			Session::flash('alert-class', 'alert-success');
			return Redirect::to('admin/plans/list');
		}

		return View::make('admin.addPlan', $data);

	}

	public function edit_plan($id = null) {
		$userId = Auth::user()->_id;
		$data['page_title'] = 'Plan Edit';
		$data['planData'] = '';
		$data['features'] = DB::table('chat_features')->orderBy('position_order')->get();
		if (Request::isMethod('post')) {

			$data = Input::all();
			$bsonId = new \MongoDB\BSON\ObjectID($id);

			$validator = Validator::make(Input::all(), [
				'name' => 'required',
				'price' => 'required|numeric',
				'trial_days' => 'required|numeric',
			]);

			if ($validator->fails()) {
				return redirect('admin/plans/edit')->withInput(Input::all())->withErrors($validator->errors()->getMessages());
			}

			$data1 = Input::except(array('_token', 'id', 'feature'));
			$planId = new \MongoDB\BSON\ObjectID(Input::get('id'));
			$current = new \MongoDB\BSON\UTCDateTime(strtotime(date("Y-m-d H:i:s")) * 1000);
			if (!Input::get('popular')) {
				$data1['popular'] = 'off';
			}
			$data1['updated_at'] = $current;

			DB::table('plans')->where('_id', $planId)->update($data1);

			$features = Input::get('feature');

			if (!empty($features)) {
				DB::table('plan_features')->where('plan_id', $planId)->delete();
				foreach ($features as $key => $feature) {
					DB::table('plan_features')->insert(['plan_id' => new \MongoDB\BSON\ObjectID($planId), 'feature_id' => new \MongoDB\BSON\ObjectID($feature)]);
				}
			}
			Session::flash('message', 'The plan has successfully been updated.');
			Session::flash('alert-class', 'alert-success');
			return Redirect::to('admin/plans/list');
		}

		$planData = Plan::getPlanData($id);

		if ($planData) {
			$data['planData'] = $planData[0];
		}

		return View::make('admin.editPlan', $data);

	}

	public function delete_plan() {

		if (Request::isMethod('post')) {

			$data = Input::all();
			$planId = new \MongoDB\BSON\ObjectID($data['id']);

			DB::table('plans')->where('_id', $planId)->delete();
			DB::table('plan_features')->where('plan_id', $planId)->delete();
			return;
		}
	}

	public function manage_owners_users() {
		$id = Auth::user()->_id;
		$data['userId'] = $id;
		$data['page_title'] = 'Manage Users';
		$data['allUsers'] = '';

		$userData = User::where('role', 'owner')->get();

		if ($userData) {
			$data['allUsers'] = $userData->toArray();
		}
		return View::make('admin.manageUsers', $data);

	}

	public function user_complete_data() {
		$result = array();
		if (Request::isMethod('post')) {
			$data = Input::all();
			$userId = new \MongoDB\BSON\ObjectID($data['id']);

			$userData = User::getUserData($userId);
			if ($userData) {
				$result['userData'] = $userData->toArray()[0];
			} else {
				$result['userData'] = NULL;
			}

			$companyData = Comapny::getComapanyData($data['id']);
			$result['userAnotgerData'] = $companyData->toArray();

			return $result;
		}
	}

	public function change_user_status() {

		if (Request::isMethod('post')) {

			$data = Input::all();
			$userId = new \MongoDB\BSON\ObjectID($data['id']);

			$data1 = Input::except(array('_token', 'id'));
			$status = ['status' => (integer) $data1['status']];

			DB::table('users')->where('_id', $userId)->update($status);

			return 'sucess';
		}
	}

////----------------------- End Class
}
