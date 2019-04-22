<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', 'CmsController@index');

Route::get('test_db', 'UsersController@index')->name('test');

Route::get('pricing', 'CmsController@all_plans');
Route::get('features', 'CmsController@features');
Route::get('faq', 'CmsController@faq');
Route::get('terms_and_conditions', 'CmsController@terms_and_conditions');
Route::get('login', 'CmsController@login');
Route::get('register', 'CmsController@register');
Route::get('forgot', 'CmsController@forgot_password');
Route::get('resetpassword/{link}', 'CmsController@reset_password');

Route::get('logout', function () {
	Auth::logout();
	return Redirect::to('/');
});
Route::get('user-activate/{link}', 'UsersController@user_activate');
Route::post('users/register', 'UsersController@register');
Route::post('users/login', 'UsersController@login');
Route::post('users/forgot', 'UsersController@forgot_password');
Route::post('users/resetpassword', 'UsersController@reset_password');

//--------------------------------------- Admin back-end

Route::prefix('admin')->group(function () {
	Route::get('dashboard', 'AdminController@index')->name('dashboard');
	Route::get('profile', 'AdminController@user_view')->name('profile');
	Route::get('manage-features', 'AdminController@manage_features')->name('features');
	Route::get('plans/list', 'AdminController@manage_plans')->name('plans');
	Route::get('plans/add', 'AdminController@add_plan')->name('plans');
	Route::get('plans/edit/{id}', 'AdminController@edit_plan')->name('plans');
	Route::get('manage-users', 'AdminController@manage_owners_users')->name('manage_owners');

	Route::post('profileEdit', 'AdminController@user_edit');
	Route::post('plans/add', 'AdminController@add_plan');
	Route::post('plans/edit', 'AdminController@edit_plan');
	Route::post('plans/delete', 'AdminController@delete_plan');

	Route::post('feature/add', 'AdminController@add_feature');
	Route::post('feature/edit', 'AdminController@edit_feature');
	Route::post('feature/delete', 'AdminController@delete_feature');
	Route::post('feature/ordering', 'AdminController@re_ordering_feature');

	Route::post('change-user-status', 'AdminController@change_user_status');
	Route::post('user-complete-data', 'AdminController@user_complete_data');
});

Route::prefix('owner')->group(function () {
	Route::get('dashboard', 'OwnerController@index')->name('dashboard');
	Route::get('profile', 'OwnerController@user_view')->name('profile');
	Route::get('companies', 'OwnerController@all_companies')->name('companies');

	Route::post('profileEdit', 'OwnerController@user_edit');
	Route::post('companyEdit', 'OwnerController@company_edit');
});
