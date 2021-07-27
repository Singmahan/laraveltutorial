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

// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;



// การเพิ่ม ลบ แก้ไข อัพเดท รูปแบบ resource
Route::resource('user','UsersController');

// การค้นหาข้อมูล
Route::get('/search','SearchController@search')->name('user.search');
Route::get('/action','SearchController@action')->name('user.action');

// การ Upload File
Route::get('/upload','UploadController@index');
Route::post('/upload','UploadController@upload');

// PDF
Route::get('/downloadPDF/{id}','UsersController@downloadPDF');




