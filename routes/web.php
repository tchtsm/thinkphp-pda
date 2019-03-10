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
Route::group(['namespace'=>'frontend'], function () {
	// 首页
	Route::get('/', 'HomeController@index');
	//会员
	Route::get('login', 'UserController@login')->name('f_login');
	Route::post('login', 'UserController@login')->name('f_login');
	Route::get('logout', 'UserController@logout')->name('f_logout');
	Route::get('register', 'UserController@register')->name('f_register');
	Route::post('register', 'UserController@register')->name('f_register');
	Route::get('change-password', 'UserController@changePassword')->name('f_change_pass');
	Route::post('change-password', 'UserController@changePassword')->name('f_change_pass');
	Route::get('reset-password', 'UserController@resetPassword')->name('f_reset_pass');
	Route::post('reset-password', 'UserController@resetPassword')->name('f_reset_pass');
	Route::post('person', 'UserController@person')->name('f_person');
	//通知
	Route::post('notice/{id}', 'NoticeController@content')->name('f_notice_content');
	// 文章文档
	Route::get('article', 'ArticleController@list')->name('f_article_list');
	Route::get('article/{id}', 'ArticleController@content')->name('f_article_content');
	Route::get('article/search', 'ArticleController@search')->name('f_article_search');
	// 看书推荐
	Route::get('book', 'BookController@list')->name('f_book_list');
	Route::get('book/{id}', 'BookController@content')->name('f_book_content');
	Route::get('book/search', 'BookController@search')->name('f_book_search');
	// 编辑软件
	Route::get('software', 'SoftwareController@list')->name('f_software_list');
	//协会介绍
	Route::get('introduce', 'OtherController@introduce')->name('f_other_introduce');
	Route::get('about', 'OtherController@about')->name('f_other_about');
	Route::get('disclaimer', 'OtherController@disclaimer')->name('f_other_disclaimer');
});


Route::group(['prefix'=>'admin','namespace'=>'backend'], function () {
	Route::get('', 'Controller@index')->name('admin');

	Route::get('login', 'UserController@login')->name('b_login');
	Route::post('login', 'UserController@login')->name('b_login');
	//通知
	Route::get('notice', 'NoticeController@list')->name('b_notice_list');
	Route::get('notice/add', 'NoticeController@form')->name('b_notice_add');
	Route::post('notice/add', 'NoticeController@store')->name('b_notice_add');
	Route::get('notice/edit', 'NoticeController@form')->name('b_notice_edit');
	Route::post('notice/edit', 'NoticeController@store')->name('b_notice_edit');
	Route::get('notice/delete', 'NoticeController@delete')->name('b_notice_del');
	Route::get('notice/search', 'NoticeController@search')->name('b_notice_search');
	// 文章
	Route::get('article', 'ArticleController@list')->name('b_article_list');
	Route::get('article/add', 'ArticleController@form')->name('b_article_add');
	Route::post('article/add', 'ArticleController@store')->name('b_article_add');
	Route::get('article/edit', 'ArticleController@form')->name('b_article_edit');
	Route::post('article/edit', 'ArticleController@store')->name('b_article_edit');
	Route::get('article/delete', 'ArticleController@delete')->name('b_article_del');
	Route::get('article/search', 'ArticleController@search')->name('b_article_search');
	// 看书推荐
	Route::get('book', 'BookController@list')->name('b_book_list');
	Route::get('book/{id}', 'BookController@content')->name('b_book_content');
	Route::get('book/search', 'BookController@search')->name('b_book_search');
	// 标签
	Route::get('tag', 'TagController@list')->name('b_tag_list');
	Route::get('tag/add', 'TagController@form')->name('b_tag_form');
	Route::post('tag/add', 'TagController@store')->name('b_tag_store');
	Route::get('tag/edit', 'TagController@form')->name('b_tag_form');
	Route::post('tag/edit', 'TagController@store')->name('b_tag_store');
	Route::get('tag/delete', 'TagController@delete')->name('b_tag_del');
	// 上传
	Route::post('uplode', 'UplodeController@image')->name('b_uplode_img');
});
