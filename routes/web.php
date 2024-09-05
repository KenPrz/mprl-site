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
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\BlogAdminController;
use App\Http\Controllers\ProductsAdminController;
use App\Http\Controllers\BrochureController;
use App\Http\Controllers\FAQsController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\ServicesAdminController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\ProjectAdminController;
use Carbon\Laravel\ServiceProvider;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/contact', [ContactController::class,'index'])->name('contact.index');
Route::get('/services', [ServicesController::class, 'index'])->name('services.index');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/product', [ProductController::class, 'index'])->name('products');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/brochure', [BrochureController::class, 'downLoadBrochure'])->name('brochure.download');
Route::post('/inquire', [ContactController::class, 'sendEmail'])->name('inquire.send');
Route::post('/inquire-product', [InquiryController::class, 'send'])->name('productInquiry.send');

Route::middleware([AdminMiddleware::class,'auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboradController::class, 'index'])->name('dashboard');

    Route::get('/users', [UserAdminController::class, 'index'])->name('admin.users.index');
    Route::get('/users/{user}', [UserAdminController::class, 'show'])->name('admin.users.show');
    Route::put('/users/{user}', [UserAdminController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{user}', [UserAdminController::class, 'destroy'])->name('admin.users.destroy');

    Route::get('/blog', [BlogAdminController::class, 'index'])->name('admin.blog.index');
    Route::get('/blog/create', [BlogAdminController::class, 'create'])->name('admin.blog.create');
    Route::post('/blog', [BlogAdminController::class, 'store'])->name('admin.blog.store');
    Route::get('/blog/{id}', [BlogAdminController::class, 'show'])->name('admin.blog.show');
    Route::get('/blog/{id}/edit', [BlogAdminController::class, 'edit'])->name('admin.blog.edit');
    Route::post('/blog/{id}', [BlogAdminController::class, 'update'])->name('admin.blog.update');
    Route::delete('/blog/{id}', [BlogAdminController::class, 'destroy'])->name('admin.blog.destroy');

    Route::post('/blog-category', [BlogCategoryController::class, 'store'])->name('admin.blog-category.store');
    Route::post('/blog-category/{id}', [BlogCategoryController::class, 'update'])->name('admin.blog-category.update');
    Route::delete('/blog-category/{id}', [BlogCategoryController::class, 'destroy'])->name('admin.blog-category.destroy');

    Route::get('/products', [ProductsAdminController::class, 'index'])->name('admin.products.index');
    Route::get('/products/create', [ProductsAdminController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [ProductsAdminController::class, 'store'])->name('admin.products.store');
    Route::get('/products/{id}', [ProductsAdminController::class, 'show'])->name('admin.products.show');
    Route::get('/products/{id}/edit', [ProductsAdminController::class, 'edit'])->name('admin.products.edit');
    Route::patch('/products/{id}', [ProductsAdminController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/{id}', [ProductsAdminController::class, 'destroy'])->name('admin.products.destroy');

    Route::get('/services', [ServicesAdminController::class, 'index'])->name('admin.services.index');
    Route::get('/services/create', [ServicesAdminController::class, 'create'])->name('admin.services.create');
    Route::post('/services', [ServicesAdminController::class, 'store'])->name('admin.services.store');
    Route::get('/services/{id}/edit', [ProductsAdminController::class, 'edit'])->name('admin.services.edit');

    Route::get('/projects', [ProjectAdminController::class, 'index'])->name('admin.projects.index');
    Route::get('/projects/create', [ProjectAdminController::class, 'create'])->name('admin.projects.create');
    Route::post('/projects', [ProjectAdminController::class, 'store'])->name('admin.projects.store');
    Route::get('/projects/{id}/edit', [ProjectAdminController::class, 'edit'])->name('admin.projects.edit');
    Route::patch('/projects/{id}', [ProjectAdminController::class, 'update'])->name('admin.projects.update');
    Route::delete('/projects/{id}', [ProjectAdminController::class, 'destroy'])->name('admin.projects.destroy');

    Route::get('/faqs', [FAQsController::class, 'index'])->name('admin.faqs.index');
    Route::get('/faqs/create', [FAQsController::class, 'create'])->name('admin.faqs.create');
    Route::post('/faqs', [FAQsController::class, 'store'])->name('admin.faqs.store');
    Route::get('/faqs/{id}/edit', [FAQsController::class, 'edit'])->name('admin.faqs.edit');
    Route::patch('/faqs/{id}', [FAQsController::class, 'update'])->name('admin.faqs.update');
    Route::delete('/faqs/{id}', [FAQsController::class, 'destroy'])->name('admin.faqs.destroy');

    Route::post('/dashboard/update-brochure', [BrochureController::class, 'store'])->name('admin.brochure.store');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//dummy routes since our login and register routes are a modal in the welcome page
//dummy login route
Route::get('/login', fn()=>
    redirect()->route('welcome')
)->name('login');

//dummy register route
Route::get('/register', fn()=>
    redirect()->route('welcome')
)->name('register');

require __DIR__.'/auth.php';
