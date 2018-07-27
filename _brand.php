<?php

$prefix = config('web.brand.prefix');

Route::group(['prefix'=>$prefix], function() use($prefix) {

    Route::get('/', 'BrandController@index')->name($prefix.'.index');
    
    // DATATABLES
    Route::get('dt-list', 'BrandController@dtList')->name($prefix.'.dt');   

    // VIEW
    Route::get('view/{id}', 'BrandController@show')->name($prefix.'.view');      

    // CREATE
    Route::get('create', 'BrandController@create')->name($prefix.'.create');
    Route::post('create', 'BrandController@store')->name($prefix.'.store');

    // UPDATE
    Route::get('edit/{id}', 'BrandController@edit')->name($prefix.'.edit');
    Route::post('edit/{id}', 'BrandController@update')->name($prefix.'.update');        

    // DELETE
    Route::get('destroy', 'BrandController@destroy')->name($prefix.'.destroy');
    
});  