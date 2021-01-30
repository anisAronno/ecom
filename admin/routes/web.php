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
//  Route::get('/order_details', function () {

//     return view('order_details');
//  });

Route::get('/', 'HomeController@HomeIndex')->middleware('loginCheck');
Route::get('/visitor', 'VisitorController@VisitorIndex')->middleware('loginCheck');


//admin category management
Route::get('/category', 'CategoryController@CategoryIndex')->middleware('loginCheck');
Route::get('/getCategoryData', 'CategoryController@CategoryData')->middleware('loginCheck');
Route::post('/categoryDelete', 'CategoryController@CategoryDelete')->middleware('loginCheck');
Route::post('/servicedetails', 'CategoryController@CategoryDetailsEdit')->middleware('loginCheck');
Route::post('/categoryUpdate', 'CategoryController@CategoryUpdate')->middleware('loginCheck');
Route::post('/addCategory', 'CategoryController@CategoryAdd')->middleware('loginCheck');








//admin panel product management
Route::get('/products', 'ProductController@ProductIndex')->middleware('loginCheck');
Route::get('/getcategory', 'ProductController@getCategory')->middleware('loginCheck');
Route::get('/getbrand', 'ProductController@getBrand')->middleware('loginCheck');
Route::post('/addProducts', 'ProductController@ProductAdd')->middleware('loginCheck');
Route::get('/getproductsdata', 'ProductController@ProductData')->middleware('loginCheck');
Route::post('/productdelete', 'ProductController@ProductDelete')->middleware('loginCheck');


Route::post('/productdetails', 'ProductController@ProductDetailEdit')->middleware('loginCheck');
Route::post('/productupdate', 'ProductController@ProductUpdate')->middleware('loginCheck');

//Customer Order Controller Routes

Route::get('/order', 'OrderController@order_show');
Route::any('/order_details/', 'OrderController@order_details')->name('getOrderData');
Route::any('/shipping_confirm', 'OrderController@shipping_confirm')->name('shippingConfirm');
Route::get('/load_order_data', 'OrderController@load_order_data')->name('orderSuccess');









//admin panel Brand management

Route::get('/brand', 'BrandController@BrandIndex')->middleware('loginCheck');
Route::post('/addbrand', 'BrandController@BrandAdd')->middleware('loginCheck');
Route::get('/getbranddata', 'BrandController@BrandData')->middleware('loginCheck');
Route::post('/branddelete', 'BrandController@BrandDelete')->middleware('loginCheck');
Route::post('/branddetails', 'BrandController@BrandDetailEdit')->middleware('loginCheck');
Route::post('/brandupdate', 'BrandController@BrandUpdate')->middleware('loginCheck');





//admin panel Slider management

Route::get('/slider', 'SliderController@SliderIndex')->middleware('loginCheck');
Route::post('/addslider', 'SliderController@SliderAdd')->middleware('loginCheck');
Route::get('/getsliderdata', 'SliderController@SliderData')->middleware('loginCheck');
Route::post('/sliderdelete', 'SliderController@SliderDelete')->middleware('loginCheck');
Route::post('/sliderdetails', 'SliderController@SliderDetailEdit')->middleware('loginCheck');
Route::post('/sliderupdate', 'SliderController@SliderUpdate')->middleware('loginCheck');



//admin panel Home Page Others management with social URL


Route::get('/others', 'OthersModelController@otherIndex')->middleware('loginCheck');
Route::post('/address', 'OthersModelController@addAddress')->middleware('loginCheck');
Route::post('/phone', 'OthersModelController@addPhone')->middleware('loginCheck');
Route::post('/email', 'OthersModelController@addEmail')->middleware('loginCheck');
Route::post('/title', 'OthersModelController@addTitle')->middleware('loginCheck');
Route::post('/gmap', 'OthersModelController@addGmap')->middleware('loginCheck');
Route::post('/logo', 'OthersModelController@logoAdd')->middleware('loginCheck');

//admin panel Home Page Social Link management
Route::get('/social', 'SocialController@SocialIndex')->middleware('loginCheck');
Route::post('/facebook', 'SocialController@addFacebook')->middleware('loginCheck');
Route::post('/twitter', 'SocialController@addTwitter')->middleware('loginCheck');
Route::post('/youtube', 'SocialController@addYoutube')->middleware('loginCheck');
Route::post('/instragram', 'SocialController@addInstragram')->middleware('loginCheck');
Route::post('/linkin', 'SocialController@addLinkin')->middleware('loginCheck');
Route::post('/google', 'SocialController@addGoogle')->middleware('loginCheck');







//Message panel management

Route::get('/message', 'MessageController@MessageIndex')->middleware('loginCheck');
Route::get('/getmessagedata', 'MessageController@MessageData')->middleware('loginCheck');
Route::post('/deletemessage', 'MessageController@MessageDelete')->middleware('loginCheck');



//Review panel Mangement
Route::get('/review', 'ReviewController@ReviewIndex')->middleware('loginCheck');
Route::get('/getReviewtdata', 'ReviewController@ReviewData')->middleware('loginCheck');
Route::post('/Reviewtdelete', 'ReviewController@ReviewDelete')->middleware('loginCheck');
Route::post('/Reviewtdetails', 'ReviewController@ReviewDetailsEdit')->middleware('loginCheck');
Route::post('/Reviewtupdate', 'ReviewController@ReviewUpdate')->middleware('loginCheck');
Route::post('/addReview', 'ReviewController@ReviewAdd')->middleware('loginCheck');



// Admin Panel Login Management
Route::get('/login', 'LoginController@LoginIndex');
Route::post('/onLogin', 'LoginController@onLogin');
Route::get('/logout', 'LoginController@onLogout');



// Admin Photo Gallery
Route::get('/Photo', 'PhotoController@PhotoIndex')->middleware('loginCheck');
Route::post('/imageup', 'PhotoController@uploadImage')->middleware('loginCheck');
Route::get('/PhotoJSON', 'PhotoController@PhotoJSON')->middleware('loginCheck');





// Admin Photo Gallery
Route::get('/admin', 'AdminController@AdminIndex')->middleware('loginCheck');
Route::post('/addAdmin', 'AdminController@AdminAdd')->middleware('loginCheck');
Route::get('/getAdmindata', 'AdminController@AdminData')->middleware('loginCheck');
Route::post('/Admindelete', 'AdminController@AdminDelete')->middleware('loginCheck');
Route::post('/Admindetails', 'AdminController@AdminDetailEdit')->middleware('loginCheck');
Route::post('/Adminupdate', 'AdminController@AdminUpdate')->middleware('loginCheck');


//WHolesales Contact Route
Route::get('/contact', 'WholeSalesController@contactIndex')->middleware('loginCheck');
Route::get('/getContactData', 'WholeSalesController@getContactData')->middleware('loginCheck');
Route::post('/deleteContactData', 'WholeSalesController@contactDelete')->middleware('loginCheck');




//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});


//Clear Config cache:
Route::get('/Storage-link', function() {
    $exitCode = Artisan::call('storage:link');
    return '<h1>Storage Link Created</h1>';
});




//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});


//Clear Config cache:
Route::get('/storage-link', function() {
    $exitCode = Artisan::call('storage:link');
    return '<h1>Storage Link Created</h1>';
});

//Clear Config cache:
Route::get('/create-model', function() {
    $exitCode = Artisan::call('make:model ContactModel');
    return '<h1>Storage Link Created</h1>';
});





//Clear Config cache:
Route::get('/Create-controller', function() {
    $exitCode = Artisan::call('make:controller WholeSalesController');
    return '<h1>Controller Created</h1>';
});

