<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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
//     return view("home");
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function() {
    
    Route::get('/products', [App\Http\Controllers\Admin\ProductsController::class, 'index'])->name('admin.products');
    Route::get('/products/datatable', [App\Http\Controllers\Admin\ProductsController::class, 'datatable'])->name('admin.products.datatable');
    Route::post('/products/create', [App\Http\Controllers\Admin\ProductsController::class, 'create'])->name('admin.products.create');
    Route::post('/products/profile', [App\Http\Controllers\Admin\ProductsController::class, 'profile'])->name('admin.products.profile');
    Route::post('/products/update', [App\Http\Controllers\Admin\ProductsController::class, 'update'])->name('admin.products.update');
    Route::post('/products/delete', [App\Http\Controllers\Admin\ProductsController::class, 'delete'])->name('admin.products.delete');

    Route::get('/categories', [App\Http\Controllers\Admin\CategoriesController::class, 'index'])->name('admin.categories');
    Route::get('/categories/datatable', [App\Http\Controllers\Admin\CategoriesController::class, 'datatable'])->name('admin.categories.datatable');
    Route::post('/categories/create', [App\Http\Controllers\Admin\CategoriesController::class, 'create'])->name('admin.categories.create');
    Route::post('/categories/profile', [App\Http\Controllers\Admin\CategoriesController::class, 'profile'])->name('admin.categories.profile');
    Route::post('/categories/update', [App\Http\Controllers\Admin\CategoriesController::class, 'update'])->name('admin.categories.update');
    Route::post('/categories/delete', [App\Http\Controllers\Admin\CategoriesController::class, 'delete'])->name('admin.categories.delete');

    Route::get('/simulasi', [App\Http\Controllers\Admin\SimulasiController::class, 'index'])->name('admin.simulasi');
    Route::get('/simulasi/datatable', [App\Http\Controllers\Admin\SimulasiController::class, 'datatable'])->name('admin.simulasi.datatable');
    Route::post('/simulasi/create', [App\Http\Controllers\Admin\SimulasiController::class, 'create'])->name('admin.simulasi.create');
    Route::post('/simulasi/profile', [App\Http\Controllers\Admin\SimulasiController::class, 'profile'])->name('admin.simulasi.profile');
    Route::post('/simulasi/update', [App\Http\Controllers\Admin\SimulasiController::class, 'update'])->name('admin.simulasi.update');
    Route::post('/simulasi/delete', [App\Http\Controllers\Admin\SimulasiController::class, 'delete'])->name('admin.simulasi.delete');

    Route::get('/testimoni', [App\Http\Controllers\Admin\TestimoniController::class, 'index'])->name('admin.testimoni');
});

Route::group(['prefix' => 'guest'], function() {
    
    Route::get('/products', [App\Http\Controllers\Guest\ProductsController::class, 'index'])->name('guest.products');
    Route::get('/news', [App\Http\Controllers\Guest\CategoriesController::class, 'index'])->name('guest.news');
    Route::get('/simulasi', [App\Http\Controllers\Guest\SimulasiController::class, 'index'])->name('guest.simulasi');
    Route::get('/testimoni', [App\Http\Controllers\Guest\TestimoniController::class, 'index'])->name('guest.testimoni');
    Route::get('/contact', [App\Http\Controllers\Guest\TestimoniController::class, 'index'])->name('guest.contact');

});
