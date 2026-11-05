<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('welcome', [ 'page' => 'Login' ]); });
Route::get('/dashboard', function () { return view('welcome', [ 'page' => 'Dashboard' ]); });
Route::get('/users', function () { return view('welcome', [ 'page' => 'Users' ]);});
Route::get('/order/orders', function () { return view('welcome', [ 'page' => 'Orders' ]);});
Route::get('/product/products', function () { return view('welcome', ['page' => 'Products']); });
Route::get('/product/categories', function () { return view('welcome', ['page' => 'Categories']); });
Route::get('/product/subcategories', function () { return view('welcome', ['page' => 'SubCategories']); });
Route::get('/product/size', function () { return view('welcome', ['page' => 'Size']); });
Route::get('/product/color', function () { return view('welcome', ['page' => 'Color']); });
Route::get('/channelrecords', function () { return view('welcome', ['page' => 'ChannelRecords']); });
Route::get('/sku/createsku', function () { return view('welcome', ['page' => 'CreateSKU']); });
Route::get('/sku/skurecords', function () { return view('welcome', ['page' => 'SkuRecords']); });
Route::get('/sku/unutilizedsku', function () { return view('welcome', ['page' => 'UnutilizedSKU']); });
Route::get('/warehouse/warehouse', function () { return view('welcome', ['page' => 'Warehouse']); });
Route::get('/warehouse/stocktransaction', function () { return view('welcome', ['page' => 'StockTransaction']); });
Route::get('/warehouse/orderdispatch', function () { return view('welcome', ['page' => 'OrderDispatch']); });
Route::get('/warehouse/StockTransfer', function () { return view('welcome', ['page' => 'StockTransfer']); });
Route::get('/setting/logs', function () { return view('welcome', ['page' => 'Logs']); });
Route::get('/setting/channelintegration', function () { return view('welcome', ['page' => 'ChannelIntegration']); });
Route::get('/setting/usermanagement', function () { return view('welcome', ['page' => 'UserManagement']); });
