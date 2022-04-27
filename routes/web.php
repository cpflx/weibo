<?php

use Illuminate\Support\Facades\Route;

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

//定义主页、帮助页、关于页路由
Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('/help', 'StaticPagesController@help')->name('help');
Route::get('/about', 'StaticPagesController@about')->name('about');
Route::get('signup', 'UsersController@create')->name('signup');
Route::resource('users', 'UsersController');

Route::get('login', 'SessionController@create')->name('login');
Route::post('login', 'SessionController@store')->name('login');
Route::delete('destroy', 'SessionController@destroy')->name('logout');
Route::get('signup/confirm/{token}', 'UsersController@confirmEmail')->name('confirm_email');

//showLinkRequestForm —— 填写 Email 的表单
Route::get('password/reset', 'PasswordController@showLinkRequestForm')->name('password.request');
//sendResetLinkEmail —— 处理表单提交，成功的话就发送邮件，附带 Token 的链接
Route::post('password/email', 'PasswordController@sendResetLinkEmail')->name('password.email');
//showResetForm —— 显示更新密码的表单，包含 token
Route::get('password/reset/{token}', 'PasswordController@showResetForm')->name('password.reset');
//reset —— 对提交过来的 token 和 email 数据进行配对，正确的话更新密码
Route::post('password/reset', 'PasswordController@reset')->name('password.update');

Route::resource('statuses', 'StatusesController', ['store', 'destroy']);

//用户关注者列表和粉丝列表的路由
Route::get('/users/{user}/followings', 'UsersController@followings')->name('users.followings');
Route::get('/users/{user}/followers', 'UsersController@followers')->name('users.followers');

//「关注用户」和「取消用户」路由
Route::post('/users/followers/{user}', 'FollowersController@store')->name('followers.store');
Route::delete('/users/followers/{user}', 'FollowersController@destroy')->name('followers.destroy');

