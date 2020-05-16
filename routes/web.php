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
    Auth::routes(['register'=>false, 'confirm'=>false,'reset'=>false]);

    
    Route::get('/', function () {
        return redirect()->route('control');
    });
    
    Route::get('/control', 'HomeController@index')->name('control');
    Route::resource('users', 'UserController');

