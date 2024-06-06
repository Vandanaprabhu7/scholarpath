<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controller\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScholarshipController;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/reg', 'App\Http\Controllers\RegisterController@create')->name('reg.create');
Route::get('/password1', 'App\Http\Controllers\LoginController@password1')->name('login.password1');
Route::get('/password2', 'App\Http\Controllers\LoginController@notcheck');
Route::get('/register', 'App\Http\Controllers\LoginController@notcheck')->name('register');
Route::get('/change', 'App\Http\Controllers\LoginController@notcheck');
Route::post('/change', 'App\Http\Controllers\RegisterController@change')->name('change');
Route::post('/register', 'App\Http\Controllers\RegisterController@store');
Route::get('/login', 'App\Http\Controllers\LoginController@index');
Route::post('/check', 'App\Http\Controllers\LoginController@check')->name('check');
Route::get('/check', 'App\Http\Controllers\LoginController@notcheck');
Route::post('/password1', 'App\Http\Controllers\LoginController@password1')->name('login.password1');
Route::post('/password2', 'App\Http\Controllers\LoginController@password2')->name('login.password2');

Route::get('/profile', 'App\Http\Controllers\ProfileController@getUserInfo')->name('profile.info');

Route::put('/profile', 'App\Http\Controllers\ProfileController@update')->name('profile.update');
Route::delete('/profile', 'App\Http\Controllers\ProfileController@destroy')->name('profile.destroy');

Route::get('/thanks', 'App\Http\Controllers\HomeController@thanks')->name('contact.thanks');
Route::get('/thanksAdmin', 'App\Http\Controllers\HomeController@thanksAdmin')->name('contact.thanksAdmin');
Route::get('/scholarships', 'App\Http\Controllers\ScholarshipController@index')->name('scholarships.index');
Route::get('/allscholarships', 'App\Http\Controllers\ScholarshipController@allscholarships');

Route::get('/addScholarship', 'App\Http\Controllers\AdminController@addScholarship');
Route::post('/addScholarship', 'App\Http\Controllers\AdminController@store')->name('newscholarship');
Route::get('/apply/{ptoken}/{id}', 'App\Http\Controllers\ScholarshipController@apply')->name('apply');
Route::post('/apply/{ptoken}/{id}', 'App\Http\Controllers\ScholarshipController@applypost');


Route::get('/addscl', 'App\Http\Controllers\PvtsclController@create')->name('addscl');
Route::post('/pvtscl/store', 'App\Http\Controllers\PvtsclController@store')->name('pvtscl.store');
Route::get('/pvtscl', 'App\Http\Controllers\PvtsclController@index')->name('pvtscl.index');
Route::get('/myscholarship', 'App\Http\Controllers\PvtsclController@myScholarships')->name('myscholarships.index');

Route::post('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');
Route::get('/logout', 'App\Http\Controllers\LoginController@notcheck');
Route::get('/disp', 'App\Http\Controllers\ScholarshipController@dispscluser')->name('dispscluser');
Route::post('/disp', 'App\Http\Controllers\ScholarshipController@dispscluser');
Route::get('/seeapplications', 'App\Http\Controllers\ScholarshipController@seeapplications');
