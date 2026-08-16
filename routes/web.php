<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('welcome', [ 'page' => 'Login' ]); });
Route::get('/dashboard', function () { return view('welcome', [ 'page' => 'Dashboard' ]); });
Route::get('/users', function () { return view('welcome', [ 'page' => 'Users' ]);});
Route::get('/products', function () { return view('welcome', ['page' => 'Products']); });