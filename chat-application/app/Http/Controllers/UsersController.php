<?php

namespace App\Http\Controllers;

use App\Group;
use App\Message;
use App\User;
use App\UserRelation;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Validator;

class UsersController extends Controller {
	/**
	 * Retrieve the user for the given ID.
	 *
	 * @param  int  $id
	 * @return Response
	 * //UserRelation, Validator
	 */

	public function get_all_users() {
		try {

			$data = User::all();

			return response()->json([
				'status' => 'success',
				'code' => 200,
				'message' => 'Users Record',
				'data' => ['users' => $data],
			]);

		} catch (Exception $e) {
			return response()->json([
				'status' => 'error',
				'code' => 400,
				'message' => $e->getMessage(),
				'data' => null,
			]);
		}

	}

	public function get_coach_users(Request $request) {
		if ($request->isMethod('post')) {
			try {
				$validator = Validator::make($request->all(), [
					'coach_id' => 'required',
					'offset' => 'required',
					'limit' => 'required',
				]);

				if ($validator->fails()) {
					return response()->json([
						'status' => 'error',
						'code' => 400,
						'message' => 'Fill these required fields.',
						'data' => ['validations' => $validator->errors()->getMessages()],
					]);

				}

				$coach_id = $request->coach_id;
				$portalDomain = 'http://portal.offshoresolutions.nl/';  // Portal acceptance url
				/**************************Get portal usres**************************/

				$data_array = array(
					"cuid" => $coach_id,
					"action" => 'get',
				);

				$curl = curl_init();
				curl_setopt_array($curl, array(
					CURLOPT_RETURNTRANSFER => 1,
					CURLOPT_URL => $portalDomain.'wp-json/fitzeme/v2/Profile/getGroupUsers/?lang=en',
					CURLOPT_USERAGENT => 'Codular Sample cURL Request',
					CURLOPT_POST => 1,
					CURLOPT_POSTFIELDS => $data_array,
				));

				$resp = curl_exec($curl);
				$responce = json_decode($resp);

				if ($responce->status == 'error') {
					echo json_encode([
						'status' => 'error',
						'message' => $responce->status_message,
					]);
					die;
				}
				if ($responce->data) {

					foreach ($responce->data as $key => $value) {
						$first_name = '';
						$last_name = '';
						$email = $value->user_email;
						$mobile = '';

						foreach ($value->meta_data as $key => $metavalue) {

							if ($metavalue->meta_key == 'first_name') {
								$first_name = $metavalue->meta_value;
							}
							if ($metavalue->meta_key == 'last_name') {
								$last_name = $metavalue->meta_value;
							}
							if ($metavalue->meta_key == 'mobile_no') {
								$mobile = $metavalue->meta_value;
							}
						}
						$userData = array("first_name" => $first_name, "last_name" => $last_name, "email" => $email, "mobile" => $mobile);
						$usersExistRaw = DB::table('users')->where('email', $email)->get();

						if (count($usersExistRaw) == 0) {
							$newuser = User::create($userData);
							$userRelation = ['parent' => new \MongoDB\BSON\ObjectID($coach_id), 'user_id' => new \MongoDB\BSON\ObjectID($newuser->id), 'flag' => 0];
							DB::table('user_relations')->insert($userRelation);

							/////////  update meta /////////////

							$metadata_array = array(
								"id" => $value->ID,
								"chat_udid" => $newuser->id,
								"action" => 'update',
							);

							$curl = curl_init();
							curl_setopt_array($curl, array(
								CURLOPT_RETURNTRANSFER => 1,
								CURLOPT_URL => $portalDomain.'wp-json/fitzeme/v2/Profile/getGroupUsers/?lang=en',
								CURLOPT_USERAGENT => 'Codular Sample cURL Request',
								CURLOPT_POST => 1,
								CURLOPT_POSTFIELDS => $metadata_array,
							));

							$resp = curl_exec($curl);
							$responceUpdate = json_decode($resp);

							////// end update meta //////////

						} else {

							//////////  update meta //////////////

							$metadata_array = array(
								"id" => $value->ID,
								"chat_udid" => $usersExist['_id'],
								"action" => 'update',
							);

							$curl = curl_init();
							curl_setopt_array($curl, array(
								CURLOPT_RETURNTRANSFER => 1,
								CURLOPT_URL => $portalDomain.'wp-json/fitzeme/v2/Profile/getGroupUsers/?lang=en',
								CURLOPT_USERAGENT => 'Codular Sample cURL Request',
								CURLOPT_POST => 1,
								CURLOPT_POSTFIELDS => $metadata_array,
							));

							$resp = curl_exec($curl);
							$responceUpdate = json_decode($resp);

							//////////// end update meta ////////////////
						}
					}
				}

				/**************************End get portal usres**************************/

				$offset = (int) $request->offset;
				$limit = (int) $request->limit;
				$coachUsers = DB::table('user_relations')
					->select('user_id')
					->where('parent', '=', new \MongoDB\BSON\ObjectID($coach_id))
					->where('flag', 0)
					->get();

				$childusers = array();
				foreach ($coachUsers as $key => $value) {
					if (!empty($value['user_id'])) {
						$childusers[] = $value['user_id'];
					}
				}

				$allUsers = DB::table('users')
					->whereIn('_id', $childusers)
					->offset($offset)
					->limit($limit)
					->orderBy('updated_at', 'desc')
					->get();
				$newAllUsers = array();
				foreach ($allUsers as $key => $value) {
					$messageCount = Message::getNewMessagesCount($value['_id'], $coach_id);
					$messageGroup = Group::getUserGroupId($value['_id'], $coach_id);
					$value['new_message_count'] = $messageCount;
					if (count($messageGroup) == 0) {
						$value['chat_groupId'] = 'NA';
					} else {
						$value['chat_groupId'] = $messageGroup[0]['_id'];
					}

					$newAllUsers[$key] = $value;
				}

				return response()->json([
					'status' => 'success',
					'code' => 200,
					'message' => 'Users Record',
					'data' => ['users' => $newAllUsers],
				]);

			} catch (Exception $e) {
				return response()->json([
					'status' => 'error',
					'code' => 400,
					'message' => $e->getMessage(),
					'data' => null,
				]);
			}
		}

	}

