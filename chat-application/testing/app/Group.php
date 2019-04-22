<?php

namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Laravel\Lumen\Auth\Authorizable;

class Group extends Eloquent implements AuthenticatableContract, AuthorizableContract {
	use Authenticatable, Authorizable;

	protected $connection = 'mongodb';
	protected $collection = 'groups';
	protected $primerykey = '_id';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'group_name', 'group_type', 'group_users', 'created_by', 'created',
	];

	protected $guarded = [];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];

	public static function get_chatGroup_list($userId) {
		return Group::raw(function ($collection) use ($userId) {
			return $collection->aggregate([
				[
					'$match' => ["group_users" => new \MongoDB\BSON\ObjectID($userId)],
				],
			]);
		});
	}

	public static function getUserGroupId($from, $to) {
		$from = new \MongoDB\BSON\ObjectID($from);
		$to = new \MongoDB\BSON\ObjectID($to);

		$groupId = Group::select('_id')->where('group_users', $from)->where('group_users', $to)->get();
		return $groupId->toArray();

	}

}
