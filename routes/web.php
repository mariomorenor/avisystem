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
        return redirect()->route('control.index');
    });
    
    
    //Rutas de Usuario
    Route::get('getusers', 'UserController@getUsers');
    Route::resource('users', 'UserController');

    //Rutas Lote

    // Production
    Route::group(['prefix' => 'production'], function () {
        Route::get('/','LoteController@productionLotes')->name('production.index');
        Route::get('getLotes','LoteController@getLotes');
    });


    // Control
    Route::group(['prefix' => 'control'], function () {
        Route::get('/', 'LoteController@controlLotes')->name('control.index');
    });
    