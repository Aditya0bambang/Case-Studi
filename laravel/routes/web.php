<?php

use App\Http\Controllers\ProductController;
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
Route::get('/index', [ProductController::class, "index"]);
route::get('/products/create', [ProductController::class, 'create']);
route::post('/products/create', [ProductController::class, "store"]);
route::get('/products/{product:product_slug}', [ProductController::class, 'show']);
route::get('/products/{product:product_slug}/edit', [ProductController::class, 'edit']);
route::put('/products/{product:product_slug}', [ProductController::class, 'update']);
route::delete('/products/{product:product_slug}', [ProductController::class, 'destroy']);