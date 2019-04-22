<?php
namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;

class GroupsController extends Controller {

	public function create_group(Request $request) {
		if ($request->isMethod('post')) {

			try {
				$validator = Validator::make($request->all(), [
					'group_name' => 'required',
					'group_users' => 'required',
					'created_by' => 'required',
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
				$current = date('Y-m-d h:i:s');
				$users = array();
				$groupUsers = json_decode($data['group_users']);
				foreach ($groupUsers->users as $key => $value) {
					$users[] = new \MongoDB\BSON\ObjectID($value);
				}
				$data['group_type'] = 'one2many';
				$data['group_users'] = $users;
				$data['created_by'] = new \MongoDB\BSON\ObjectID($data['created_by']);
				$data['created'] = $current;

				$group = Group::create($data);

				return response()->json([
					'status' => 'success',
					'code' => 201,
					'message' => 'Group Create Successfully',
					'data' => ['group' => $group],
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

}