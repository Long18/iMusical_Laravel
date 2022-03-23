<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductAdminController;
use App\Http\Controllers\Admin\TypesAdminController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\AboutController;


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
//----------------------------------------------------------------------------------------------------------------------
/////////// admin routes
// home
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/dashboard', [AdminController::class, 'show_dashboard']);
Route::get('/admin/logout', [AdminController::class, 'logout']);

Route::post('/admin/admin-dashboard', [AdminController::class, 'dashboard']);

//Product
Route::get('/admin/all-products', [ProductAdminController::class, 'all_products']);
Route::get('/admin/add-product', [ProductAdminController::class, 'add_product']);
Route::get('/admin/edit-product/{product_id}', [ProductAdminController::class, 'edit_product']);
Route::get('/admin/delete-product/{product_id}', [ProductAdminController::class, 'delete_product']);


Route::post('/admin/save-product', [ProductAdminController::class, 'save_product']);
Route::post('/admin/update-product/{product_id}', [ProductAdminController::class, 'update_product']);

//Types
Route::get('/admin/all-types', [TypesAdminController::class, 'all_types']);
Route::get('/admin/add-type', [TypesAdminController::class, 'add_type']);
Route::get('/admin/edit-type/{type_id}', [TypesAdminController::class, 'edit_type']);
Route::get('/admin/delete-type/{type_id}', [TypesAdminController::class, 'delete_type']);


Route::post('/admin/save-type', [TypesAdminController::class, 'save_type']);
Route::post('/admin/update-type/{type_id}', [TypesAdminController::class, 'update_type']);

//----------------------------------------------------------------------------------------------------------------------
/////////// client routes

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);


//----------------------------------------------------------------------------------------------------------------------
//debug
Route::get('/debug',[DebugController::class,'debug']);

