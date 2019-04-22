<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
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

class OwnerController extends Controller {

	public function __construct() {
		$this->middleware('auth');

		$this->middleware(function ($request, $next) {
			$this->user = Auth::user();

			if ($this->user->role != 'owner') {
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
				return redirect('owner/profile')->withInput(Input::all())->withErrors($validator->errors()->getMessages());
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
					return redirect('owner/profile')->withInput(Input::all())->withErrors($validator->errors()->getMessages());
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
			return Redirect::to('owner/profile');

		}

		return Redirect::to('owner/profile');

	}

	public function all_companies() {
		$id = Auth::user()->_id;
		$data['userId'] = $id;
		$data['page_title'] = 'All Companies';
		$data['companiesData'] = '';

		$userData = DB::table('companies')->where('user_id', new \MongoDB\BSON\ObjectID($id))->get();

		if ($userData) {
			$data['companiesData'] = $userData;
		}
		return View::make('admin.allCompanies', $data);

	}

	public function company_edit() {
		if (Request::isMethod('post')) {

			$data = Input::all();
			$id = $data['id'];
			$bsonId = new \MongoDB\BSON\ObjectID($id);

			$data = Input::except(array('_token', 'id'));
			$data['updated_at'] = new \MongoDB\BSON\UTCDateTime(strtotime(date("Y-m-d H:i:s")) * 1000);

			DB::table('companies')->where('_id', $bsonId)->update($data);
			Session::flash('message', 'The company has successfully been updated.');
			Session::flash('alert-class', 'alert-success');
			return Redirect::to('owner/companies');

		}

	}

////----------------------- End Class
}
