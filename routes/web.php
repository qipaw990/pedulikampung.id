<?php

use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CrowdFundingController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\SendMessagesController;
use App\Http\Controllers\TemplatesPesan;
use App\Http\Controllers\TemplatesPesanController;
use App\Models\Banner;
use App\Models\CrowdFunding;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

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
    $title = "Landing Page";
    $banners = Banner::all();
    $posts = Post::all();
    $wakaf = CrowdFunding::where(["type" => "Waqaf", "status" => "aktif"])->get();
    $nonwakaf = CrowdFunding::where(["type" => "Non Waqaf", "status" => "aktif"])->get();

    return view('welcome', compact('banners', 'posts', 'wakaf', 'title', 'nonwakaf'));
});
Route::get('/blog', function () {
    $title = "Blog Page";
    $post = Post::OrderBy("created_at", 'desc')->get();
    return view('blog', compact('title', 'post'));
});
Route::get('/blog/{id}', function ($id) {
   
    $data = Post::where('id', $id)->first();
    $title = $data->judul_post;
    return view('singleblog', compact('title', 'data'));
});

 Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/banner', BannerController::class)->middleware('auth');
Route::resource('/post', PostController::class)->middleware('auth');
Route::resource('/crowd_funding', CrowdFundingController::class)->middleware('auth');
Route::resource('/adminOrder', AdminOrderController::class)->middleware('auth');
Route::resource('/adminOrder', AdminOrderController::class)->middleware('auth');
Route::resource('/templates_pesan', TemplatesPesanController::class)->middleware('auth');
Route::get('/confirm_user', [AdminOrderController::class, 'confirm_user'])->middleware('auth');
Route::get('/success', [AdminOrderController::class, 'success'])->middleware('auth');
Route::post('/sendMessages', [SendMessagesController::class, 'send'])->name('whatsapp.index')->middleware('auth');
Route::post('/sendSuccess', [SendMessagesController::class, 'sendAndSuccess'])->name('whatsapp.success')->middleware('auth');
// user
Route::get('productDetail/{id}', [ProductDetailController::class, 'index'])->name('productDetail');
Route::get('order/{id}', [OrderController::class, 'index'])->name('order.index');
Route::post('order/{id}', [OrderController::class, 'store'])->name('order.store');
Route::get('payment/{id}', [OrderController::class, 'payment'])->name('order.payment');
Route::post('payment/{id}', [OrderController::class, 'userConfirm'])->name('order.userConfirm');
// routes/web.php
Route::delete('admin/orders/{order}', [AdminOrderController::class,'delete'])->name('admin.orders.delete');

