<?php

namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Laravel\Lumen\Auth\Authorizable;

class Message extends Eloquent implements AuthenticatableContract, AuthorizableContract {
	use Authenticatable, Authorizable;

	protected $connection = 'mongodb';
	protected $collection = 'messages';
	protected $primerykey = '_id';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'group_id', 'to', 'from', 'text_id', 'for_me', 'flag',
	];

	protected $guarded = [];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];

	public static function get_group_chat($ids) {

		return Message::raw(function ($collection) use ($ids) {
			return $collection->aggregate([
				[
					'$match' => ["group_id" => new \MongoDB\BSON\ObjectID($ids[0]), "for_me" => new \MongoDB\BSON\ObjectID($ids[1])],
				],
				[
					'$lookup' => [
						'from' => 'chat_messages',
						'localField' => 'text_id',
						'foreignField' => '_id',
						'as' => 'messages',
					],
				],
				[
					'$lookup' => [
						'from' => 'attachments',
						'localField' => 'text_id',
						'foreignField' => 'text_id',
						'as' => 'attachments',
					],
				],
				[
					'$sort' => ['_id' => -1],
				],
				[
					'$skip' => $ids[2],
				],
				[
					'$limit' => $ids[3],
				],
			]);
		});

	}

	public static function update_flag($ids) {

		return Message::where('group_id', new \MongoDB\BSON\ObjectID($ids[0]))
			->where('for_me', new \MongoDB\BSON\ObjectID($ids[1]))
			->update(['flag' => 1]);
	}

	public static function getNewMessagesCount($from, $to) {
		$from = new \MongoDB\BSON\ObjectID($from);
		$to = new \MongoDB\BSON\ObjectID($to);

		$whereData = [
			['for_me', $to],
			['to', $to],
			['from', $from],
			['flag', 0],
		];
		$messageCount = Message::where($whereData)->count();

		return $messageCount;
	}

}
