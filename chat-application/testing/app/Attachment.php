<?php

namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Laravel\Lumen\Auth\Authorizable;

class Attachment extends Eloquent implements AuthenticatableContract, AuthorizableContract {
	use Authenticatable, Authorizable;

	protected $connection = 'mongodb';
	protected $collection = 'attachments';
	protected $primerykey = '_id';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'text_id', 'file', 'type','file_name',

	protected $guarded = [];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];

}
