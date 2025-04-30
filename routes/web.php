<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/run-setup', function () {
    Artisan::call('migrate:fresh', ['--force' => true]);
    Artisan::call('db:seed', ['--force' => true]);
    Artisan::call('config:cache');
    Artisan::call('route:cache');
    return 'Setup executed.';
});
