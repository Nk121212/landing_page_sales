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

Route::get('/', function () {
    // return view('landing');
    return view("landing");
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function() {
    
    Route::get('/products', [App\Http\Controllers\Admin\ProductsController::class, 'index'])->name('admin.products');
    Route::get('/products/datatable', [App\Http\Controllers\Admin\ProductsController::class, 'datatable'])->name('admin.products.datatable');
    Route::post('/products/create', [App\Http\Controllers\Admin\ProductsController::class, 'create'])->name('admin.products.create');
    Route::post('/products/profile', [App\Http\Controllers\Admin\ProductsController::class, 'profile'])->name('admin.products.profile');
    Route::post('/products/update', [App\Http\Controllers\Admin\ProductsController::class, 'update'])->name('admin.products.update');
    Route::post('/products/delete', [App\Http\Controllers\Admin\ProductsController::class, 'delete'])->name('admin.products.delete');

    Route::get('/categories', [App\Http\Controllers\Admin\CategoriesController::class, 'index'])->name('admin.categories');
    Route::get('/simulasi', [App\Http\Controllers\Admin\SimulasiController::class, 'index'])->name('admin.simulasi');
    Route::get('/testimoni', [App\Http\Controllers\Admin\TestimoniController::class, 'index'])->name('admin.testimoni');
});
