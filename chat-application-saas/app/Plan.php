<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Plan extends Eloquent {
	use Notifiable;

	protected $connection = 'mongodb';
	protected $collection = 'plans';
	protected $primerykey = '_id';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'price', 'currency', 'trial_days', 'status', 'popular'];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [];

	protected $guarded = [];

	public static function getPlanData($id) {

		return Plan::raw(function ($collection) use ($id) {
			return $collection->aggregate([
				[
					'$match' => ["_id" => new \MongoDB\BSON\ObjectID($id)],
				],
				[
					'$lookup' => [
						'from' => 'plan_features',
						'localField' => '_id',
						'foreignField' => 'plan_id',
						'as' => 'features',
					],
				],

			]);
		});

	}

	public static function getAllPlans() {

		return Plan::raw(function ($collection) {
			return $collection->aggregate([
				[
					'$lookup' => [
						'from' => 'plan_features',
						'localField' => '_id',
						'foreignField' => 'plan_id',
						'as' => 'features',
					],
				],

			]);
		});

	}
}
