<?php

use App\Http\Controllers\LegalTermsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CustomerRegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\CustomerCartController;
use App\Http\Controllers\CustomerOrderController;
use App\Http\Controllers\ResellerStockController;
use App\Http\Controllers\ResellerRegisterController;
use App\Http\Controllers\OwnerStockController;
use App\Http\Controllers\ResellerForecastingController;
use App\Http\Controllers\OwnerForecastingController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CustomerProfileController;
use App\Http\Controllers\ResellerDataVisibilityController;



#INDEX
Route::get('/', [MenuController::class, 'index'])->name('index');

#CUSTOMER REGISTER
Route::get('/customer_register', function () { return view('customer_register'); })->name('customer.register');
Route::post('/customer_register', [CustomerRegisterController::class, 'register'])->name('customer.register.post');
Route::get('/customer_register', [CustomerRegisterController::class, 'showRegisterPage'])->name('customer.register');
Route::get('/customer_register_verification', [CustomerRegisterController::class, 'showVerifyOtpForm'])->name('customer.register.verify');
Route::post('/customer_register_verification', [CustomerRegisterController::class, 'verifyOtp'])->name('customer.register.verify.post');
Route::post('/customer_register_verification/resend_otp', [CustomerRegisterController::class, 'resendOtp'])->name('customer.register.resendOtp');
Route::get('/customer_register_success', function () { return view('customer_register_success'); })->name('customer.register.success');
Route::get('/fetch_stores', 'App\Http\Controllers\CustomerRegisterController@fetchStores')->name('fetch_stores');

#LOGIN
Route::get('/login', function () { return view('login'); })->name('login');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/login_verification', [LoginController::class, 'showOtpForm'])->name('login.verification');
Route::post('/login_verification', [LoginController::class, 'verifyOtp'])->name('login.verification.post');
Route::get('/login_verification/resend_otp', [LoginController::class, 'resendOtp'])->name('login.verification.resendOtp');

