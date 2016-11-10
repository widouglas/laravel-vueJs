<?php

Route::get('/user',function ()
{
	\Illuminate\Support\Facades\Auth::loginUsingId(1);
});

Route::get('/', function () {
    return view('welcome');
});//->middleware('can:access-admin');


Auth::routes();

Route::get('/home', function (){
	return redirect()->route('admin.home');
});

//Rotas área administrativa
Route::group([
	'prefix' => 'admin',
	'middleware' => 'can:access-admin',
	'as'=>'admin.'
	],function(){
	Route::get('/home','HomeController@index')->name('home');
});