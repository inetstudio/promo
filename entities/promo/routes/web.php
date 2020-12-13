<?php

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'namespace' => 'InetStudio\PromoPackage\Promo\Contracts\Http\Controllers\Back',
        'middleware' => ['web', 'back.auth'],
        'prefix' => 'back',
    ],
    function () {
        Route::any('promo/data', 'DataControllerContract@data')
            ->name('back.promo.data.index');

        Route::post('promo/suggestions', 'UtilityControllerContract@getSuggestions')
            ->name('back.promo.getSuggestions');

        Route::get('promo/create/{type?}', 'ResourceControllerContract@create')->name('back.promo.create');
        Route::resource(
            'promo', 'ResourceControllerContract',
            [
                'except' => [
                    'create',
                ],
                'as' => 'back',
            ]
        );
    }
);
