<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/Artists', function () {
    return view('Artists');
});

Route::get('/Songs', function () {
    return view('Songs');
});