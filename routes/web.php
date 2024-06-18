<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DashboradController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\BlogAdminController;
use App\Http\Controllers\ProductsAdminController;

Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/contact', [ContactController::class,'index'])->name('contact.index');
Route::get('/services', [ServicesController::class, 'index'])->name('services.index');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/product', [ProductController::class, 'index'])->name('products');

Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboradController::class, 'index'])->name('dashboard');

    Route::get('/blog', [BlogAdminController::class, 'index'])->name('admin.blog.index');
    Route::get('/blog/create', [BlogAdminController::class, 'create'])->name('admin.blog.create');
    Route::post('/blog', [BlogAdminController::class, 'store'])->name('admin.blog.store');
    Route::get('/blog/{id}', [BlogAdminController::class, 'show'])->name('admin.blog.show');
    Route::get('/blog/{id}/edit', [BlogAdminController::class, 'edit'])->name('admin.blog.edit');
    Route::patch('/blog/{id}', [BlogAdminController::class, 'update'])->name('admin.blog.update');
    Route::delete('/blog/{id}', [BlogAdminController::class, 'destroy'])->name('admin.blog.destroy');

    Route::get('/products', [ProductsAdminController::class, 'index'])->name('admin.products.index');
    Route::get('/products/create', [ProductsAdminController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [ProductsAdminController::class, 'store'])->name('admin.products.store');
    Route::get('/products/{id}', [ProductsAdminController::class, 'show'])->name('admin.products.show');
    Route::get('/products/{id}/edit', [ProductsAdminController::class, 'edit'])->name('admin.products.edit');
    Route::patch('/products/{id}', [ProductsAdminController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/{id}', [ProductsAdminController::class, 'destroy'])->name('admin.products.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
