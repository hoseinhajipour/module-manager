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


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    // Your overwrites here
    Route::get('modulemanager', ['uses' => 'ModuleManagerController@index', 'as' => 'modulemanager']);
    Route::post('modulemanager/toggle', ['uses' => 'ModuleManagerController@ToggleModuleEnabled', 'as' => 'toggle.module.enabled']);
    Route::post('modulemanager/upload', ['uses' => 'ModuleManagerController@uploadModule', 'as' => 'module.upload']);
});
