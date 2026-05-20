<?php

use App\Http\Controllers\Admin\VisitorSiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('visitor-site', VisitorSiteController::class);