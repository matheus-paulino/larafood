<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {

    Route::get('/', 'Admin\PlanController@index')->name('admin.index');

    Route::prefix('plans')->group(function () {
        Route::get('/', 'Admin\PlanController@index')->name('plan.index');
        Route::get('create', 'Admin\PlanController@create')->name('plan.create');
        Route::post('create', 'Admin\PlanController@store')->name('plan.store');
        Route::get('plans/{url}', 'Admin\PlanController@show')->name('plan.show');
        Route::delete('plans/{id}', 'Admin\PlanController@destroy')->name('plan.destroy');
        Route::any('/search', 'Admin\PlanController@search')->name('plan.search');
    });
});

Route::get('/', function () {
    return view('welcome');
});
