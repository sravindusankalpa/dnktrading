<?php

use Botble\Base\Facades\AdminHelper;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Botble\SimpleSlider\Http\Controllers'], function (): void {
    AdminHelper::registerRoutes(function (): void {
        Route::group(['prefix' => 'simple-sliders', 'as' => 'simple-slider.'], function (): void {
            Route::resource('', 'SimpleSliderController')->parameters(['' => 'simple-slider']);

            Route::post('sorting', [
                'as' => 'sorting',
                'uses' => 'SimpleSliderController@postSorting',
                'permission' => 'simple-slider.edit',
            ]);
        });

        Route::group(['prefix' => 'simple-slider-items', 'as' => 'simple-slider-item.'], function (): void {
            Route::resource('', 'SimpleSliderItemController')->except([
                'index',
            ])->parameters(['' => 'simple-slider-item']);

            Route::match(['GET', 'POST'], 'list/{id}', [
                'as' => 'index',
                'uses' => 'SimpleSliderItemController@index',
            ])->wherePrimaryKey();
        });

        Route::group(['prefix' => 'settings', 'as' => 'simple-slider.'], function (): void {
            Route::get('simple-sliders', [
                'as' => 'settings',
                'uses' => 'Settings\SimpleSliderSettingController@edit',
            ]);

            Route::put('simple-sliders', [
                'as' => 'settings.update',
                'uses' => 'Settings\SimpleSliderSettingController@update',
                'permission' => 'simple-slider.settings',
            ]);
        });
    });
});
