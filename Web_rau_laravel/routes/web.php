<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Frontend
Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('/trang-chu','App\Http\Controllers\HomeController@index'); 
Route::post('/tim-kiem','App\Http\Controllers\HomeController@search'); 
Route::get('/blog','App\Http\Controllers\HomeController@blog'); 

//Danh mục sản phẩm trang chủ
Route::get('/danh-muc-san-pham-{category_id}','App\Http\Controllers\CategoryProduct@show_category_home'); 
Route::get('/chi-tiet-san-pham-{product_id}','App\Http\Controllers\ProductController@details_product'); 

Route::post('/load-comment','App\Http\Controllers\ProductController@load_comment'); 
Route::post('/send-comment','App\Http\Controllers\ProductController@send_comment'); 
Route::get('/comment','App\Http\Controllers\ProductController@list_comment'); 

Route::get('/duyet-comment/{comment_id}','App\Http\Controllers\ProductController@duyet_comment'); 
Route::get('/khongduyet-comment/{comment_id}','App\Http\Controllers\ProductController@khongduyet_comment'); 



//Backend
Route::get('/admin','App\Http\Controllers\AdminController@index'); 
Route::get('/dashboard','App\Http\Controllers\AdminController@show_dashboard'); 
Route::get('/logout','App\Http\Controllers\AdminController@logout'); 

Route::post('/admin-dashboard','App\Http\Controllers\AdminController@dashboard'); 
Route::post('/filter-by-date','App\Http\Controllers\AdminController@filter_by_date'); 
Route::post('/dashboard-filter','App\Http\Controllers\AdminController@dashboard_filter');
Route::post('/days-order','App\Http\Controllers\AdminController@days_order'); 




//Category
Route::get('/add-category-product','App\Http\Controllers\CategoryProduct@add_category_product'); 
Route::get('/all-category-product','App\Http\Controllers\CategoryProduct@all_category_product'); 
Route::post('/save-category-product','App\Http\Controllers\CategoryProduct@save_category_product'); 

Route::get('/edit-category-product-{category_product_id}','App\Http\Controllers\CategoryProduct@edit_category_product'); 
Route::get('/delete-category-product/{category_product_id}','App\Http\Controllers\CategoryProduct@delete_category_product'); 

Route::get('/unactive-category-product/{category_product_id}','App\Http\Controllers\CategoryProduct@unactive_category_product'); 
Route::get('/active-category-product/{category_product_id}','App\Http\Controllers\CategoryProduct@active_category_product'); 

Route::post('/update-category-product-{category_product_id}','App\Http\Controllers\CategoryProduct@update_category_product'); 


//Product
Route::get('/add-product','App\Http\Controllers\ProductController@add_product'); 
Route::post('/save-product','App\Http\Controllers\ProductController@save_product'); 

Route::get('/all-product','App\Http\Controllers\ProductController@all_product'); 

Route::get('/edit-product-{product_id}','App\Http\Controllers\ProductController@edit_product'); 
Route::get('/delete-product/{product_id}','App\Http\Controllers\ProductController@delete_product'); 

Route::post('/update-product-{product_id}','App\Http\Controllers\ProductController@update_product'); 


Route::get('/unactive-product/{product_id}','App\Http\Controllers\ProductController@unactive_product'); 
Route::get('/active-product/{product_id}','App\Http\Controllers\ProductController@active_product'); 

//Cart

Route::post('/save-cart','App\Http\Controllers\CartController@save_cart'); 
Route::post('/update-cart-quantity','App\Http\Controllers\CartController@update_cart_qty'); 

Route::get('/show-cart','App\Http\Controllers\CartController@show_cart'); 
Route::get('/delete-to-cart-{rowId}','App\Http\Controllers\CartController@delete_to_cart'); 

//Checkout
Route::post('/confirm-order', 'App\Http\Controllers\CheckoutController@confirm_order');

Route::get('/login-checkout', 'App\Http\Controllers\CheckoutController@login_checkout');
Route::get('/dang-nhap', 'App\Http\Controllers\CheckoutController@dang_nhap');
Route::post('/add-customer', 'App\Http\Controllers\CheckoutController@add_customer');

Route::get('/checkout', 'App\Http\Controllers\CheckoutController@checkout');

Route::get('/logout-checkout', 'App\Http\Controllers\CheckoutController@logout_checkout');
Route::post('/login-customer', 'App\Http\Controllers\CheckoutController@login_customer');

Route::post('/order-place', 'App\Http\Controllers\CheckoutController@order_place');

Route::get('/payment', 'App\Http\Controllers\CheckoutController@payment');

Route::post('/save-checkout-customer', 'App\Http\Controllers\CheckoutController@save_checkout_customer');

//Manage Order
Route::get('/manage-order', 'App\Http\Controllers\OrderController@manage_order');
Route::get('/view-order-{orderId}', 'App\Http\Controllers\OrderController@view_order');
Route::post('/update-order-qty', 'App\Http\Controllers\OrderController@update_order_qty');

// Quản lý đơn hàng khách hàng
Route::get('/manager-order-customer-{customer_id}', 'App\Http\Controllers\OrderController@manager_order_customer');
Route::get('/all-customer', 'App\Http\Controllers\CustomerController@all_customer');
// Route::get('/edit-customer-{customer_id}','App\Http\Controllers\CustomerController@edit_customer'); 
// Route::get('/delete-customer/{customer_id}','App\Http\Controllers\ProductController@delete_customer'); 
// Route::post('/update-customer-{customer_id}','App\Http\Controllers\CustomerController@update_customer'); 




// Route::get('/manage-order', 'App\Http\Controllers\CheckoutController@manage_order');
// Route::get('/view-order-{orderID}', 'App\Http\Controllers\CheckoutController@view_order');

//Coupon
Route::post('/check-coupon', 'App\Http\Controllers\CartController@check_coupon');
Route::get('/unset-coupon', 'App\Http\Controllers\CouponController@unset_coupon');



//Coupon Admin
Route::get('/insert-coupon', 'App\Http\Controllers\CouponController@insert_coupon');
Route::post('/insert-coupon-code', 'App\Http\Controllers\CouponController@insert_coupon_code');
Route::get('/list-coupon', 'App\Http\Controllers\CouponController@list_coupon');
Route::get('/delete-coupon/{coupon_id}','App\Http\Controllers\CouponController@delete_coupon'); 

//Gallery
Route::get('/add-gallery-{product_id}', 'App\Http\Controllers\GalleryController@add_gallery');
Route::post('select-gallery', 'App\Http\Controllers\GalleryController@select_gallery');
Route::post('insert-gallery-{pro_id}', 'App\Http\Controllers\GalleryController@insert_gallery');
Route::post('update-gallery-name', 'App\Http\Controllers\GalleryController@update_gallery_name');
Route::post('delete-gallery', 'App\Http\Controllers\GalleryController@delete_gallery');
Route::post('update-gallery', 'App\Http\Controllers\GalleryController@update_gallery');

