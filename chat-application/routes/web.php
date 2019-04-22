<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
 */

$router->get('/', function () use ($router) {
	return $router->app->version();
});
$rouesArray = array('GET', 'POST', 'PUT', 'PATCH', 'delete', 'OPTIONS');
//Route::match(['get', 'post'], 'add-user', 'UsersController@add_user');

//Route::prefix('api/vi')->group(function () {
Route::post('all-users', 'UsersController@get_all_users');
Route::post('add-user', 'UsersController@add_user');
Route::post('get-coach-users', 'UsersController@get_coach_users');
Route::post('aggrdata', 'UsersController@getmodel');
Route::post('send-message', 'MessagesController@add_message');
Route::post('create-group', 'GroupsController@create_group');
Route::post('chat-users', 'MessagesController@chat_group_users');
Route::post('chat-messages-list', 'MessagesController@chat_messages_listing');
Route::post('messages-list', 'MessagesController@common_chat_messages_listing');
Route::post('new-messages-count', 'MessagesController@new_messages_count');
Route::post('users-new-messages-count', 'MessagesController@users_new_messages_count');
Route::post('chat-search', 'MessagesController@chat_search');
Route::post('message-seen', 'MessagesController@message_seen');
Route::post('assign-new-coach', 'UsersController@reassign_coach');

Route::get('all-users-delete', 'UsersController@delete_all');
Route::get('all-messages-delete', 'MessagesController@delete_all');

//});
