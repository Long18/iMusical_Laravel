<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductAdminController;
use App\Http\Controllers\Admin\TypesAdminController;
use App\Http\Controllers\Admin\BrandsAdminController;
use App\Http\Controllers\Admin\OrdersAdminController;
use App\Http\Controllers\Admin\SlidersAdminController;
use App\Http\Controllers\Admin\UsersAdminController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\AboutController;
use App\Http\Controllers\Client\ExploreController;
use App\Http\Controllers\Client\ItemDetailController;
use App\Http\Controllers\Client\LoginController;
use App\Http\Controllers\Client\SignUpController;
use App\Http\Controllers\Client\ActivityController;
use App\Http\Controllers\Client\CommunityController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\DebugController;
use App\Http\Controllers\Client\PaymentController;
use App\Http\Controllers\Client\ProfileController;
use App\Http\Controllers\Client\FacebookController;
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
Route::get('/admin/add-product-type-detail/{product_id}', [ProductAdminController::class, 'add_product_type_detail']);
Route::get('/admin/edit-product/{product_id}', [ProductAdminController::class, 'edit_product']);
Route::get('/admin/edit-product-type-detail/{product_id}/{type_detail_id}', [ProductAdminController::class, 'edit_product_type_detail']);
Route::get('/admin/delete-product/{product_id}', [ProductAdminController::class, 'delete_product']);
Route::get('/admin/delete-product-type-detail/{type_detail_id}', [ProductAdminController::class, 'delete_product_type_detail']);


Route::post('/admin/save-product', [ProductAdminController::class, 'save_product']);
Route::post('/admin/save-product-type-detail/{product_id}', [ProductAdminController::class, 'save_product_type_detail']);
Route::post('/admin/update-product/{product_id}', [ProductAdminController::class, 'update_product']);
Route::post('/admin/update-product-type-detail/{product_id}/{type_detail_id}', [ProductAdminController::class, 'update_product_type_detail']);

//Types
Route::get('/admin/all-types', [TypesAdminController::class, 'all_types']);
Route::get('/admin/add-type', [TypesAdminController::class, 'add_type']);
Route::get('/admin/edit-type/{type_id}', [TypesAdminController::class, 'edit_type']);
Route::get('/admin/delete-type/{type_id}', [TypesAdminController::class, 'delete_type']);


Route::post('/admin/save-type', [TypesAdminController::class, 'save_type']);
Route::post('/admin/update-type/{type_id}', [TypesAdminController::class, 'update_type']);

// brands
Route::get('/admin/all-brands', [BrandsAdminController::class, 'all_brands']);
Route::get('/admin/add-brand', [BrandsAdminController::class, 'add_brand']);
Route::get('/admin/edit-brand/{brand_id}', [BrandsAdminController::class, 'edit_brand']);
Route::get('/admin/delete-brand/{brand_id}', [BrandsAdminController::class, 'delete_brand']);


Route::post('/admin/save-brand', [BrandsAdminController::class, 'save_brand']);
Route::post('/admin/update-brand/{brand_id}', [BrandsAdminController::class, 'update_brand']);

// user manager
Route::get('/admin/all-users', [UsersAdminController::class, 'all_users']);
Route::get('/admin/edit-user/{user_id}', [UsersAdminController::class, 'edit_user']);
Route::get('/admin/add-user-role/{user_id}', [UsersAdminController::class, 'add_user_role']);
Route::get('/admin/edit-user-role/{user_role_id}/{user_id}', [UsersAdminController::class, 'edit_user_role']);
Route::get('/admin/delete-user-role/{user_role_id}/{user_id}', [UsersAdminController::class, 'delete_user_role']);

Route::post('/admin/update-user/{user_id}', [UsersAdminController::class, 'update_user']);
Route::post('/admin/update-user-role/{user_role_id}/{user_id}', [UsersAdminController::class, 'update_user_role']);
Route::post('/admin/save-user-role/{user_id}', [UsersAdminController::class, 'save_user_role']);

