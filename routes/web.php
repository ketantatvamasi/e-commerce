<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
//use App\Http\Controllers\Auth\SocialiteAuthController;

use App\Http\Controllers\frontend\DasboardController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\frontend\OrderListController;
use App\Http\Controllers\frontend\ShopController;

use App\Http\Controllers\backend\AdminLoginController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ItemController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\WomanProductController;
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
    return view('auth.login');
});

Auth::routes();
// google login
//Route::get('google', [SocialiteAuthController::class, 'googleRedirect'])->name('auth/google');
//Route::get('/auth/google-callback', [SocialiteAuthController::class, 'loginWithGoogle']);

Route::group(['middleware'=>'auth'],function() {
    Route::get('/dashboard', [DasboardController::class, 'index'])->name('dashboard');
    Route::get('/wishlist', [DasboardController::class, 'wishlistView'])->name('wishlist');
//    Route::get('/cart', [DasboardController::class, 'cartView'])->name('cartView');
//    Route::get('/cart/{id}', [DasboardController::class, 'cartViewID']);

    //checkout route
    Route::get('/checkout', [CheckoutController::class, 'checkoutView'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'checkoutView2'])->name('checkout2');
    Route::get('/payment', [CheckoutController::class, 'payment'])->name('payment');
    Route::post('/payment', [CheckoutController::class, 'store'])->name('storePayment');
    Route::any('/success', [CheckoutController::class, 'success']);


    Route::get('/shop', [ShopController::class, 'shopView'])->name('shop');
    Route::get('/shop2', [ShopController::class, 'shopView2'])->name('shop2');
    Route::get('/productDetails/{id}', [ShopController::class, 'productDetails'])->name('productDetails');

    Route::get('add-to-cart2/{id}', [ShopController::class, 'addToCart2'])->name('add.to.cart2');
    Route::patch('update-cart2', [ShopController::class, 'update2'])->name('update.cart2');
    Route::delete('remove-from-cart2', [ShopController::class, 'remove2'])->name('remove.from.cart2');
    //cart route
    Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
    Route::patch('update-cart', [CartController::class, 'update'])->name('update.cart');
    Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');

    Route::get('orderList',[OrderListController::class,'orderList'])->name('orderList');
    Route::get('getOrderList',[OrderListController::class,'getOrderList'])->name('getOrderList');
    Route::get('addresses',[OrderListController::class,'addresses'])->name('addresses');
    Route::post('address',[OrderListController::class,'address'])->name('address');

    Route::get('addAddress',[OrderListController::class,'addAddress'])->name('addAddress');
    Route::get('editAddress/{id}',[OrderListController::class,'editaddress'])->name('editaddress');
    Route::get('deleteAddress/{id}',[OrderListController::class,'deleteaddress'])->name('deleteaddress');
    Route::get('deleteShppingAddress/{id}',[OrderListController::class,'deleteShppingAddress'])->name('deleteShppingAddress');
});
//Route::get('/dashboard', [DasboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::post('/user/logout', [LoginController::class, 'userLogout'])->name('user.logout');



$admin_route = config('app.admin_route');
Route::controller(AdminLoginController::class)
    ->prefix($admin_route)
    ->group(function () {
        Route::group(['middleware'=>'admin.guest'],function(){
            Route::get('/login', 'login')->name('admin.login');
            Route::post('/adminlogin', 'authenticate')->name('admin.auth');
        });
        Route::group(['middleware'=>'admin.auth'],function() {
            Route::post('/logout', 'logout')->name('admin.logout');
            Route::get('/dashboard', 'index')->name('admin.dashboard');
            Route::any('/category', [CategoryController::class, 'createCategory'])->name('createCategory');
            Route::any('/item', [ItemController::class, 'createItem'])->name('createItem');
            Route::any('/createProduct' ,[ProductController::class, 'createProduct'])->name('createProduct');
            Route::get('/getsubcategory', [ProductController::class, 'getSubcategory'])->name('getSubcategory');
            Route::get('/product', [ProductController::class, 'ProductView'])->name('ProductView');
//            Route::get('/addProduct', [ProductController::class, 'addProduct'])->name('addProduct');
            Route::post('/deleteProductImage', [ProductController::class, 'deleteProductImage'])->name('deleteProductImage');
            Route::get('/getproduct', [ProductController::class, 'getproduct'])->name('getproduct');
            Route::post('/deleteProduct', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
            Route::get('/editProduct/{id}', [ProductController::class, 'editProduct'])->name('editProduct');
            Route::post('/updateProduct', [ProductController::class, 'updateProduct'])->name('updateProduct');

            Route::get('/editWomanProduct/{id}', [WomanProductController::class, 'editWomanProduct'])->name('editWomanProduct');
            Route::post('/deleteWomanProductImage', [WomanProductController::class, 'deleteWomanProductImage'])->name('deleteWomanProductImage');
            Route::get('/WomanProductView', [WomanProductController::class, 'WomanProductView'])->name('WomanProductView');
            Route::get('/getWomanProduct', [WomanProductController::class, 'getWomanProduct'])->name('getWomanProduct');
            Route::post('/deleteWomanProduct', [WomanProductController::class, 'deleteWomanProduct'])->name('deleteWomanProduct');
            Route::post('/updateWomanProduct', [WomanProductController::class, 'updateWomanProduct'])->name('updateWomanProduct');
            Route::any('/createWomanProduct', [WomanProductController::class, 'createWomanProduct'])->name('createWomanProduct');
            //order route

            Route::get('/order', [OrderController::class, 'OrderView'])->name('OrderView');
            Route::get('/getorder', [OrderController::class, 'getorder'])->name('getorder');
        });
    });
