<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Auth\LoginController;
use App\Http\Controllers\Web\Front\HomeController;
use App\Http\Controllers\Web\Admin\OrderController;
use App\Http\Controllers\Web\Front\ChartController;
use App\Http\Controllers\Web\Admin\ReportController;
use App\Http\Controllers\Web\Admin\ProductController;
use App\Http\Controllers\Web\Auth\RegisterController;
use App\Http\Controllers\Web\Front\PaymentController;
use App\Http\Controllers\Web\Front\ProfileController;
use App\Http\Controllers\Web\Admin\CustoemrController;
use App\Http\Controllers\Web\Auth\SocialiteController;
use App\Http\Controllers\Web\Admin\AttributeController;
use App\Http\Controllers\Web\Admin\DashboardController;
use App\Http\Controllers\Web\Admin\ManagemenproductController;
use App\Http\Controllers\Web\Admin\PdfController;

Route::prefix('auth')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::get('/req', [RegisterController::class, 'index'])->name('register');
    Route::post('/req', [RegisterController::class, 'store'])->name('register-store');
    Route::post('/login', [LoginController::class, 'store'])->name('login-store');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/redirect', [SocialiteController::class, 'redirect'])->name('redirect');
    Route::get('/google/callback', [SocialiteController::class, 'callback'])->name('callback');
});

Route::prefix('admin')->middleware('auth', 'check_users:admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
   

    Route::prefix('managemen-products')->group(function () {
        Route::get('/', [ManagemenproductController::class, 'index'])->name('products');

        Route::post('/category', [AttributeController::class, 'storeCategory'])->name('store-catgeory');
        Route::get('/category/{id}', [AttributeController::class, 'destroyCategory'])->name('destroy-category');

        Route::post('/stock', [AttributeController::class, 'storeStock'])->name('store-stock');
        Route::get('/stock-destroy/{id}', [AttributeController::class, 'destroyStock'])->name('destroy-stock');
        Route::post('/stock-update/{id}', [AttributeController::class, 'updateStock'])->name('update-stock');
        Route::post('/size', [AttributeController::class, 'storeSize'])->name('store-size');
        Route::get('/size/{id}', [AttributeController::class, 'destroySize'])->name('destroy-size');






        Route::post('/color', [AttributeController::class, 'storeColor'])->name('store-color');
        Route::get('/color/{id}', [AttributeController::class, 'destroyColor'])->name('destroy-color');

        Route::get('/products-show/{id}', [ProductController::class, 'show'])->name('products.show');
        Route::put('/products-update/{id}', [ProductController::class, 'update'])->name('products.update');


        Route::post('/product', [ProductController::class, 'store'])->name('store-product');
        Route::get('/product/{id}', [ProductController::class, 'destroy'])->name('destroy-product'); 
    });

    

    Route::prefix('customers')->group(function(){
        Route::get('/', [CustoemrController::class, 'index'])->name('customers');
        
    });
    Route::prefix('reports')->group(function(){
        Route::get('/', [ReportController::class, 'index'])->name('reports');
       
        Route::get('/pdf', [PdfController::class, 'orderFinish'])->name('pdf.order-finish.download');
        Route::get('/pdf-cancelled', [PdfController::class, 'orderCancelled'])->name('pdf.order-cancelled.download');
        Route::get('/pdf-shippeds', [PdfController::class, 'orderShippeds'])->name('pdf.order-shippeds.download');
        Route::get('/pdf-new', [PdfController::class, 'orderNew'])->name('pdf.order-new.download');
        Route::get('/pdf-process', [PdfController::class, 'orderProcess'])->name('pdf.order-process.download');
        
    });
});

Route::middleware('auth')->group(function () {
    Route::get('chart/destroy/{id}', [ChartController::class, 'destroy'])->name('destroy-cart');
    Route::get('chart', [ChartController::class, 'index'])->name('cart');
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('address', [ProfileController::class, 'store'])->name('address-store');

    Route::post('/product/add', [ProductController::class, 'addChart'])->name('add-cart');

    Route::post('/update-cart-item-qty/{id}', [ChartController::class, 'updateCartItemQty']);
    Route::post('/payments', [PaymentController::class, 'payments'])->name('payments');
    Route::get('/payments-details/{id}', [PaymentController::class, 'paymentsDetails'])->name('payments-details');
    Route::get('/success-payment/{id}', [PaymentController::class, 'paymentsSuccess'])->name('payments-success');
    Route::get('/success-payment-info', [PaymentController::class, 'paymentsSuccessinfo'])->name('payments-success-info');


    Route::prefix('orders')->group(function(){
        Route::get('/', [OrderController::class, 'index'])->name('orders');
        Route::post('/filter', [OrderController::class, 'filter'])->name('orders.filter');
       
       



        Route::get('/status-new/{id}', [OrderController::class, 'StatusNew'])->name('status-new');
        Route::get('/status-shipped/{id}', [OrderController::class, 'StatusShipped'])->name('status-shipped');
        Route::get('/status-cancle/{id}', [OrderController::class, 'Statuscancle'])->name('status-cancle');
        Route::get('/status-finish/{id}', [OrderController::class, 'Statusfinish'])->name('status-finish');
    });

    Route::get('history', [ProfileController::class, 'history'])->name('history');
    Route::post('history/filter-user', [ProfileController::class, 'filterUser'])->name('orders.filter.user');
});

Route::get('/product/{id}', [ProductController::class, 'showProduct'])->name('show-product');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/', [HomeController::class, 'flters'])->name('home-flters');
