<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\DiscountCouponController;
use App\Models\DiscountCoupon;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\layoutController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductListController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\VariantOptionController;
use Illuminate\Notifications\Notification;

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

// Seller and Admin Shared Middleware
Route::middleware(['role:admin'])->group(function () {
    Route::get('/adminDashboard', [AdminController::class, 'adminHome'])->name('adminDashboard');
    Route::get('/allStores', [AdminController::class, 'showAllStores'])->name('allStores');
    Route::get('/viewStore/{id}', [AdminController::class, 'viewStore'])->name('viewStore');
    Route::put('/updateStore/{id}', [AdminController::class, 'updateStoreInfo'])->name('updateStoreAByAdmin');
    // <================================= user crud  ============================================>
    Route::get('/allUsers', [AdminController::class, 'allUsers'])->name('allUsers');
    Route::get('/createUser', [AdminController::class, 'createUser'])->name('createUser');
    Route::post('/storeUser', [AdminController::class, 'storeNewUser'])->name('storeUser');
    Route::get('/updateUser/{id}', [AdminController::class, 'editUser'])->name('updateUser');
    Route::put('/updateUser/{id}', [AdminController::class, 'updateUser'])->name('updateUserData');
    Route::post('/deleteUser/{id}', [AdminController::class, 'deleteUser'])->name('deleteUser');
    Route::get('/pendingUsers', [AdminController::class, 'showPendingUsers'])->name('pendingUsers');
    Route::put('/approveSeller/{id}', [AdminController::class, 'approveSeller'])->name('approveSeller');
    Route::put('/rejectSeller/{id}', [AdminController::class, 'rejectSeller'])->name('rejectSeller');
    // <================================= End of user crud  ============================================>

    // <================================= Category crud  ============================================>

    Route::get('allCategories', [CategoryController::class, 'index'])->name('allCategories');
    Route::get('categories', [CategoryController::class, 'create'])->name('createCategory');
    Route::post('categories', [CategoryController::class, 'store'])->name('storeCategories');
    Route::get('editCategories/{id}', [CategoryController::class, 'edit'])->name('editCategories');
    Route::put('updateCategories/{id}', [CategoryController::class, 'update'])->name('updateCategories');
    Route::post('DeleteCategories/{id}', [CategoryController::class, 'destroy'])->name('deleteCategories');

    // <================================= End of Category crud  ============================================>

    Route::get('allreviews', [ReviewController::class, 'index'])->name('allreviews');
    Route::get('reviews', [ReviewController::class, 'allReviewsForAdmin'])->name('reviewsForAdmin');
});

// Admin Middleware
Route::middleware(['role:admin_and_seller'])->group(function () {
    Route::get('/showAdsRequest', [AdsController::class, 'allAdsRequest'])->name('allAdsRequest');
    Route::post('/storeAdRequest', [AdsController::class, 'storeAdRequest'])->name('storeAdRequest');
    Route::get('/acceptAdRequest/{id}', [AdsController::class, 'acceptAdRequest'])->name('acceptAdRequest');
    Route::get('/rejectAdRequest/{id}', [AdsController::class, 'rejectAdRequest'])->name('rejectAdRequest');
    Route::delete('/deleteAdRequest/{id}', [AdsController::class, 'deleteAdRequest'])->name('deleteAdRequest');

    Route::put('/updateProfile', [UserController::class, 'updateProfile'])->name('updateProfile');
    Route::post('/notifications/{id}/mark-as-read', [SellerController::class, 'markAsRead'])->name('notifications.markAsRead');

    // <================================= discount crud  ============================================>
    Route::get('/alldiscounts', [DiscountCouponController::class, 'index'])->name('alldiscounts');
    Route::get('/allsellerdiscounts/{id}', [DiscountCouponController::class, 'showsSellerDiscount'])->name('allsellerdiscounts');
    Route::get('/createDiscount', [DiscountCouponController::class, 'create'])->name('createDiscount');
    Route::post('/storeDiscount', [DiscountCouponController::class, 'store'])->name('storeDiscount');
    Route::get('/editDiscount/{id}', [DiscountCouponController::class, 'edit'])->name('editDiscount');
    Route::put('/updateDiscount/{id}', [DiscountCouponController::class, 'update'])->name('updateDiscount');
    Route::post('/deleteDiscount/{id}', [DiscountCouponController::class, 'destroy'])->name('deleteDiscount');
    // <================================= End of discount crud  ============================================>


    // <=================================  Products crud  ============================================>

    Route::get('allProducts', [ProductController::class, 'index'])->name('allProducts');
    Route::get('createProduct', [ProductController::class, 'create'])->name('createProduct');
    Route::post('storeProduct', [ProductController::class, 'store'])->name('storeProduct');
    Route::get('editProduct/{id}', [ProductController::class, 'edit'])->name('editProduct');
    Route::put('updateProduct/{id}', [ProductController::class, 'update'])->name('updateProduct');
    Route::post('deleteProduct/{id}', [ProductController::class, 'destroy'])->name('deleteProduct');
    Route::delete('deleteProductImage/{productId}/{imageId}', [ProductController::class, 'deleteProductImage'])->name('deleteProductImage');


    // <================================= End of Products crud  ============================================>
    Route::put('updateStock/{id}', [SellerController::class, 'updateStockForProductVariant'])->name('updateStock');
    Route::post('searchAboutProduct', [SellerController::class, 'index'])->name('searchAboutProduct');



    Route::get('restoreProducts', [ProductController::class, 'showDeletedProducts'])->name('restoreProducts');
    Route::put('restoreProduct', [ProductController::class, 'restoreProduct'])->name('restoreProduct');
    Route::get('/profile', [SellerController::class, 'showProfile'])->name('dashProfile');
});

