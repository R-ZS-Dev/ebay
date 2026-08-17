<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('welcome', [ 'page' => 'Login' ]); });
Route::get('/dashboard', function () { return view('welcome', [ 'page' => 'Dashboard' ]); });
Route::get('/users', function () { return view('welcome', [ 'page' => 'Users' ]);});
Route::get('/order/orders', function () { return view('welcome', [ 'page' => 'Orders' ]);});
Route::get('/product/products', function () { return view('welcome', ['page' => 'Products']); });
Route::get('/product/categories', function () { return view('welcome', ['page' => 'Categories']); });
Route::get('/product/subcategories', function () { return view('welcome', ['page' => 'SubCategories']); });