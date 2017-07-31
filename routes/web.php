<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

//Route::get('/home', 'HomeController@index');

/* Frontend part of the shop */
Route::get('/', 'FrontendController@home');
Route::get('/home', 'FrontendController@home');
Route::get('/collection', 'FrontendController@collection')->name('frontend.collection');
//Route::get('/collection', 'FrontendController@collection');
Route::get('/topbrands', 'FrontendController@topbrands');
//Route::get('/cart', 'FrontendController@cart');
Route::get('/contact', 'FrontendController@contact');
Route::get('/login', 'FrontendController@login');
Route::get('/signin', 'FrontendController@signin');
Route::get('/signup', 'FrontendController@signup');
Route::get('/vendor-signup', 'FrontendController@vendorSignup');
Route::get('registration', 'FrontendController@process_vendorSignup');
Route::get('/user/activation/{token}', 'Auth\RegisterController@userActivation');
Route::post('/process_signin', 'FrontendController@create');
Route::get('/search', 'FrontendController@search');
Route::get('/details/{id}', 'FrontendController@details');
Route::get('/category/{id}', 'FrontendController@show')->name('collection.show');
Route::get('/subcategory/{id}', 'FrontendController@subproduct')->name('collection.subproduct');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/buynow/{id}', 'CartController@buynow')->name('cart.buy');

Route::resource('/cart', 'CartController');
Route::resource('/address', 'AddressController');
//Route::get('/checkout', 'CheckoutController@step1');


Route::group(['middleware' => 'auth'], function () {

    Route::get('shipping-info', 'CheckoutController@shipping')->name('checkout.shipping');
    Route::get('/payment', 'CheckoutController@payment')->name('checkout.payment');
    Route::post('/store-payment', 'CheckoutController@storePayment')->name('payment.store');
//    Route::get('logout', 'BackendController@getLogout')->name('frontend.signin');
});


    /* Backend part of the shop */
Route::get('/admin', 'BackendController@admin');


/* Admin resource controller */
Route::resource('/categories', 'CategoryController');
Route::resource('/brands', 'BrandsController');
Route::resource('/products', 'ProductsController');
Route::get('/orders/{type?}', 'OrdersController@orders');
Route::post('toggledeliver/{orderId}', 'OrdersController@toggledeliver')->name('toggle.deliver');
Route::resource('/attribute', 'AttributeController');
Route::resource('/attribute_set', 'AttributeSetController');


Route::get('/users/{type?}', [
    'uses' => 'UsersController@index',
    'as' => 'users',
    'middleware' => 'roles',
    'roles' => ['Admin']
    ]);
Route::get('/manage_users', [
    'uses' => 'UsersController@manage_users',
    'as' => 'manage_users',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Auth::routes();

//Route::get('/home', 'HomeController@index');
Route::get('test', 'Test@ajax');
Route::post('test_ajax', 'Test@test_ajax');
