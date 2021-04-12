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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::resource('/roles','RoleController');

Route::resource('/users','UserController');

Route::resource('/address','AddressController');

Route::resource('/admins','AdminController');

Route::resource('/categories','CategoryController');

Route::resource('/foods','FoodController');

Route::resource('/','FrontendController');

Auth::routes();

Route::get('/home', 'FrontendController@index')->name('home');


Route::get('/category/{id}','FrontendController@SingleCategory')->name('singlecategory');


Route::post('/add_to_cart/{id}','CartController@addToCart')->name('addtocart');
Route::get('/cartlist','CartController@cartList')->name('cartlist');
Route::get('/removecart/{id}','CartController@removeCart')->name('removecart');
Route::post('/updatecart/{id}','CartController@updateCart')->name('updatecart');


Route::Post('/orderPlace','OrderController@orderPlace')->name('orderPlace');
Route::Post('/buyPlace','OrderController@buyPlace')->name('buyPlace');
Route::get('/myorders','OrderController@Myorder')->name('myorder');
Route::get('/ordernow','OrderController@orderNow')->name('ordernow');
Route::get('/buynow/{id}','OrderController@buyNow')->name('buynow');

Route::get('/orderedit/{id}','OrderController@Orderedit')->name('orderedit');
Route::put('/orderupdate/{id}','OrderController@OrderUpdate')->name('order.update');

Route::get('/menus','FrontendController@menus')->name('menus');

Route::get('/search', 'FoodController@Search')->name('search');


Route::get('/verify','VerifyController@getVerify')->name('getverify');
Route::post('/verify','VerifyController@postVerify')->name('verify');


Route::resource('/shippingaddress','ShippingaddressController');


Route::post('shippingaddress/fetch', 'ShippingaddressController@fetch')->name('Shippingaddress.fetch');

Route::get('/userprofile/{id}','UserController@userprofile')->name('user.profile');


Route::post('/is_home','ShippingaddressController@is_home')->name('is_home');

Route::get('change-password', 'ChangePasswordController@index');
Route::get('/setAddress', 'ShippingaddressController@selectAddress')->name('setaddress');

Route::post('/buyselect', 'ShippingaddressController@buyselect')->name('buyselect');

Route::post('change-password', 'ChangePasswordController@store')->name('change.password');

Route::get('inquiry', 'OrderController@inquiry')->name('inquiry');
Route::get('getquote', 'OrderController@getquote')->name('getquote');

Route::post('postquote','OrderController@postquote')->name('postquote');

Route::get('/thankyou','FrontendController@thankyou')->name('thankyou');

Route::get('/singlefood/{id}','OrderController@singlefood')->name('singlefood');

Route::put('/singlefoodupdate/{id}','OrderController@singlefoodUpdate')->name('singlefoodUpdate');




// Route::get('/foods','FrontendController@foods')->name('foods');




// Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
// Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');



