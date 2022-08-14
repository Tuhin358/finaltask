<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route:: view('/','welcome');

 Auth::routes();

 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 // Blog


 Route::get('Blog/All','BlogController@AllCat')->name('all.blog');
 Route::post('Blog/Add', 'BlogController@AddCat')->name('store.blog');
 Route::get('Category/Edit/{id}','BlogController@Edit');
 Route::post('store/Category/{id}','BlogController@update');
 Route::get('softdelete/category/{id}','BlogController@SoftDelete');
 Route::post('comment/{id}','BlogController@Comment');

//  comments

 Route::post('comments','BlogController@Store')->name('store.blog');

 Route::get('images','BlogController@Allimg')->name('all.img');







