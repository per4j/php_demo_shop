<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// use App\Entity\Member;

Route::get('/', function () {
    // return view('welcome');
    // return Member::all();
    // return view('login');
    return 'hello';
});

Route::get('test', function()
{
  return 'test';
});

// Route::get('/register', 'Service\ValidateCodeController@');
Route::get('/category', 'View\BookController@toCategory');
Route::get('/product/category_id/{category_id}', 'View\BookController@toProduct');
Route::get('/product/{product_id}', 'View\BookController@toPdtContent');
// Route::get('test', 'View\BookController@toCategory');
// Route::any('/', 'Service\ValidateCodeController@create');

Route::group(['prefix' => 'service'], function() {
  Route::get('category/parent_id/{parent_id}', 'Service\BookController@getCategoryByParentId');
  Route::get('cart/add/{product_id}', 'Service\CartController@addCart');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

// Route::group(['middleware' => ['web']], function () {
//     //
// });
