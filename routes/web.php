<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => 'It works!');

Route::get('/routes', function () {
    $routeCollection = Route::getRoutes();

    foreach ($routeCollection as $value) {
        echo $value->uri() . '<br>';
    }
});