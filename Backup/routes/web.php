<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\AdvertiseController;
use App\Http\Controllers\Backend\PostNewsController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\StaffController;
use App\Http\Controllers\Backend\SeoController;
use App\Http\Controllers\Auth\AdminAuthController;

Route::get('/clear-cache', function () {
   Artisan::call('cache:clear');
   Artisan::call('route:clear');

   return "Cache cleared successfully";
});

// Login Route 
Route::get('/user-login', [AdminAuthController::class, 'showUserLoginForm'])->name('user.login');
Route::post('/user-login', [AdminAuthController::class, 'userLogin']);

Route::get('/admin-login', [AdminAuthController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/admin-login-store', [AdminAuthController::class, 'adminLogin'])->name('admin.loginStore');
Route::get('/admin/logout', [AdminAuthController::class, 'logoutAdmin'])->name('admin.logout');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Frontend Route starts 
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/latest/news', [HomeController::class, 'latest_news'])->name('latestNews');
Route::get('/newsdetails/{slug}', [HomeController::class, 'newsDetails'])->name('news_details')->middleware('news.slug');
Route::get('/newscategories/{category_slug}', [HomeController::class, 'newsCategory'])->name('news_by_category');


// Admin Routes
// Route::middleware(['auth:admin'])->group(function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth:admin']], function () {    
    // Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::group(['prefix' => '/category'], function () {
        Route::get('/index', [CategoryController::class, 'index'])->name('category_page');
        Route::post('/store', [CategoryController::class, 'store'])->name('store_category');
        Route::get('/edit/{category_slug}', [CategoryController::class, 'edit'])->name('edit_category');
        Route::put('/update/{category_slug}', [CategoryController::class, 'update'])->name('update_category');
    });
    Route::group(['prefix' => '/advertise'], function () {
        Route::get('/index', [AdvertiseController::class, 'index'])->name('advertise_page');
        Route::post('/store', [AdvertiseController::class, 'store'])->name('store_advertise');
        Route::get('/edit/{id_advertise}', [AdvertiseController::class, 'edit'])->name('edit_advertise');
        Route::put('/update/{id_advertise}', [AdvertiseController::class, 'update'])->name('update_advertise');
    });
    Route::group(['prefix' => '/postnews'], function () {
        Route::get('/index', [PostNewsController::class, 'index'])->name('add_news_page');
        Route::post('/store', [PostNewsController::class, 'store'])->name('store_news');
        Route::get('/view', [PostNewsController::class, 'view'])->name('manage_news_page');
        Route::get('/edit/{slug}', [PostNewsController::class, 'edit'])->name('edit_news_page');
        Route::put('/update/{slug}', [PostNewsController::class, 'update'])->name('update_news');
    });

    Route::group(['prefix' => '/staff'], function () {
        Route::get('/index', [StaffController::class, 'index'])->name('staff_page');
        Route::post('/store', [StaffController::class, 'store'])->name('store_staff');
        Route::get('/edit/{id}', [StaffController::class, 'edit'])->name('edit_staff');
        Route::put('/update/{id}', [StaffController::class, 'update'])->name('update_staff');
    });

    Route::group(['prefix' => '/seo'], function () {
        Route::get('/index', [SeoController::class, 'index'])->name('add_seo_page');
        Route::post('/store', [SeoController::class, 'store'])->name('store_seo');
        Route::get('/view', [SeoController::class, 'view'])->name('manage_seo_page');
        Route::get('/edit/{id}', [SeoController::class, 'edit'])->name('edit_seo_page');
        Route::put('/update/{id}', [SeoController::class, 'update'])->name('update_seo');
    });
});


// User Routes
// Route::middleware(['auth:web'])->group(function () {
Route::group(['prefix' => 'staff', 'as' => 'staff.', 'middleware' => ['auth:web']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::group(['prefix' => '/advertise'], function () {
        Route::get('/index', [AdvertiseController::class, 'index'])->name('advertise_page');
        Route::post('/store', [AdvertiseController::class, 'store'])->name('store_advertise');
        Route::get('/edit/{id_advertise}', [AdvertiseController::class, 'edit'])->name('edit_advertise');
        Route::put('/update/{id_advertise}', [AdvertiseController::class, 'update'])->name('update_advertise');
    });

    Route::group(['prefix' => '/postnews'], function () {
        Route::get('/index', [PostNewsController::class, 'index'])->name('add_news_page');
        Route::post('/store', [PostNewsController::class, 'store'])->name('store_news');
        Route::get('/view', [PostNewsController::class, 'view'])->name('manage_news_page');
        Route::get('/edit/{slug}', [PostNewsController::class, 'edit'])->name('edit_news_page');
        Route::put('/update/{slug}', [PostNewsController::class, 'update'])->name('update_news');
    });

    
});

// Robot.txt Route 
Route::get('/robots.txt', function () {
    $content = "User-agent: *\nDisallow: /admin/\nAllow: /\nSitemap: https://fanamnews.tsbddev.com/sitemap.xml";
    
    return Response::make($content, 200, ['Content-Type' => 'text/plain']);
});

// Sitemap Route 
Route::get('/sitemap.xml', [HomeController::class, 'sitemap']);
