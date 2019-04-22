<?php

namespace App\Http\Controllers;

use App\Group;
use App\Message;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use URL;
use Validator;

class MessagesController extends Controller {
	/**
	 * Retrieve the user for the given ID.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	protected function changeEnv($data = array()) {
		if (count($data) > 0) {

			$env = file_get_contents(base_path() . '/.env');

			$env = preg_split('/\s+/', $env);

			foreach ((array) $data as $key => $value) {
				foreach ($env as $env_key => $env_value) {
					$entry = explode("=", $env_value, 2);

					if ($entry[0] == $key) {
						$env[$env_key] = $key . "=" . $value;
					} else {
						$env[$env_key] = $env_value;
					}
				}
			}

			$env = implode("\n", $env);

			file_put_contents(base_path() . '/.env', $env);

			return true;
		} else {
			return false;
		}
	}

	public function get_all_messages() {
		try {

			$data = Message::all();

			return response()->json([
				'status' => 'success',
				'code' => 200,
				'message' => 'All Message',
				'data' => ['users' => $data],
			]);

		} catch (\Exception $e) {
			return response()->json([
				'status' => 'error',
				'code' => 400,
				'message' => $e->getMessage(),
				'data' => null,
			]);
		}

	}

	public function message_seen(Request $request) {
		try {
			$to = $request->to;
			$from = $request->from;

			Message::where('to', new \MongoDB\BSON\ObjectID($to))
				->where('from', new \MongoDB\BSON\ObjectID($from))
				->where('for_me', new \MongoDB\BSON\ObjectID($to))
				->update(['flag' => 1]);

			return response()->json([
				'status' => 'success',
				'code' => 200,
			]);

		} catch (\Exception $e) {
			return response()->json([
				'status' => 'error',
				'code' => 400,
				'message' => $e->getMessage(),
				'data' => null,
			]);
		}

	}

	public function chat_group_users(Request $request) {
		if ($request->isMethod('post')) {
			try {
				$validator = Validator::make($request->all(), [
					'user_id' => 'required',
				]);

				if ($validator->fails()) {
					return response()->json([
						'status' => 'error',
						'code' => 400,
						'message' => 'Fill these required fields.',
						'data' => ['validations' => $validator->errors()->getMessages()],
					]);

				}
				$user_id = $request->user_id;

				$data = Group::get_chatGroup_list($user_id);

				return response()->json([
					'status' => 'success',
					'code' => 200,
					'message' => 'All users chat list',
					'data' => ['chatGroupList' => $data],
				]);

			} catch (\Exception $e) {
				return response()->json([
					'status' => 'error',
					'code' => 400,
					'message' => $e->getMessage(),
					'data' => null,
				]);
			}
		}
	}

	public function get_group($data) {

		$groupName = substr($data['to'], -7, 7) . '_' . substr($data['from'], -7, 7);
		$groupNameRev = substr($data['from'], -7, 7) . '_' . substr($data['to'], -7, 7);

		$getGroup = DB::table('groups')
			->select('_id', 'group_users')
			->where('group_name', '=', $groupName)
			->orWhere('group_name', '=', $groupNameRev)
			->get();

		$groupId = array('group_id' => 'NA');

		if (count($getGroup) > 0) {

			foreach ($getGroup as $key => $value) {
				$groupId['group_id'] = (string) $value['_id'];
			}

			return $groupId['group_id'];
		}

		return $groupId['group_id'];
	}

	public function chat_messages_listing(Request $request) {
		if ($request->isMethod('post')) {
			try {
				$validator = Validator::make($request->all(), [
					'group_id' => 'required',
					'receiver_id' => 'required',
					'offset' => 'required',
					'limit' => 'required',
					'timezone' => 'required',
				]);

				if ($validator->fails()) {
					return response()->json([
						'status' => 'error',
						'code' => 400,
						'message' => 'Fill these required fields.',
						'data' => ['validations' => $validator->errors()->getMessages()],
					]);

				}
				$group_id = $request->group_id;
				$receiver_id = $request->receiver_id;
				$timezone = $request->timezone;

				$this->changeEnv([
					'APP_TIMEZONE' => $timezone,
				]);

				if ($group_id == "NA") {
					return response()->json([
						'status' => 'success',
						'code' => 200,
						'message' => 'No record found.',
						'data' => null,
					]);
				} else {
					$ids = array($group_id, $receiver_id, (int) $request->offset, (int) $request->limit);

					Message::update_flag($ids);
					$data = Message::get_group_chat($ids);
				}
				$finaldata = $data->toArray();

				foreach ($finaldata as $key => $value) {
					if (sizeof($value['attachments']) == 0) {
						foreach ($value['messages'] as $key => $val) {
							$textmessage = substr($val['message'], 42, -40);
							$textmessage = base64_decode($textmessage);
							$textmessage = substr($textmessage, 10, -10);
							$val['message'] = $textmessage;
						}
					}
				}
				return response()->json([
					'status' => 'success',
					'code' => 200,
					'message' => 'All users chat list',
					'data' => ['messagesList' => $finaldata],
				]);

			} catch (\Exception $e) {
				return response()->json([
					'status' => 'error',
					'code' => 400,
					'message' => $e->getMessage(),
					'data' => null,
				]);
			}
		}

	}

	public function common_chat_messages_listing(Request $request) {

		if ($request->isMethod('post')) {
			try {
				$validator = Validator::make($request->all(), [
					'to' => 'required',
					'from' => 'required',
					'offset' => 'required',
					'limit' => 'required',
					'timezone' => 'required',
				]);

				if ($validator->fails()) {
					return response()->json([
						'status' => 'error',
						'code' => 400,
						'message' => 'Fill these required fields.',
						'data' => ['validations' => $validator->errors()->getMessages()],
					]);

				}
				$to = $request->to;
				$from = $request->from;
				$userdata = array('to' => $to, 'from' => $from);
				$group_id = $this->get_group($userdata);

				$timezone = $request->timezone;

				$this->changeEnv([
					'APP_TIMEZONE' => $timezone,
				]);

				if ($group_id == "NA") {
					return response()->json([
						'status' => 'success',
						'code' => 200,
						'message' => 'No record found.',
						'data' => null,
					]);
				} else {
					$ids = array($group_id, $from, (int) $request->offset, (int) $request->limit);

					Message::update_flag($ids);
					$data = Message::get_group_chat($ids);
				}

				$finaldata = $data->toArray();

				foreach ($finaldata as $key => $value) {
					if (sizeof($value['attachments']) == 0) {
						foreach ($value['messages'] as $key => $val) {
							$textmessage = substr($val['message'], 42, -40);
							$textmessage = base64_decode($textmessage);
							$textmessage = substr($textmessage, 10, -10);
							$val['message'] = $textmessage;
						}
					}
				}
				if ((int) $request->offset == 0) {
					$finaldata = array_reverse($finaldata);
				}
				return response()->json([
					'status' => 'success',
					'code' => 200,
					'message' => 'All users chat list',
					'data' => ['messagesList' => $finaldata],
				]);

			} catch (\Exception $e) {
				return response()->json([
					'status' => 'error',
					'code' => 400,
					'message' => $e->getMessage(),
					'data' => null,
				]);
			}
		}

	}

	public function chat_search(Request $request) {
		if ($request->isMethod('post')) {
			try {
				$validator = Validator::make($request->all(), [
					'group_id' => 'required',
					'user_id' => 'required',
					'text' => 'required',
					'timezone' => 'required',
				]);

				if ($validator->fails()) {
					return response()->json([
						'status' => 'error',
						'code' => 400,
						'message' => 'Fill these required fields.',
						'data' => ['validations' => $validator->errors()->getMessages()],
					]);

				}
				$Stext = (string) $request->text;
				$timezone = $request->timezone;

				$this->changeEnv([
					'APP_TIMEZONE' => $timezone,
				]);

				$data = array($request->group_id, $request->user_id);
				$result = Message::search_chat($data);
				$result = $result->toArray();
				$finalReasult = array();
				foreach ($result as $key => $text) {
					$id = new \MongoDB\BSON\ObjectID($text['text_id']);
					$SData = DB::table('chat_messages')->where('_id', $id)->where('message_type', 'text')->where('message', 'LIKE', '%' . $Stext . '%')->orderBy('_id', 'desc')->get();
					if (count($SData->toArray()) > 0) {
						$finalData = $SData->toArray()[0];
						$finalData['offset'] = $key;
						$result[$key]['messages'] = $finalData;

					} else {
						unset($result[$key]);
					}
				}

				return response()->json([
					'status' => 'success',
					'code' => 200,
					'message' => 'Searched text.',
					'data' => ['result' => array_values($result)],
				]);

			} catch (\Exception $e) {
				return response()->json([
					'status' => 'error',
					'code' => 400,
					'message' => $e->getMessage(),
					'data' => null,
				]);
			}
		}
	}

	public function add_message(Request $request) {
		if ($request->isMethod('post')) {
			try {
				$validator = Validator::make($request->all(), [
					'to' => 'required',
					'from' => 'required',
					'file' => 'mimetypes:image/jpeg,image/png,image/jpg,image/gif,video/avi,video/mp4,video/quicktime,video/webm,audio/mp4,audio/mpeg,audio/ogg,audio/webm,application/pdf|max:20000',
				]);

				if ($validator->fails()) {
					return response()->json([
						'status' => 'error',
						'code' => 400,
						'message' => 'Fill these required fields.',
						'data' => ['validations' => $validator->errors()->getMessages()],
					]);

				}

				$data = $request->input();

				$group_data = array();
				if (!empty($data['to']) && empty($data['group_id'])) {
					$group_data['groupType'] = 'one2one';
					$groupName = substr($data['from'], -7, 7) . '_' . substr($data['to'], -7, 7);
					$groupNameRev = substr($data['to'], -7, 7) . '_' . substr($data['from'], -7, 7);
					$current = new \MongoDB\BSON\UTCDateTime(strtotime(date("Y-m-d H:i:s")) * 1000);

					$getGroup = DB::table('groups')
						->select('_id', 'group_users')
						->where('group_name', '=', $groupName)
						->orWhere('group_name', '=', $groupNameRev)
						->get();

					if (count($getGroup) > 0) {

						foreach ($getGroup as $key => $value) {
							$group_data['group_id'] = (string) $value['_id'];
							foreach (array_filter($value['group_users']) as $key => $value) {
								$group_data['group_users'][] = (string) $value;
							}

						}
					} else {
						DB::table('groups')->insert(
							['group_name' => $groupName, 'group_type' => $group_data['groupType'], 'group_users' => [new \MongoDB\BSON\ObjectID($data['to']), new \MongoDB\BSON\ObjectID($data['from'])], 'created_by' => null, 'created_at' => $current, 'updated_at' => $current]
						);

						$getGroup = DB::table('groups')
							->select('_id', 'group_users')
							->where('group_name', '=', $groupName)
							->orWhere('group_name', '=', $groupNameRev)
							->get();

						if (count($getGroup) > 0) {

							foreach ($getGroup as $key => $value) {
								$group_data['group_id'] = (string) $value['_id'];
								foreach (array_filter($value['group_users']) as $key => $value) {
									$group_data['group_users'][] = (string) $value;
								}

							}
						}

					}
					$data['group_id'] = new \MongoDB\BSON\ObjectID($group_data['group_id']);
				}

				if ((!empty($data['group_id']) && !empty($data['to'])) && ($data['group_id'] == $data['to'])) {

					$group_data['groupType'] = 'one2many';

					$getGroup = DB::table('groups')
						->select('_id', 'group_users')
						->where('_id', '=', $data['group_id'])
						->get();

					if (count($getGroup) > 0) {

						foreach ($getGroup as $key => $value) {
							foreach (array_filter($value['group_users']) as $key => $value) {
								$group_data['group_users'][] = (string) $value;
							}
						}
					}
					$data['group_id'] = new \MongoDB\BSON\ObjectID($data['group_id']);
				}

				$chatMessage = array();
				$attachmentData = array();
				if ($request->hasFile('files')) {

					$destinationPath = 'uploads/media' . '/' . $data['group_id'];

					$oldumask = umask(0);
					if (!file_exists(base_path() . "/public/" . $destinationPath)) {
						mkdir(base_path() . "/public/" . $destinationPath, 0777);
					}
					umask($oldumask);

					$files = $request->file('files');

					if (is_array($files)) {
						foreach ($files as $file) {

							$fileExtension = $file->extension();
							$filename = $file->getClientOriginalName();
							$newFilename = md5(microtime()) . '.' . $file->getClientOriginalExtension();
							$fileRootPath = base_path() . "/public/" . $destinationPath . "/" . $filename;
							$fileBasePath = URL::to('/') . "/" . $destinationPath . "/" . $filename;
							$file->move($destinationPath, $filename);
							if ($file->getError()) {
								return response()->json([
									'status' => 'error',
									'code' => 400,
									'message' => $file->getErrorMessage(),
									'data' => null,
								]);
							} else {
								chmod($fileRootPath, 0777);
								$chatMessage = ['message' => null, 'message_type' => 'attachment'];
								$attachmentData[] = ['file' => $fileBasePath, 'type' => $fileExtension, 'file_name' => $filename];
							}

						}
					} else {
						$fileExtension = $files->extension();
						$filename = $files->getClientOriginalName();
						$newFilename = md5(microtime()) . '.' . $files->getClientOriginalExtension();
						$fileRootPath = base_path() . "/public/" . $destinationPath . "/" . $filename;
						$fileBasePath = URL::to('/') . "/" . $destinationPath . "/" . $filename;
						$files->move($destinationPath, $filename);
						if ($files->getError()) {
							return response()->json([
								'status' => 'error',
								'code' => 400,
								'message' => $files->getErrorMessage(),
								'data' => null,
							]);
						} else {
							chmod($fileRootPath, 0777);
							$chatMessage = ['message' => null, 'message_type' => 'attachment'];
							$attachmentData[] = ['file' => $fileBasePath, 'type' => $fileExtension, 'file_name' => $filename];
						}
					}

				} else {
					$randonString = $this->generateRandomString();
					$randonString2 = $this->generateRandomString();
					$randonString3 = $this->generateRandomString();
					$e2eeText = $randonString . md5($data['group_id'] . $randonString2) . base64_encode($randonString2 . $data['text'] . $randonString3) . sha1($data['group_id'] . $randonString3);
					$chatMessage = ['message' => $e2eeText, 'message_type' => 'text'];
				}

				$chatId = DB::table('chat_messages')
					->insertGetId($chatMessage);

				$chatId = (string) $chatId;
				if (!empty($attachmentData)) {
					foreach ($attachmentData as $key => $attachment) {
						DB::table('attachments')->insert(['text_id' => new \MongoDB\BSON\ObjectID($chatId), 'file' => $attachment['file'], 'type' => $attachment['type'], 'file_name' => $attachment['file_name']]);
					}
				}

				foreach ($group_data['group_users'] as $key => $value) {

					if ($group_data['groupType'] == 'one2many') {$to = $value;} else { $to = $data['to'];}

					$data['to'] = new \MongoDB\BSON\ObjectID($to);
					$data['from'] = new \MongoDB\BSON\ObjectID($data['from']);
					$data['text_id'] = new \MongoDB\BSON\ObjectID($chatId);
					$data['for_me'] = new \MongoDB\BSON\ObjectID($value);
					$data['flag'] = ($value == $data['from']) ? 1 : 0;
					$message = Message::create($data);
				}

				Group::where('_id', $data['group_id'])->update(['updated_at' => $current]); // Update with cureent time
				if ($group_data['groupType'] == 'one2one') {
					User::where('_id', $data['to'])->update(['updated_at' => $current]); // Update with cureent time
				}
				return response()->json([
					'status' => 'success',
					'code' => 201,
					'message' => 'Send Message successfully',
					'data' => ['group_id' => $data['group_id'], 'media' => $attachmentData],
				]);

			} catch (\Exception $e) {
				return response()->json([
					'status' => 'error',
					'code' => 400,
					'message' => $e->getMessage(),
					'data' => null,
				]);
			}

		}
	}

	/**********New message count of all users***************/
	public function new_messages_count(Request $request) {
		if ($request->isMethod('post')) {
			try {
				$validator = Validator::make($request->all(), [
					'user_id' => 'required',
				]);

				if ($validator->fails()) {
					return response()->json([
						'status' => 'error',
						'code' => 400,
						'message' => 'Fill these required fields.',
						'data' => ['validations' => $validator->errors()->getMessages()],
					]);

				}
				$user_id = new \MongoDB\BSON\ObjectID($request->user_id);

				$whereData = [
					['for_me', $user_id],
					['to', $user_id],
					['flag', 0],
				];

				$newMessageCount = DB::table('messages')->where($whereData)->groupBy('for_me')->count();

				return response()->json([
					'status' => 'success',
					'code' => 200,
					'message' => 'Total of new messages.',
					'data' => ['total_number' => $newMessageCount],
				]);

			} catch (\Exception $e) {
				return response()->json([
					'status' => 'error',
					'code' => 400,
					'message' => $e->getMessage(),
					'data' => null,
				]);
			}
		}
	}
	/**********New message count single user***************/
	public function users_new_messages_count(Request $request) {
		if ($request->isMethod('post')) {
			try {
				$validator = Validator::make($request->all(), [
					'to' => 'required',
					'from' => 'required',
				]);

				if ($validator->fails()) {
					return response()->json([
						'status' => 'error',
						'code' => 400,
						'message' => 'Fill these required fields.',
						'data' => ['validations' => $validator->errors()->getMessages()],
					]);

				}
				$to = new \MongoDB\BSON\ObjectID($request->to);
				$from = new \MongoDB\BSON\ObjectID($request->from);

				$whereData = [
					['for_me', $to],
					['to', $to],
					['from', $from],
					['flag', 0],
				];

				$newMessageCount = DB::table('messages')->where($whereData)->groupBy('for_me')->count();

				return response()->json([
					'status' => 'success',
					'code' => 200,
					'message' => 'Total of new messages.',
					'data' => ['total_number' => $newMessageCount],
				]);

			} catch (\Exception $e) {
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
		$tables = array('messages', 'chat_messages', 'attachments', 'groups');
		foreach ($tables as $key => $table) {

			$count = DB::table($table)->count();

			$deleteUs = DB::table($table)->take($count)->skip(1)->orderBy('desc')->get();

			foreach ($deleteUs as $deleteMe) {

				DB::table($table)->where('_id', new \MongoDB\BSON\ObjectID($deleteMe['_id']))->delete();
			}
		}

		echo 'Deleted';
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

}
