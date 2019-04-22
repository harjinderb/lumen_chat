<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class User extends Eloquent implements AuthenticatableContract {
	use Authenticatable;
	use Notifiable;

	protected $connection = 'mongodb';
	protected $collection = 'users';
	protected $primerykey = '_id';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['first_name', 'last_name', 'email', 'mobile', 'password', 'status', 'role', 'about_me', 'image', 'address'];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'confirmPassword', '_token',
	];

	protected $guarded = [];

	public static function getUserData($id) {
		return User::raw(function ($collection) use ($id) {
			return $collection->aggregate([
				[
					'$match' => ["_id" => new \MongoDB\BSON\ObjectID($id)],
				],
				[
					'$lookup' => [
						'from' => 'companies',
						'localField' => '_id',
						'foreignField' => 'user_id',
						'as' => 'companies',
					],
				],
			]);
		});

	}

}
