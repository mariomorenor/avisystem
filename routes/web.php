<?php


    Auth::routes(['register'=>false, 'confirm'=>false,'reset'=>false]);

    Route::middleware(['auth'])->group(function () {
    
        Route::get('/', function () {
            return redirect()->route('control.index');
        });
        
        //******************Rutas Lote********************
    
        // Production
        Route::group(['prefix' => 'production'], function () {
            Route::get('/','LoteController@productionLotes')->name('production.index');
            Route::get('getLotes','LoteController@getLotes');


        });
    
        // Control
        Route::group(['prefix' => 'control'], function () {
            Route::get('/', 'LoteController@controlLotes')->name('control.index');
            Route::post('store_lote', 'LoteController@store')->name('store_lote');
            Route::delete('delete_lote/{lote}', 'LoteController@delete')->name('delete_lote');
            Route::post('select_lote/{lote}','LoteController@update')->name('select_lote');

        });
        
        //******************Rutas de Usuario****************
        Route::get('getusers', 'UserController@getUsers');
        Route::resource('users', 'UserController');    
    
    });