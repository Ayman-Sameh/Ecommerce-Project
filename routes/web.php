<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\PageController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\front\CartController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\ImageController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\BannarController;
use App\Http\Controllers\admin\MassageController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\front\AccountController;
use App\Http\Controllers\front\ContactController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\front\CheckoutController;
use App\Http\Controllers\front\HomeUserController;
use App\Http\Controllers\front\PageUserController;
use App\Http\Controllers\front\WishlistController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ReportOrderController;
use App\Http\Controllers\front\ProductUserController;
use App\Http\Controllers\admin\ProductColorController;
use App\Http\Controllers\front\CategoryUserController;

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

// Route Admin

Route::prefix('admin')->middleware('auth' , 'verified' , 'isAdmin')->group(function(){

    Route::get('/dashboard', function () {
    return view('admin.dashboard');
    })->middleware(['auth'])->name('dashboard');

    Route::resource('category'        , CategoryController::class);
    Route::resource('page'            , PageController::class);
    Route::resource('massage'         , MassageController::class);
    Route::resource('product'         , ProductController::class);
    Route::get     ('export/'         , [ProductController::class, 'export']);
    Route::get     ('import/'         , [ProductController::class, 'import']);
    Route::post    ('import-product'  , [ProductController::class, 'importproduct']);
    Route::resource('productcolor'    , ProductColorController::class);
    Route::resource('image'           , ImageController::class);
    Route::resource('setting'         , SettingController::class);
    Route::resource('user'            , UserController::class);
    Route::resource('order'           , OrderController::class);
    Route::get     ('report'          , [ReportOrderController::class, 'report']); 
    Route::post    ('report-order'    , [ReportOrderController::class, 'reportorder']); 
    Route::resource('dashboard'       , DashboardController::class);
    Route::resource('bannar'          , BannarController::class);
    Route::resource('brand'           , BrandController::class);
});


// Route User

Route::get('/'                        , [HomeUserController::class     , 'index'])->name('home');
Route::get('/page-user/{id}'          , [PageUserController::class     , 'show']);
Route::get('/index-product'           , [ProductUserController::class  , 'index']);
Route::get('/view-product/{id}'       , [ProductUserController::class  , 'view']);
Route::get('/view-category'           , [CategoryUserController::class , 'view']);
Route::post('add-to-cart'             , [CartController::class         , 'addproduct']);
Route::post('add-to-wishlist'         , [WishlistController::class     , 'add']);
Route::delete('delete-cart-item/{id}' , [CartController::class         , 'deletecart']);
Route::delete('delete-wish-item/{id}' , [WishlistController::class     , 'deletecart']);
Route::Post('update-cart'             , [CartController::class         , 'updatecart']);
Route::get('load-cart-data'           , [CartController::class         , 'cartcount']);
Route::get('load-wish-data'           , [WishlistController::class     , 'wishlistcount']);
Route::get('/product-list'            , [HomeUserController::class     , 'productlist']);
Route::post('searchproduct'           , [HomeUserController::class     , 'searchproduct']);
Route::resource('contact'             , ContactController::class);

Route::middleware(['auth' , 'verified'])->group(function() {
    Route::get('/cart'             , [CartController::class      , 'viewcart']);
    Route::get('/checkout'         , [CheckoutController::class  , 'index']);
    Route::post('/place-order'     , [CheckoutController::class  , 'placeorder']);
    Route::get('/wishlist'         , [WishlistController::class  , 'index']);
    Route::get('/account'          , [AccountController::class   , 'index']);
    Route::get('/change-password'  , [AccountController::class   , 'changepassword']);
    Route::post('/update-password' , [AccountController::class   , 'updatepassword']);
    Route::get('/edit-profile'     , [AccountController::class   , 'editprofile']);
    Route::post('/update-profile'  , [AccountController::class   , 'updateprofile']);
    Route::get('/view-order/{id}'  , [AccountController::class   , 'vieworder']);

});

require __DIR__.'/auth.php';

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
