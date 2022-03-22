<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TypesController;
use App\Http\Controllers\DebugController;

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

//Frontend routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);


//Backend routes
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/dashboard', [AdminController::class, 'show_dashboard']);
Route::get('/logout', [AdminController::class, 'logout']);

Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);

//Product
Route::get('/all-products', [ProductController::class, 'all_products']);
Route::get('/add-product', [ProductController::class, 'add_product']);
Route::get('/edit-product/{product_id}', [ProductController::class, 'edit_product']);
Route::get('/delete-product/{product_id}', [ProductController::class, 'delete_product']);


Route::post('/save-product', [ProductController::class, 'save_product']);
Route::post('/update-product/{product_id}', [ProductController::class, 'update_product']);

//Types
Route::get('/all-types', [TypesController::class, 'all_types']);
Route::get('/add-type', [TypesController::class, 'add_type']);
Route::get('/edit-type/{type_id}', [TypesController::class, 'edit_type']);
Route::get('/delete-type/{type_id}', [TypesController::class, 'delete_type']);


Route::post('/save-type', [TypesController::class, 'save_type']);
Route::post('/update-type/{type_id}', [TypesController::class, 'update_type']);

//debug
Route::get('/debug',[DebugController::class,'debug']);

