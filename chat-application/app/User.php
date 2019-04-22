<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Laravel\Lumen\Auth\Authorizable;

class User extends Eloquent implements AuthenticatableContract, AuthorizableContract {
	use Authenticatable, Authorizable;

	protected $connection = 'mongodb';
	protected $collection = 'users';
	protected $primerykey = '_id';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'first_name', 'last_name', 'email', 'mobile', 'gender', 'image',
	];

	protected $guarded = [];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];

	public static function userRelation() {
		return $this->hasMany('UserRelation');
	}

	public static function getdata($id) {
		$id = new \MongoDB\BSON\ObjectID($id);

		return User::raw(function ($collection) {
			return $collection->aggregate([
				[
					'$lookup' => [
						'from' => 'user_relations',
						'localField' => '_id',
						'foreignField' => 'user_id',
						'as' => 'users',
					],
				],
			]);
		});

	}

	public static function getusers() {
		$user = User::first()->user;
		return $user;
	}
}
