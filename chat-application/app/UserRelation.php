<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Laravel\Lumen\Auth\Authorizable;

class UserRelation extends Eloquent implements AuthenticatableContract, AuthorizableContract {
	use Authenticatable, Authorizable;

	protected $connection = 'mongodb';
	protected $collection = 'user_relations';
	protected $primerykey = '_id';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'parent', 'user_id', 'flag',
	];

	protected $guarded = [];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];

	public static function user() {
		return $this->belongsTo('User');
	}

}
