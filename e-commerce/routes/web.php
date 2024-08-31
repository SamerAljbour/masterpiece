<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DiscountCouponController;
use App\Models\DiscountCoupon;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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
Route::get('/home', function () {
    return view('index');
})->name('home');
Route::get('/cart', function () {
    return view('shoping-cart');
});
Route::get('/productpage', function () {
    return view('product');
});
Route::get('/productdetail', function () {
    return view('product-detail');
});
Route::get('/contactus', function () {
    return view('contact');
});
Route::get('/aboutus', function () {
    return view('about');
});
Route::get('/blog', function () {
    return view('blog');
});
Route::get('/blogdetail', function () {
    return view('blog-detail');
});
Route::get('/home-02', function () {
    return view('home-02');
});
Route::get('/home-03', function () {
    return view('home-03');
});
// <================================= End of view for the pages home ============================================>

// <================================= view for the pages sellerDashboard ============================================>
Route::get('/sellerDashboard', function () {
    return view('sellerDashboard/index');
})->name('sellerDashboard');
Route::get('/test', function () {
    return view('sellerDashboard/test');
})->name('test');
Route::get('sidebarstyle2', function () {
    return view('sellerDashboard/sidebar-style-2');
})->name('sidebarTwo');
Route::get('starter-template', function () {
    return view('sellerDashboard/starter-template');
});
Route::get('icon-menu', function () {
    return view('sellerDashboard/icon-menu');
})->name('iconMenu');
Route::get('widgets', function () {
    return view('sellerDashboard/widgets');
})->name('widgets');
Route::get('tables', function () {
    return view('sellerDashboard/tables/tables');
})->name('tables');
Route::get('datatables', function () {
    return view('sellerDashboard/tables/datatables');
})->name('dataTables');
Route::get('googlemaps', function () {
    return view('sellerDashboard/maps/googlemaps');
})->name('googlemaps');
Route::get('jsvectormap', function () {
    return view('sellerDashboard/maps/jsvectormap');
})->name('jsvectormap');
Route::get('sparkline', function () {
    return view('sellerDashboard/charts/sparkline');
})->name('sparkline');
Route::get('charts', function () {
    return view('sellerDashboard/charts/charts');
})->name('charts');
Route::get('avatars', function () {
    return view('sellerDashboard/components/avatars');
})->name('avatars');
Route::get('buttons', function () {
    return view('sellerDashboard/components/buttons');
})->name('buttons');
Route::get('font-awesome-icons', function () {
    return view('sellerDashboard/components/font-awesome-icons');
})->name('fontAwesomeIcons');
Route::get('gridsystem', function () {
    return view('sellerDashboard/components/gridsystem');
})->name('gridsystem');
Route::get('notifications', function () {
    return view('sellerDashboard/components/notifications');
})->name('notifications');
Route::get('panels', function () {
    return view('sellerDashboard/components/panels');
})->name('panels');
Route::get('simple-line-icons', function () {
    return view('sellerDashboard/components/simple-line-icons');
})->name('simpleLineIcons');
Route::get('sweetalert', function () {
    return view('sellerDashboard/components/sweetalert');
})->name('sweetalert');
Route::get('typography', function () {
    return view('sellerDashboard/components/typography');
})->name('typography');

Route::get('forms', function () {
    return view('sellerDashboard/forms/forms');
})->name('forms');
Route::get('test', function () {
    return view('sellerDashboard/test');
})->name('test');
// <=================================  End view for the pages sellerDashboard ============================================>

// <================================= view for the pages admin ============================================>
Route::get('/adminDashboard', function () {
    return view('adminDashboard/index');
})->name('adminDashboard');
Route::get('/test', function () {
    return view('adminDashboard/test');
})->name('test');
Route::get('sidebarstyle2', function () {
    return view('adminDashboard/sidebar-style-2');
})->name('sidebarTwo');
Route::get('starter-template', function () {
    return view('adminDashboard/starter-template');
});
Route::get('icon-menu', function () {
    return view('adminDashboard/icon-menu');
})->name('iconMenu');
Route::get('widgets', function () {
    return view('adminDashboard/widgets');
})->name('widgets');
Route::get('tables', function () {
    return view('adminDashboard/tables/tables');
})->name('tables');
Route::get('datatables', function () {
    return view('adminDashboard/tables/datatables');
})->name('dataTables');
Route::get('googlemaps', function () {
    return view('adminDashboard/maps/googlemaps');
})->name('googlemaps');
Route::get('jsvectormap', function () {
    return view('adminDashboard/maps/jsvectormap');
})->name('jsvectormap');
Route::get('sparkline', function () {
    return view('adminDashboard/charts/sparkline');
})->name('sparkline');
Route::get('charts', function () {
    return view('adminDashboard/charts/charts');
})->name('charts');
Route::get('avatars', function () {
    return view('adminDashboard/components/avatars');
})->name('avatars');
Route::get('buttons', function () {
    return view('adminDashboard/components/buttons');
})->name('buttons');
Route::get('font-awesome-icons', function () {
    return view('adminDashboard/components/font-awesome-icons');
})->name('fontAwesomeIcons');
Route::get('gridsystem', function () {
    return view('adminDashboard/components/gridsystem');
})->name('gridsystem');
Route::get('notifications', function () {
    return view('adminDashboard/components/notifications');
})->name('notifications');
Route::get('panels', function () {
    return view('adminDashboard/components/panels');
})->name('panels');
Route::get('simple-line-icons', function () {
    return view('adminDashboard/components/simple-line-icons');
})->name('simpleLineIcons');
Route::get('sweetalert', function () {
    return view('adminDashboard/components/sweetalert');
})->name('sweetalert');
Route::get('typography', function () {
    return view('adminDashboard/components/typography');
})->name('typography');

Route::get('forms', function () {
    return view('adminDashboard/forms/forms');
})->name('forms');
Route::get('test', function () {
    return view('adminDashboard/test');
})->name('test');
// <=================================  End view for the pages admin ============================================>
// Route::get('loginRegister', function () {
    //     return view('regAndLogin/loginRegister');
    // })->name('loginRegister');

    // <=================================  register for user ============================================>
    Route::get('/loginRegister', [UserController::class, 'viewReg'])->name('loginRegister');
    Route::post('/loginRegister', [UserController::class, 'register'])->name('storNeweUser');
    Route::post('/loginRegister/login', [UserController::class, 'login'])->name('login');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    // <================================= End of register for user ============================================>


    // <================================= admin  ============================================>



    // <================================= user crud  ============================================>
    Route::get('/allUsers', [AdminController::class, 'allUsers'])->name('allUsers');
    Route::get('/createUser', [AdminController::class, 'createUser'])->name('createUser');
    Route::post('/storeUser', [AdminController::class, 'storeNewUser'])->name('storeUser');
    Route::get('/updateUser/{id}', [AdminController::class, 'editUser'])->name('updateUser');
    Route::put('/updateUser/{id}', [AdminController::class, 'updateUser'])->name('updateUserData');
    Route::post('/deleteUser/{id}', [AdminController::class, 'deleteUser'])->name('deleteUser');
    // <================================= End of user crud  ============================================>


    // <================================= discount crud  ============================================>
    Route::get('/alldiscounts', [DiscountCouponController::class, 'index'])->name('alldiscounts');
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
    Route::post('deleteProduct/{id}', [ProductController::class, 'destroy'])->name('deleteProduct');


    // <================================= End of Products crud  ============================================>

    // <================================= End of admin ============================================>
