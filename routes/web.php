<?php

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

// Route::get('/', function () {
//     return view('welcome');
//     return view('frontend.home');
// });

Auth::routes();

/*Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/
Route::get('/', [App\Http\Controllers\Web\WebhomeControllers::class, 'index'])->name('home');
Route::get('/destinations', [App\Http\Controllers\Web\WebhomeControllers::class, 'allDestination'])->name('destinations');
Route::get('/pages/{id}', [App\Http\Controllers\Web\WebhomeControllers::class, 'pages'])->name('pages');
Route::get('/contact', [App\Http\Controllers\Web\WebhomeControllers::class, 'contact'])->name('contact');
Route::get('/faq', [App\Http\Controllers\Web\WebhomeControllers::class, 'faq'])->name('faq');
Route::get('/single-destination/{id}', [App\Http\Controllers\Web\WebhomeControllers::class, 'sDestination'])->name('single-destination');

/* Admin Panel Routes */
Route::group(['as'=>'admin.','prefix' => 'admin','middleware'=>['auth','admin']], function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    /* Testimonial Routes */
    Route::get('/testimonial/all', [App\Http\Controllers\Admin\TestimonialsControllers::class, 'index'])->name('all-testimonial');
    Route::get('/testimonial/create', [App\Http\Controllers\Admin\TestimonialsControllers::class, 'create'])->name('create-testimonial');
    Route::post('/testimonial', [App\Http\Controllers\Admin\TestimonialsControllers::class, 'store'])->name('store-testimonial');
    Route::get('/testimonial/edit/{testimonial}', [App\Http\Controllers\Admin\TestimonialsControllers::class, 'edit'])->name('edit-testimonial');
    Route::post('/testimonial/update/{testimonial}', [App\Http\Controllers\Admin\TestimonialsControllers::class, 'update'])->name('update-testimonial');
    Route::post('/testimonial/delete', [App\Http\Controllers\Admin\TestimonialsControllers::class, 'destroy'])->name('delete-testimonial');

    /* Blog categories Routes */
    Route::get('/category/all', [App\Http\Controllers\Admin\BlogcategoriesControllers::class, 'index'])->name('all-category');
    Route::get('/category/create', [App\Http\Controllers\Admin\BlogcategoriesControllers::class, 'create'])->name('create-category');
    Route::post('/category/store', [App\Http\Controllers\Admin\BlogcategoriesControllers::class, 'store'])->name('store-category');
    Route::get('/category/edit/{category}', [App\Http\Controllers\Admin\BlogcategoriesControllers::class, 'edit'])->name('edit-category');
    Route::post('/category/update/{category}', [App\Http\Controllers\Admin\BlogcategoriesControllers::class, 'update'])->name('update-category');


    /* Destination Routes */
    Route::get('/destination/all', [App\Http\Controllers\Admin\DestinationControllers::class, 'index'])->name('all-destination');
    Route::get('/destination/create', [App\Http\Controllers\Admin\DestinationControllers::class, 'create'])->name('create-destination');
    Route::post('/destination/store', [App\Http\Controllers\Admin\DestinationControllers::class, 'store'])->name('store-destination');
    Route::get('/destination/edit/{destination}', [App\Http\Controllers\Admin\DestinationControllers::class, 'edit'])->name('edit-destination');
    Route::post('/destination/update/{destination}', [App\Http\Controllers\Admin\DestinationControllers::class, 'update'])->name('update-destination');

    /* Includes & excludes Routes */
    Route::get('/extra/create/{type}', [App\Http\Controllers\Admin\DestinationControllers::class, 'createExtra'])->name('create-extra');
    Route::post('/extra/store', [App\Http\Controllers\Admin\DestinationControllers::class, 'storeExtra'])->name('store-extra');
    Route::post('/extra/delete', [App\Http\Controllers\Admin\DestinationControllers::class, 'destroyExtra'])->name('delete-extra');


    /* Delete Gallery images */
    Route::get('/gallery-image/{id}/{imagename}', [App\Http\Controllers\Admin\DestinationControllers::class, 'gdestroyimage'])->name('gallery-image');

    /* Faq Routes */
    Route::get('/faq/all', [App\Http\Controllers\Admin\FaqController::class, 'index'])->name('all-faq');
    Route::get('/faq/create', [App\Http\Controllers\Admin\FaqController::class, 'create'])->name('create-faq');
    Route::post('/faq/store', [App\Http\Controllers\Admin\FaqController::class, 'store'])->name('store-faq');
    Route::get('/faq/edit/{faq}', [App\Http\Controllers\Admin\FaqController::class, 'edit'])->name('edit-faq');
    Route::post('/faq/update/{faq}', [App\Http\Controllers\Admin\FaqController::class, 'update'])->name('update-faq');
    Route::post('/faq/delete', [App\Http\Controllers\Admin\FaqController::class, 'destroy'])->name('delete-faq');

    /* banner Routes */
    Route::get('/banner/all', [App\Http\Controllers\Admin\BannerControllers::class, 'index'])->name('all-banner');
    Route::get('/banner/create', [App\Http\Controllers\Admin\BannerControllers::class, 'create'])->name('create-banner');
    Route::post('/banner/store', [App\Http\Controllers\Admin\BannerControllers::class, 'store'])->name('store-banner');
    Route::get('/banner/edit/{banner}', [App\Http\Controllers\Admin\BannerControllers::class, 'edit'])->name('edit-banner');
    Route::post('/banner/update/{banner}', [App\Http\Controllers\Admin\BannerControllers::class, 'update'])->name('update-banner');
    Route::post('/banner/delete', [App\Http\Controllers\Admin\BannerControllers::class, 'destroy'])->name('delete-banner');

    /* Pages Routes */
    Route::get('/pages/all', [App\Http\Controllers\Admin\PageControllers::class, 'index'])->name('all-pages');
    Route::get('/pages/create', [App\Http\Controllers\Admin\PageControllers::class, 'create'])->name('create-pages');
    Route::post('/pages/store', [App\Http\Controllers\Admin\PageControllers::class, 'store'])->name('store-pages');
    Route::get('/pages/edit/{pages}', [App\Http\Controllers\Admin\PageControllers::class, 'edit'])->name('edit-pages');
    Route::post('/pages/update/{pages}', [App\Http\Controllers\Admin\PageControllers::class, 'update'])->name('update-pages');
    Route::post('/pages/delete', [App\Http\Controllers\Admin\PageControllers::class, 'destroy'])->name('delete-pages');



});


