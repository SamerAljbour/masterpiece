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

// <================================= view for the pages ============================================>
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
// <================================= End of view for the pages ============================================>