//slider
Route::get('/admin/all-sliders', [SlidersAdminController::class, 'all_sliders']);
Route::get('/admin/add-slider', [SlidersAdminController::class, 'add_slider']);
Route::get('/admin/edit-slider/{slider_id}', [SlidersAdminController::class, 'edit_slider']);
Route::get('/admin/delete-slider/{slider_id}', [SlidersAdminController::class, 'delete_slider']);


Route::post('/admin/save-slider', [SlidersAdminController::class, 'save_slider']);
Route::post('/admin/update-slider/{slider_id}', [SlidersAdminController::class, 'update_slider']);

//order manager

Route::get('/admin/all-orders', [OrdersAdminController::class, 'all_orders']);
Route::get('/admin/add-order', [OrdersAdminController::class, 'add_order']);
Route::get('/admin/add-order-detail/{order_id}', [OrdersAdminController::class, 'add_order_detail']);
Route::get('/admin/edit-order/{order_id}', [OrdersAdminController::class, 'edit_order']);
Route::get('/admin/edit-order-detail/{order_id}/{type_detail_id}', [OrdersAdminController::class, 'edit_order_detail']);
Route::get('/admin/delete-order/{order_id}', [OrdersAdminController::class, 'delete_order']);
Route::get('/admin/delete-order-detail/{type_detail_id}', [OrdersAdminController::class, 'delete_order_detail']);


Route::post('/admin/save-order', [OrdersAdminController::class, 'save_order']);
Route::post('/admin/save-order-detail/{order_id}', [OrdersAdminController::class, 'save_order_detail']);
Route::post('/admin/update-order/{order_id}', [OrdersAdminController::class, 'update_order']);
Route::post('/admin/update-order-detail/{order_id}/{type_detail_id}', [OrdersAdminController::class, 'update_order_detail']);


//----------------------------------------------------------------------------------------------------------------------
/////////// client routes

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/contact', [HomeController::class, 'contact']);

//Login routes
Route::get('/login', [LoginController::class, 'index']);

//Sign up routes
Route::get('/sign-up', [SignUpController::class, 'index']);

// item detail routes
Route::get('/item-detail/{product_id}', [ItemDetailController::class, 'get_item_detail']);

// Explore routes
Route::get('/explore', [ExploreController::class, 'index']);

// Activity routes
Route::get('/activity', [ActivityController::class, 'index']);

// Community routes
Route::get('/blog', [CommunityController::class, 'blog']);
Route::get('/blog-detail', [CommunityController::class, 'blog_detail']);
Route::get('/help-center', [CommunityController::class, 'help_center']);

//Contact routes

// Cart routes
//Route::post('/show-cart', [CartController::class, 'show_cart']);
Route::get('/cart', [CartController::class, 'show_cart']);
Route::get('/delete-cart/{session_id}', [CartController::class, 'delete_cart']);
Route::get('/delete-all-cart', [CartController::class, 'delete_all_cart']);
Route::post('/add-to-cart', [CartController::class, 'add_to_cart']);
Route::post('/update-cart', [CartController::class, 'update_cart']);

//Payment
Route::get('/login-payment', [PaymentController::class, 'login_payment']);
Route::get('/checkout', [PaymentController::class, 'checkout']);

//----------------------------------------------------------------------------------------------------------------------
//Login routes
//Route::get('/login-facebook', [LoginController::class, 'login_facebook']);
Route::prefix('facebook')->name('facebook.')->group( function(){
    Route::get('auth', [FacebookController::class, 'login_facebook'])->name('login');
    Route::get('callback', [FacebookController::class, 'callback_facebook'])->name('callback');
});

//Profile routes
Route::get('/profile', [ProfileController::class, 'index']);
Route::get('logout', [LoginController::class, 'logout']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/add-user', [ProfileController::class, 'add_user']);


//----------------------------------------------------------------------------------------------------------------------
//debug
Route::get('/debug',[DebugController::class,'debug']);

Route::post('get-product',[ProductAdminController::class,'get_product']);
