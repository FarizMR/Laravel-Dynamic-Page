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

Route::group([
    'prefix' => 'admin',
], function ($router) {
    Route::get('/',[App\Http\Controllers\AdminController::class, 'showAdminDashboard']);
    Route::get('/page/{page_id}/category', [App\Http\Controllers\AdminController::class, 'page_categories'])->name('page.category.show');
    Route::post('/page',  [App\Http\Controllers\AdminController::class, 'admin_create_page']);
    Route::post('/category',  [App\Http\Controllers\AdminController::class, 'admin_create_category']);
    Route::post('/product',  [App\Http\Controllers\AdminController::class, 'admin_create_product']);
});



Route::group([
    'prefix' => 'page',
], function ($router) {
    Route::get('/{slug}',[App\Http\Controllers\PageController::class, 'showServicePage']);
    Route::post('/create',[App\Http\Controllers\PageController::class, 'create']);
});

Route::group([
    'prefix' => 'category',
],function ($router) {
    Route::post('/create',[App\Http\Controllers\CategoryController::class, 'create']);
});

Route::group([
    'prefix' => 'product',
],function ($router) {
    Route::post('/create',[App\Http\Controllers\ProductController::class, 'create']);
});

Route::get('/api-test/page/{slug}',[App\Http\Controllers\PageController::class, 'show']);
