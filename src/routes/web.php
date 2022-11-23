<?php

use Illuminate\Support\Facades\Route;
use Ybazli\Faker\Facades\Faker;

Route::get('/', function () {
    return "up and working, checkout the <a href='" . env("APP_URL") . "/api/documentation' target='_blank'>swagger</a> documentation";
});