	public function getmodel(Request $request) {
		if ($request->isMethod('post')) {
			$data = User::getdata($request->coach_id);

			print_r($data->toArray());

		}

	}

	public function add_user(Request $request) {
		if ($request->isMethod('post')) {
			try {

				$validator = Validator::make($request->all(), [
					'first_name' => 'required',
					'last_name' => 'required',
					'email' => 'required|email',
					//'mobile' => 'required', /*unique:users*/
					//'gender' => 'required',
				]);
				if ($validator->fails()) {
					return response()->json([
						'status' => 'error',
						'code' => 400,
						'message' => 'Fill these required fields.',
						'data' => ['validations' => $validator->errors()->getMessages()],
					]);

				}

				$data = json_decode($request->getContent(), true);

				$usersExistRaw = DB::table('users')->where('email', $data['email'])->get();

				if (count($usersExistRaw) == 0) {
					
					if ($data['created_by'] != 'NA') {

						$user = User::create($data);					

						if (isset($data['created_by']) && !empty($data['created_by'])) {
							$userRelation = ['parent' => new \MongoDB\BSON\ObjectID($data['created_by']), 'user_id' => new \MongoDB\BSON\ObjectID($user->id), 'flag' => 0];
						} else {
							$userRelation = ['parent' => new \MongoDB\BSON\ObjectID($user->id), 'flag' => 0];
						}

						DB::table('user_relations')->insert($userRelation);
					}

					return response()->json([
						'status' => 'success',
						'code' => 201,
						'message' => 'User add successfully',
						'data' => ['user_id' => array('$oid' => $user->id)],
					]);
				} else {
					$usersExist = $usersExistRaw->jsonSerialize()[0];
					return response()->json([
						'status' => 'error',
						'code' => 400,
						'message' => 'User already exist.',
						'data' => ['user_id' => $usersExist['_id']],
					]);
				}

			} catch (Exception $e) {
				return response()->json([
					'status' => 'error',
					'code' => 400,
					'message' => $e->getMessage(),
					'data' => null,
				]);
			}
		}

	}

	public function reassign_coach(Request $request) {
		if ($request->isMethod('post')) {

			try {

				$validator = Validator::make($request->all(), [
					'user_id' => 'required',
					'new_coach_id' => 'required',
				]);
				if ($validator->fails()) {
					return response()->json([
						'status' => 'error',
						'code' => 400,
						'message' => 'Fill these required fields.',
						'data' => ['validations' => $validator->errors()->getMessages()],
					]);

				}

				$data = json_decode($request->getContent(), true);

				$user_id = new \MongoDB\BSON\ObjectID($data['user_id']);
				$new_coach = new \MongoDB\BSON\ObjectID($data['new_coach_id']);

				$usersExistCoach = DB::table('user_relations')->where('user_id', $user_id)->where('parent', $new_coach)->get();
				DB::table('user_relations')->where('user_id', $user_id)->update(['flag' => 1]);

				if (count($usersExistCoach) > 0) {
					DB::table('user_relations')->where('user_id', $user_id)->where('parent', $new_coach)->update(['flag' => 0]);
				} else {
					$userRelation = ['parent' => $new_coach, 'user_id' => $user_id, 'flag' => 0];
					DB::table('user_relations')->insert($userRelation);
				}

				return response()->json([
					'status' => 'success',
					'code' => 200,
					'message' => 'Assigned successfully.',
					'data' => null,
				]);

			} catch (Exception $e) {
				return response()->json([
					'status' => 'error',
					'code' => 400,
					'message' => $e->getMessage(),
					'data' => null,
				]);
			}
		}

	}

	public function delete_all() {
		$tables = array('users', 'user_relations');
		foreach ($tables as $key => $table) {

			$count = DB::table($table)->count();

			$deleteUs = DB::table($table)->take($count)->skip(1)->orderBy('desc')->get();

			foreach ($deleteUs as $deleteMe) {

				DB::table($table)->where('_id', new \MongoDB\BSON\ObjectID($deleteMe['_id']))->delete();
			}
		}

		echo 'Deleted';
	}

	public function test() {
		$test = User::getdata();
		return $test;
	}

}