// Seller Middleware
Route::middleware(['role:seller'])->group(function () {
    Route::get('profileStore', [SellerController::class, 'index'])->name('profileStore');

    Route::get('/sellerDashboard', [SellerController::class, 'homeSeller'])->name('sellerDashboard');
    Route::put('/updateStore', [SellerController::class, 'updateStoreInfo'])->name('updateStoreInfo');
});

// Customer Middleware
// Route::middleware(['role:customer'])->group(function () {
// });
Route::middleware(['role:all_roles'])->group(function () {
    Route::get('cart/{id}', [CartController::class, 'showCartDAta'])->name('cart');
    Route::put('updatecart/{productId}', [CartController::class, 'updateCart'])->name('updatecart');
    Route::delete('deleteFromCart/{productId}', [CartController::class, 'deleteFromCart'])->name('deleteFromCart');
    Route::delete('clearCart', [CartController::class, 'clearCart'])->name('clearCart');
    Route::post('addDiscount', [CartController::class, 'addDiscount'])->name('addDiscount');


    Route::get('userProfile', [HomeController::class, 'showUserProfile'])->name('userProfile');
    Route::put('updateUserProfile', [UserController::class, 'updateUserProfile'])->name('updateUserProfile');
    Route::get('/viewPayment', [PaymentController::class, 'index'])->name('viewPayment');
    Route::post('/pay', [PaymentController::class, 'store'])->name('pay');
    Route::get('/pay/success', [PaymentController::class, 'showSuccessPayment'])->name('successPayment');
});


// <================================= no restriction on these route ============================================>
Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('productList', [ProductListController::class, 'index'])->name('productList');
Route::get('productdetail/{id}', [ProductListController::class, 'productDetails'])->name('productdetail');
Route::post('addtocart', [CartController::class, 'storeToCart'])->name('storeToCart');
Route::post('addtocartQua', [CartController::class, 'storeToCartQua'])->name('storeToCartQua');
Route::post('submitreview', [ReviewController::class, 'store'])->name('submitreview');
Route::post('deletereview/{id}', [ReviewController::class, 'destroy'])->name('deletereview');

// <=================================  register  ============================================>
Route::get('/loginRegister', [UserController::class, 'viewReg'])->name('loginRegister');
Route::post('/loginRegister', [UserController::class, 'register'])->name('storeNeweUser');
Route::post('/loginRegister/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/loginRegisterSeller', [UserController::class, 'viewSellerReg'])->name('loginRegisterSeller');
Route::get('/storeInfo', [UserController::class, 'storeInfo'])->name('storeInfo');

// <================================= End of register  ============================================>
Route::get('/notFound', function () {
    return view('frontend/notFound');
});

Route::get('/payment', function () {
    return view('frontend/payment');
})->name('payment');

Route::get('/contactus', function () {
    return view('frontend.contactUs');
})->name('contactus');
Route::get('/productListTwo', function () {
    return view('frontend.productListTwo');
})->name('productListTwo');
Route::post('/contactus', [ContactUsController::class, 'store'])->name('contactus.store');
