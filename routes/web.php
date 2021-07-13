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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/payments/pay', 'PaymentController@pay')->name('pay');
Route::get('/payments/approval', 'PaymentController@approval')->name('approval');
Route::get('/payments/cancelled', 'PaymentController@cancelled')->name('cancelled');


Route::get('about_us', 'WebController@about_us')->name('web.about_us');
Route::get('contact_us', 'WebController@contact_us')->name('web.contact_us');
Route::get('service_details/{service}', 'WebController@service_details')->name('web.service_details');
Route::get('servicio', 'WebController@service')->name('web.service');
Route::get('product_details/{product}', 'WebController@product_details')->name('web.product_details');
Route::get('product', 'WebController@product')->name('web.product');
Route::get('blog_details/{post}', 'WebController@blog_details')->name('web.blog_details');
Route::get('blog', 'WebController@blog')->name('web.blog');


Route::get('home', ['as' => 'home', 'uses' => 'PagesController@home']);

Route::get('login', 'AuthController@showLoginForm')->name('login');
Route::post('login', 'AuthController@login');
Route::get('logout', 'AuthController@logout');

Route::post('/cart-add', 'CartController@add')->name('cart.add');
Route::get('/cart-checkout', 'CartController@cart')->name('cart.checkout');
Route::post('/cart-clear', 'CartController@clear')->name('cart.clear');
Route::post('/cart-removeitem', 'CartController@removeitem')->name('cart.removeitem');

Route::get('sales/reports_day', 'ReportController@reports_day')->name('reports.day');
Route::get('sales/reports_date', 'ReportController@reports_date')->name('reports.date');
Route::post('sales/report_results', 'ReportController@report_results')->name('report.results');

Route::resource('businesses', 'BusinessController')->names('businesses');

Route::get('checkout', 'WebController@checkout')->name('web.checkout');
Route::get('mis_pedidos', 'WebController@orders')->name('web.orders');

Route::resource('posts', 'PostController')->names('posts');
Route::resource('categories', 'CategoryController')->names('categories');
Route::resource('clients', 'ClientController')->names('clients');
Route::resource('services', 'ServiceController')->names('services');
Route::resource('products', 'ProductController')->names('products');
Route::resource('comentarios', 'CommentsController');
Route::resource('providers', 'ProviderController')->names('providers');
Route::resource('purchases', 'PurchaseController')->names('purchases');
Route::resource('sales', 'SaleController')->names('sales');
Route::resource('orders', 'OrderController')->names('orders')->only([
'index', 'show'
]);;
Route::resource('users', 'UsersController')->names('users');
Route::resource('roles', 'RoleController')->names('roles');
Route::resource('shopping_cart_detail', 'ShoppingCartDetailController')->names('shopping_cart_details');

Route::get('orders_update/{id}', 'OrderController@orders_update')->name('orders_update');
Route::put('shopping_cart/update', 'ShoppingCartController@update')->name('shopping_cart.update');
Route::get('shopping_cart_detail/{shopping_cart_detail}/destroy', 'ShoppingCartDetailController@destroy')->name('shopping_cart_details.destroy');

Route::get('purchases/upload/{purchase}', 'PurchaseController@upload')->name('upload.purchases');

Route::get('purchases/pdf/{purchase}', 'PurchaseController@pdf')->name('purchases.pdf');
Route::get('orders/pdf/{order}', 'OrderController@pdf')->name('orders.pdf');
Route::get('orders/ticket/{order}', 'OrderController@ticket')->name('orders.ticket');
Route::get('sales/pdf/{sale}', 'SaleController@pdf')->name('sales.pdf');

Route::get('change_status/products/{product}', 'ProductController@change_status')->name('change.status.products');
Route::get('change_status/purchases/{purchase}', 'PurchaseController@change_status')->name('change.status.purchases');
Route::get('change_status/sales/{sale}', 'SaleController@change_status')->name('change.status.sales');
Route::get('change_status/services/{service}', 'ProductController@change_status')->name('change.status.services');


Route::get('get_products_by_id', 'ProductController@get_products_by_id')->name('get_products_by_id');
Route::get('get_products_by_barcode', 'ProductController@get_products_by_barcode')->name('get_products_by_barcode');
Route::get('print_barcode', 'ProductController@print_barcode')->name('print_barcode');
Route::get('get_services_by_id', 'ServiceController@get_services_by_id')->name('get_services_by_id');
Route::get('get_services_by_barcode', 'ServiceController@get_services_by_barcode')->name('get_services_by_barcode');
Route::get('print_barcode', 'ServiceController@print_barcode')->name('print_barcode');

Auth::routes();
Route::get('change_status/sales/{sale}', 'SaleController@change_status')->name('change.status.sales');

Route::get('sales/reports_day', 'ReportController@reports_day')->name('reports.day');
Route::get('sales/reports_date', 'ReportController@reports_date')->name('reports.date');
Route::post('sales/report_results', 'ReportController@report_results')->name('report.results');

Route::get('/datos', 'HomeController@index')->name('datos');