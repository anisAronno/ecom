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

// Route::get('/home', function () {
//     return view('grocery_shop.home');
// });
Route::get('/about', function () {
    return view('grocery_shop.about');
});
Route::get('/profile', function () {
    return view('grocery_shop.user_profile');
})->middleware('customer');
Route::get('/check_out', function () {
    return view('grocery_shop.check_out');
});
Route::get('/events', function () {
    return view('grocery_shop.events');
});
Route::get('/login', function () {
    return view('grocery_shop.login');
});
Route::any('/payment', function () {
    return view('grocery_shop.payment');
});
Route::get('/mail', function () {
    return view('grocery_shop.mail');
});
// Route::get('/single', function () {
//     return view('grocery_shop.single');
// });





// Route::get('/bread', function () {

//     return view('grocery_shop.bread');
// });

// Route::get('/drinks', function () {
//     return view('grocery_shop.drinks');
// });

// Route::get('/frozen', function () {
//     return view('grocery_shop.frozen');
// });
// Route::get('/household', function () {
//     return view('grocery_shop.household');
// });
// Route::get('/kitchen', function () {
//     return view('grocery_shop.kitchen');
// });



// Route::get('/pet', function () {
//     return view('grocery_shop.pet');
// });
Route::get('/product', function () {
    return view('grocery_shop.product');
});
// Route::get('/product', function () {
//     return view('grocery_shop.productcopy');
// });
// Route::get('/vegetable', function () {
//     return view('grocery_shop.vegetable');
// });
//controllers route are here
Route::any('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/category{id}', [App\Http\Controllers\CategoryProductShow::class, 'index'])->name('category.product');
Route::get('/product{id}', [App\Http\Controllers\SingleProductController::class, 'SingleProductShow'])->name('single.product');
Route::any('/add_customer', [App\Http\Controllers\CustomerRegisterController::class, 'customer_store']);
Route::any('/customer_login', [App\Http\Controllers\LoginController::class, 'customer_login']);
Route::any('/add_to_cart', [App\Http\Controllers\cartController::class, 'add_to_cart'])->name('addToCat');
Route::any('/remove_form_cart/{id}', [App\Http\Controllers\cartController::class, 'remove_form_cart']);
Route::post('/order_insert', [App\Http\Controllers\CustomerOrderController::class, 'order_insert']);
Route::post('/customer_wishlist', [App\Http\Controllers\CustomerOrderController::class, 'customer_wishlist'])->name('customerWishlist');
Route::any('/customer_order/{id}', [App\Http\Controllers\CustomerOrderController::class, 'customer_order'])->name('CustomerOrderDetails');

