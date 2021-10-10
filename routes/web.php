<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/landing',[App\Http\Controllers\PageController::class, 'showLandingPage']);
Route::get('/admin',[App\Http\Controllers\AdminController::class, 'showAdminDashboard']);

Route::group([
    'prefix' => 'page',
], function ($router) {
    Route::get('/{slug}',[App\Http\Controllers\PageController::class, 'showServicePage']);
    Route::post('/create',[App\Http\Controllers\PageController::class, 'create']);
});

Route::get('/api-test/page/{slug}',[App\Http\Controllers\PageController::class, 'show']);
