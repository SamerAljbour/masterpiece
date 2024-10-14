<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DiscountCouponController;
use App\Models\DiscountCoupon;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\layoutController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductListController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\VariantOptionController;

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

// <================================= view for the pages home ============================================>

// Route::get('/', function () {
//     return view('frontend/home');
// })->name('home');
// Route::get('/home', function () {
//     return view('frontend/home');
// })->name('home');
// Route::get('/cart', function () {
//     return view('frontend/cart');
// });
// Route::get('/productList', function () {
//     return view('frontend/productList');
// });
Route::get('/checkout', function () {
    return view('frontend.checkout'); // Use dot notation
});
Route::get('/productListTwo', function () {
    return view('frontend/productListTwo');
});
Route::get('/productdetail', function () {
    return view('frontend/productdetail');
});
Route::get('/contactus', function () {
    return view('frontend/contactUs');
});
Route::get('/notFound', function () {
    return view('frontend/notFound');
});
// Route::get('/userProfile', function () {
//     return view('frontend/userProfile');
// });
Route::get('/payment', function () {
    return view('frontend/payment');
})->name('payment');

// <================================= End of view for the pages home ============================================>


// <================================= view for the pages admin ============================================>

Route::get('/test', function () {
    return view('dashboard/test');
})->name('test');
Route::get('sidebarstyle2', function () {
    return view('dashboard/sidebar-style-2');
})->name('sidebarTwo');
Route::get('starter-template', function () {
    return view('dashboard/starter-template');
});
Route::get('icon-menu', function () {
    return view('dashboard/icon-menu');
})->name('iconMenu');
Route::get('widgets', function () {
    return view('dashboard/widgets');
})->name('widgets');
Route::get('tables', function () {
    return view('dashboard/tables/tables');
})->name('tables');
Route::get('datatables', function () {
    return view('dashboard/tables/datatables');
})->name('dataTables');
Route::get('googlemaps', function () {
    return view('dashboard/maps/googlemaps');
})->name('googlemaps');
Route::get('jsvectormap', function () {
    return view('dashboard/maps/jsvectormap');
})->name('jsvectormap');
Route::get('sparkline', function () {
    return view('dashboard/charts/sparkline');
})->name('sparkline');
Route::get('charts', function () {
    return view('dashboard/charts/charts');
})->name('charts');
Route::get('avatars', function () {
    return view('dashboard/components/avatars');
})->name('avatars');
Route::get('buttons', function () {
    return view('dashboard/components/buttons');
})->name('buttons');
Route::get('font-awesome-icons', function () {
    return view('dashboard/components/font-awesome-icons');
})->name('fontAwesomeIcons');
Route::get('gridsystem', function () {
    return view('dashboard/components/gridsystem');
})->name('gridsystem');
Route::get('notifications', function () {
    return view('dashboard/components/notifications');
})->name('notifications');
Route::get('panels', function () {
    return view('dashboard/components/panels');
})->name('panels');
Route::get('simple-line-icons', function () {
    return view('dashboard/components/simple-line-icons');
})->name('simpleLineIcons');
Route::get('sweetalert', function () {
    return view('dashboard/components/sweetalert');
})->name('sweetalert');
Route::get('typography', function () {
    return view('dashboard/components/typography');
})->name('typography');

Route::get('forms', function () {
    return view('dashboard/forms/forms');
})->name('forms');
Route::get('test', function () {
    return view('dashboard/test');
})->name('test');
// <=================================  End view for the pages admin ============================================>
// Route::get('loginRegister', function () {
//     return view('regAndLogin/loginRegister');
// })->name('loginRegister');

// <=================================  register  ============================================>
Route::get('/loginRegister', [UserController::class, 'viewReg'])->name('loginRegister');
Route::post('/loginRegister', [UserController::class, 'register'])->name('storeNeweUser');
Route::post('/loginRegister/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/loginRegisterSeller', [UserController::class, 'viewSellerReg'])->name('loginRegisterSeller');
// Route::post('/loginRegisterSeller', [UserController::class, 'register'])->name('storeNeweUser');

// <================================= End of register  ============================================>
Route::get('/viewPayment', [PaymentController::class, 'index'])->name('viewPayment');
Route::post('/pay', [PaymentController::class, 'store'])->name('pay');







// <================================= dashboard  ============================================>
Route::get('/layout', [layoutController::class, 'index'])->name('layout');


// <================================= dashboard Home Seller  ============================================>
Route::get('/sellerDashboard', [SellerController::class, 'homeSeller'])->name('sellerDashboard');
Route::put('/updateStore', [SellerController::class, 'updateStoreInfo'])->name('updateStoreInfo');
Route::get('/profile', [SellerController::class, 'showProfile'])->name('dashProfile');
Route::put('/updateProfile', [UserController::class, 'updateProfile'])->name('updateProfile');





// <================================= End of dashboard Home Seller  ============================================>
Route::get('/adminDashboard', [AdminController::class, 'adminHome'])->name('adminDashboard');
Route::get('/allStores', [AdminController::class, 'showAllStores'])->name('allStores');
Route::get('/viewStore/{id}', [AdminController::class, 'viewStore'])->name('viewStore');



