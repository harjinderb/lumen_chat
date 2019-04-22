<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Comapny extends Eloquent implements AuthenticatableContract {
	use Authenticatable;
	use Notifiable;

	protected $connection = 'mongodb';
	protected $collection = 'companies';
	protected $primerykey = '_id';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['user_id', 'name', 'email', 'mobile', 'secret_key', 'access_key', 'tocken', 'status'];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [];

	protected $guarded = [];

	public static function getComapanyData($id) {
		return Comapny::raw(function ($collection) use ($id) {
			return $collection->aggregate([
				[
					'$match' => ["user_id" => new \MongoDB\BSON\ObjectID($id)],
				],
				[
					'$lookup' => [
						'from' => 'subscribed_plans',
						'localField' => '_id',
						'foreignField' => 'company_id',
						'as' => 'subscribed_plans',
					],
				],
				[
					'$lookup' => [
						'from' => 'plan_payments',
						'localField' => '_id',
						'foreignField' => 'compnay_id',
						'as' => 'plan_payments',
					],
				],
			]);
		});

	}

}
