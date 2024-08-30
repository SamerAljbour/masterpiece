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

// <================================= view for the pages home ============================================>
Route::get('/home', function () {
    return view('index');
});
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

// <================================= view for the pages admin ============================================>
Route::get('/adminDashboard', function () {
    return view('adminDashboard/index');
});
Route::get('/adminDashboard/sidebarstyle2', function () {
    return view('adminDashboard/sidebar-style-2');
})->name('sidebarTwo');
Route::get('/adminDashboard/starter-template', function () {
    return view('adminDashboard/starter-template');
});
Route::get('/adminDashboard/icon-menu', function () {
    return view('adminDashboard/icon-menu');
})->name('iconMenu');
Route::get('/adminDashboard/widgets', function () {
    return view('adminDashboard/widgets');
})->name('widgets');
Route::get('/adminDashboard/tables/tables', function () {
    return view('adminDashboard/tables/tables');
})->name('tables');
Route::get('/adminDashboard/tables/datatables', function () {
    return view('adminDashboard/tables/datatables');
})->name('dataTables');
Route::get('/adminDashboard/maps/googlemaps', function () {
    return view('adminDashboard/maps/googlemaps');
})->name('googlemaps');
Route::get('/adminDashboard/maps/jsvectormap', function () {
    return view('adminDashboard/maps/jsvectormap');
})->name('jsvectormap');
Route::get('/adminDashboard/charts/sparkline', function () {
    return view('adminDashboard/charts/sparkline');
})->name('sparkline');
Route::get('/adminDashboard/charts/charts', function () {
    return view('adminDashboard/charts/charts');
})->name('charts');
Route::get('/adminDashboard/components/avatars', function () {
    return view('adminDashboard/components/avatars');
})->name('avatars');
Route::get('/adminDashboard/components/buttons', function () {
    return view('adminDashboard/components/buttons');
})->name('buttons');
Route::get('/adminDashboard/components/font-awesome-icons', function () {
    return view('adminDashboard/components/font-awesome-icons');
})->name('fontAwesomeIcons');
Route::get('/adminDashboard/components/gridsystem', function () {
    return view('adminDashboard/components/gridsystem');
})->name('gridsystem');
Route::get('/adminDashboard/components/notifications', function () {
    return view('adminDashboard/components/notifications');
})->name('notifications');
Route::get('/adminDashboard/components/panels', function () {
    return view('adminDashboard/components/panels');
})->name('panels');
Route::get('/adminDashboard/components/simple-line-icons', function () {
    return view('adminDashboard/components/simple-line-icons');
})->name('simpleLineIcons');
Route::get('/adminDashboard/components/sweetalert', function () {
    return view('adminDashboard/components/sweetalert');
})->name('sweetalert');
Route::get('/adminDashboard/components/typography', function () {
    return view('adminDashboard/components/typography');
})->name('typography');
Route::get('/adminDashboard/components/typography', function () {
    return view('adminDashboard/components/typography');
})->name('typography');
Route::get('/adminDashboard/forms/forms', function () {
    return view('adminDashboard/forms/forms');
})->name('forms');
// <=================================  End view for the pages admin ============================================>