// <================================= user crud  ============================================>
Route::get('/allUsers', [AdminController::class, 'allUsers'])->name('allUsers');
Route::get('/createUser', [AdminController::class, 'createUser'])->name('createUser');
Route::post('/storeUser', [AdminController::class, 'storeNewUser'])->name('storeUser');
Route::get('/updateUser/{id}', [AdminController::class, 'showPendingUsers'])->name('updateUser');
Route::put('/updateUser/{id}', [AdminController::class, 'updateUser'])->name('updateUserData');
Route::post('/deleteUser/{id}', [AdminController::class, 'deleteUser'])->name('deleteUser');
Route::get('/pendingUsers', [AdminController::class, 'showPendingUsers'])->name('pendingUsers');
Route::put('/approveSeller/{id}', [AdminController::class, 'approveSeller'])->name('approveSeller');
Route::put('/rejectSeller/{id}', [AdminController::class, 'rejectSeller'])->name('rejectSeller');
// <================================= End of user crud  ============================================>


// <================================= discount crud  ============================================>
Route::get('/alldiscounts', [DiscountCouponController::class, 'index'])->name('alldiscounts');
Route::get('/allsellerdiscounts/{id}', [DiscountCouponController::class, 'showsSellerDiscount'])->name('allsellerdiscounts');
Route::get('/createDiscount', [DiscountCouponController::class, 'create'])->name('createDiscount');
Route::post('/storeDiscount', [DiscountCouponController::class, 'store'])->name('storeDiscount');
Route::get('/editDiscount/{id}', [DiscountCouponController::class, 'edit'])->name('editDiscount');
Route::put('/updateDiscount/{id}', [DiscountCouponController::class, 'update'])->name('updateDiscount');
Route::post('/deleteDiscount/{id}', [DiscountCouponController::class, 'destroy'])->name('deleteDiscount');
// <================================= End of discount crud  ============================================>





// <================================= Category crud  ============================================>

Route::get('allCategories', [CategoryController::class, 'index'])->name('allCategories');
Route::get('categories', [CategoryController::class, 'create'])->name('createCategory');
Route::post('categories', [CategoryController::class, 'store'])->name('storeCategories');
Route::get('editCategories/{id}', [CategoryController::class, 'edit'])->name('editCategories');
Route::put('updateCategories/{id}', [CategoryController::class, 'update'])->name('updateCategories');
Route::post('DeleteCategories/{id}', [CategoryController::class, 'destroy'])->name('deleteCategories');

// <================================= End of Category crud  ============================================>





// <=================================  Products crud  ============================================>

Route::get('allProducts', [ProductController::class, 'index'])->name('allProducts');
Route::get('createProduct', [ProductController::class, 'create'])->name('createProduct');
Route::post('storeProduct', [ProductController::class, 'store'])->name('storeProduct');
Route::get('editProduct/{id}', [ProductController::class, 'edit'])->name('editProduct');
Route::put('updateProduct/{id}', [ProductController::class, 'update'])->name('updateProduct');
Route::post('deleteProduct/{id}', [ProductController::class, 'destroy'])->name('deleteProduct');
Route::delete('deleteProductImage/{productId}/{imageId}', [ProductController::class, 'deleteProductImage'])->name('deleteProductImage');


// <================================= End of Products crud  ============================================>

// <=================================  seller store crud  ============================================>
Route::get('profileStore', [SellerController::class, 'index'])->name('profileStore');
Route::post('searchAboutProduct', [SellerController::class, 'index'])->name('searchAboutProduct');






// <=================================  End of seller store crud  ============================================>


// <=================================  reviews crud  ============================================>
Route::get('allreviews', [ReviewController::class, 'index'])->name('allreviews');


// <================================= End of reviews crud  ============================================>

// <================================= End of dashboard ============================================>



// <================================= User ============================================>


// <================================= Home  ============================================>
Route::get('home', [HomeController::class, 'index'])->name('home');
// Route::get('productdetail/{id}', [HomeController::class, 'productDetails'])->name('productdetail');
Route::get('userProfile', [HomeController::class, 'showUserProfile'])->name('userProfile');
Route::put('updateUserProfile', [UserController::class, 'updateUserProfile'])->name('updateUserProfile');








// <================================= product list page  ============================================>
Route::get('productList', [ProductListController::class, 'index'])->name('productList');
Route::get('productdetail/{id}', [ProductListController::class, 'productDetails'])->name('productdetail');
Route::post('addtocart', [CartController::class, 'storeToCart'])->name('storeToCart');
Route::post('addtocartQua', [CartController::class, 'storeToCartQua'])->name('storeToCartQua');
Route::post('submitreview', [ReviewController::class, 'store'])->name('submitreview');
Route::post('deletereview/{id}', [ReviewController::class, 'destroy'])->name('deletereview');





// <================================= End of product list page  ============================================>





// <================================= cart page  ============================================>
Route::get('cart/{id}', [CartController::class, 'showCartDAta'])->name('cart');
Route::put('updatecart/{productId}', [CartController::class, 'updateCart'])->name('updatecart');
Route::put('deleteFromCart/{productId}', [CartController::class, 'deleteFromCart'])->name('deleteFromCart');
Route::delete('clearCart', [CartController::class, 'clearCart'])->name('clearCart');
Route::post('addDiscount', [CartController::class, 'addDiscount'])->name('addDiscount');





    // <================================= End of cart page  ============================================>
// <================================= End of Home  ============================================>
