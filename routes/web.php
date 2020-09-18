<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {

    Route::get('/', 'Admin\PlanController@index')->name('admin.index');

    /**
     * Planos
     */

    Route::prefix('plans')->group(function () {
        Route::get('/', 'Admin\PlanController@index')->name('plan.index');
        Route::get('create', 'Admin\PlanController@create')->name('plan.create');
        Route::post('create', 'Admin\PlanController@store')->name('plan.store');
        Route::get('plans/{url}', 'Admin\PlanController@show')->name('plan.show');
        Route::delete('plans/{id}', 'Admin\PlanController@destroy')->name('plan.destroy');
        Route::any('/search', 'Admin\PlanController@search')->name('plan.search');
    });

    /**
     * Detalhes do plano
     */

    Route::prefix('plans')->group(function () {
        Route::get('{url}/details', 'Admin\DetailPlanController@index')->name('plan.detail.index');

        Route::get('{url}/details/create', 'Admin\DetailPlanController@create')->name('plan.detail.create');
        Route::post('{url}/details/create', 'Admin\DetailPlanController@store')->name('plan.detail.store');

        Route::get('{url}/details/{idDetailPlan}/edit', 'Admin\DetailPlanController@edit')->name('plan.detail.edit');
        Route::put('{url}/details/{idDetailPlan}/edit', 'Admin\DetailPlanController@update')->name('plan.detail.update');
    });
});

Route::get('/', function () {
    return view('welcome');
});