#FORGOT PASSWORD
Route::get('/forgot_password', [PasswordResetController::class, 'showForgotPasswordForm'])->name('forgot.password');
Route::post('/forgot_password_verification/send_otp', [PasswordResetController::class, 'sendOtp'])->name('forgot.passoword.sent.otp');
Route::get('/forgot_password_verification', [PasswordResetController::class, 'showOtpVerificationForm'])->name('forgot.password.verify.otp');
Route::post('/forgot_password_verification/resend_otp', [PasswordResetController::class, 'resendOtp'])->name('forgot.password.resend.otp');
Route::post('/forgot_password_verification', [PasswordResetController::class, 'verifyOtp'])->name('forgot.password.verify.otp.post');
Route::get('/reset_password/{email}', [PasswordResetController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset_password/update', [PasswordResetController::class, 'resetPassword'])->name('password.update');
Route::get('/password_success', function () { return view('password_success'); })->name('password.success');


#CUSTOMER HOME
Route::get('/customer_home', [MenuController::class, 'customerHome'])->name('customer.home');
Route::post('/customer_home', [CustomerCartController::class, 'goToHome'])->name('back.customer.home');
Route::post('/customer_home/update_store', [MenuController::class, 'updateStore'])->name('update.store');
Route::get('/customer_home/get_stock', [CustomerCartController::class, 'getStock'])->name('stock.get');;



#CUSTOMER CART AND CHECKOUT
Route::post('/customer_cart_checkout', [CustomerCartController::class, 'addToCart'])->name('cart.add');
Route::get('/customer_cart_checkout', [CustomerCartController::class, 'showCart'])->name('cart.show');
Route::delete('/api/cart', [CustomerCartController::class, 'clearCart']);
Route::delete('/api/cart/{itemId}', [CustomerCartController::class, 'removeItem']);
Route::post('/customer_cart_checkout/place-order', [CustomerOrderController::class, 'completeCheckout'])->name('place.order');
// Route::get('/customer_cart_checkout/update-on-inventory-change/{menu_id}/{toast}', [CustomerCartController::class, 'updateCartOnInventoryChange'])
    // ->name('cart.update.onInventoryChange');

#CUSTOMER PROFILE
Route::get('/customer_profile', [CustomerProfileController::class, 'showUser'])->name('show.user');
Route::post('/customer_profile/update', [CustomerProfileController::class, 'updateUser'])->name('update.user');
Route::post('/update-password', [CustomerProfileController::class, 'updatePassword'])->name('update.password');


#RESELLER ACTIVE
Route::get('/reseller_active_orders', function () { return view('reseller_active_orders'); })->name('reseller.active.orders');
Route::get('/reseller_active_orders', [CustomerOrderController::class, 'showCustomerOrder'])->name('show.customer.order');
Route::get('/reseller_active_orders//get_order_summary', [CustomerOrderController::class, 'getCustomerOrderSummary'])->name('refund.submit');
Route::post('/reseller_active_orders/update_order_status', [CustomerOrderController::class, 'updateCustomerOrderStatus'])->name('update.customer.order.status');



#RESELLER ORDER HISTORY
Route::get('/reseller_order_history', function () { return view('reseller_order_history'); })->name('reseller.order.history');

#RESELLER INVOICE
Route::get('/reseller_invoice', function () { return view('reseller_invoice'); })->name('reseller.invoice');


#RESELLER INVENTORY
Route::get('/reseller_inventory', function () { return view('reseller_inventory'); })->name('reseller.inventory');
Route::get('/reseller_inventory', [ResellerStockController::class, 'showStock'])->name('reseller.show.stock');
Route::post('/reseller_inventory/dispose_stock', [ResellerStockController::class, 'disposeResellerStock'])->name('dispose.reseller.stock');

#RESELLER RESTOCK
Route::get('/reseller_restock_request', function () { return view('reseller_restock_request'); })->name('reseller.restock');
Route::post('reseller_restock_request/submit-order', [ResellerStockController::class, 'submitStockRequest'])->name('submit.stock.order');
Route::get('/reseller_restock_request', [ResellerStockController::class, 'showRestock'])->name('menu.restock');


#RESELLER DATA VISIBILITY
Route::get('/reseller_data_visibility', function () { return view('reseller_data_visibility'); })->name('reseller.data.visibility');
Route::get('/reseller-data-visibility', [ResellerDataVisibilityController::class, 'index'])->name('reseller.data-visibility');
Route::get('/reseller/all-categories', [ResellerDataVisibilityController::class, 'getAllCategories'])
    ->name('reseller.all-categories'); 


#RESELLER FORECASTING
Route::get('/reseller_forecasting', function () { return view('reseller_forecasting'); })->name('reseller.forecasting');
Route::get('reseller_forecasting', [ResellerForecastingController::class, 'resellerForecasting'])->name('reseller.forecasting');


#RESELLER GENERATE REPORT
Route::get('/reseller_generate_report', function () { return view('reseller_generate_report'); })->name('reseller.generate.report');

#RESELLER REGISTER

Route::get('/reseller_register', function () { return view('reseller_register'); })->name('reseller.register');
Route::post('/reseller_register', [ResellerRegisterController::class, 'register'])->name('reseller.register.post');
Route::get('/reseller_register_verification', [ResellerRegisterController::class, 'showVerifyOtpForm'])->name('reseller.register.verify');
Route::post('/reseller_register_verification', [ResellerRegisterController::class, 'verifyOtp'])->name('reseller.register.verify.post');
Route::post('/reseller_register_verification/resend_otp', [ResellerRegisterController::class, 'resendOtp'])->name('reseller.register.resendOtp');
Route::get('/reseller_register_success', function () { return view('reseller_register_success'); })->name('reseller.register.success');



#OWNER HOME
Route::get('/owner_home', function () { return view('owner_home'); })->name('owner.home');

#OWNER MENU
Route::get('/owner_menu', function () { return view('owner_menu'); })->name('owner.menu');
Route::get('/owner_menu', [MenuController::class, 'ownerMenu'])->name('show.owner.menu');
Route::post('/owner_menu', [MenuController::class, 'addMenu'])->name('add.menu');
Route::delete('/menu/{id}', [MenuController::class, 'deleteMenu'])->name('delete.menu');
Route::put('/menu/update', [MenuController::class, 'update'])->name('menu.update');


#RESELLER INVOICE
Route::get('/owner_invoice', function () { return view('owner_invoice'); })->name('owner.invoice');
Route::get('/owner_invoice', [InvoiceController::class, 'invoiceDetails'])->name('show.invoice');
Route::get('/invoice/{invoiceId}', [InvoiceController::class, 'show'])->name('invoice.view');

// Route::get('/invoice/{invoiceId}', [InvoiceController::class, 'invoiceDetails'])->name('invoice.details');

#OWNER INVENTORY
Route::get('/owner_inventory', function () { return view('owner_inventory'); })->name('owner.alerts');
Route::get('/owner_inventory', [OwnerStockController::class, 'showStock'])->name('owner.show.stock');
Route::post('/owner_inventory/update_stock',  [OwnerStockController::class, 'updateOwnerStock'])->name('owner.update.stock');
Route::post('owner_inventory/add_stock', [OwnerStockController::class, 'submitOwnerStock'])->name('submit.owner.stock');
Route::post('/owner_inventory/dispose_stock', [OwnerStockController::class, 'disposeOwnerStock'])->name('dispose.owner.stock');
Route::delete('/owner_inventory/delete_stock/{id}', [OwnerStockController::class, 'deleteOwnerStock'])->name('owner.delete.stock');



#OWNER RESTOCK
Route::get('/owner_stock_request', function () { return view('owner_stock_request'); })->name('owner.stock.request');
Route::get('/owner_stock_request', [OwnerStockController::class, 'showResellerOrder'])->name('show.reseller.order');
Route::post('owner_stock_request/update_order_status', [OwnerStockController::class, 'updateResellerOrderStatus'])->name('update.reseller.order.status');
Route::get('owner_stock_request//get_order_summary', [OwnerStockController::class, 'getOrderSummary'])->name('get.order.summary');
Route::get('owner_stock_request//get_complete_summary', [OwnerStockController::class, 'getCompleteSummary'])->name('get.complete.summary');
Route::get('owner_stock_request//update_inventory', [OwnerStockController::class, 'updateInventory'])->name('update.inventory');
Route::get('owner_stock_request/send_stock', [OwnerStockController::class, 'getOrderSummaryAndInventory']) ->name('get.order.summary.and.inventory');
Route::post('owner_stock_request/send-stock-details', [OwnerStockController::class, 'sendStockDetails'])->name('send.stock.details');


#OWNER FORECASTING
Route::get('/owner_forecasting', function () { return view('owner_forecasting'); })->name('owner.forecasting');
Route::get('owner_forecasting', [OwnerForecastingController::class, 'ownerForecasting'])->name('owner.forecasting');

#OWNER RESELLER REGISTER
Route::get('/reseller_register', function () { return view('reseller_register'); })->name('owner.register.reseller');
Route::get('/owner_register_verification', function () { return view('owner_register_verification'); })->name('owner.register.verification');
Route::get('/owner_register_success', function () { return view('owner_register_success'); })->name('owner.register.success');

#HEADER
Route::get('/store', function () { return view('store'); })->name('store');
Route::get('/about_us', function () { return view('about'); })->name('about.us');
// Route::get('/customer_profile', function () { return view('customer_profile'); })->name('customer.profile');

#FOOTER
Route::get('/about_us', function () { return view('about_us'); })->name('about.us');
Route::get('/terms_conditions', function () { return view('terms_conditions'); })->name('terms.conditions');
Route::get('/privacy_policy', function () { return view('privacy_policy'); })->name('privacy.policy');
Route::get('/terms_conditions', [LegalTermsController::class, 'showTermsCondition'])->name('terms.condition');




#DRAFT

Route::get('/reseller_invoicing', function () { return view('mails.reseller_invoice'); })->name('about.us');



Route::get('/owner_reseller', function () { return view('/owner_reseller'); })->name('owner.reseller');


// Route::get('/invoice/{email}', [OwnerStockController::class, 'sendInvoice'])->name('generate.invoice.cool');
// Route::get('/invoice', function () { return view('invoice'); })->name('invoice');
// Route::get('/send-invoice/{email}', [InvoiceController::class, 'sendInvoice'])->name('generate.invoice');
// Route::get('/my_information', function () { return view('my_information'); })->name('my.information');
// Route::get('/_sidebar', function () { return view('_sidebar'); })->name('sidebar');
// Route::get('/generate-invoice', [InvoiceController::class, 'generateInvoice'])->name('generate.invoice');
// Route::get('/inventory-data', [OwnerStockController::class, 'getInventoryData'])->name('get.inventory.data');
// Route::get('/get-stock-details', [OwnerStockController::class, 'getStockDetails'])->name('get.stock.details');
// Route::post('/update-order', [ResellerStockController::class, 'updateResellerOrder'])->name('update.order');
// Route::get('/get-inventory-order-details', [OwnerStockController::class, 'getOwnerInventory'])->name('get.owner.inventory');



