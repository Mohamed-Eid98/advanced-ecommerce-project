<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\frontend\IndexController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\admin\AdminProfileController;
use App\Http\Controllers\backend\SubCategoryController;
use App\Http\Controllers\backend\SubSubCategoryController;

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


Route::middleware(['admin:admin'])->name('admin.')->group(function () {
    Route::get('admin/login', [AdminController::class, 'loginForm'])->name('signIn');
    Route::post('admin/login', [AdminController::class, 'store'])->name('login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::middleware([
    'auth:admin',
    config('jetstream.auth_session'),
    'verified'
    ])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('admin.index');
        })->name('admin.dashboard');
    });


    Route::middleware(['web', 'auth', 'verified'])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });


// admin all routes

Route::controller(AdminProfileController::class)->middleware('auth:admin')->prefix('admin/')->name('admin.')->group(function(){
    Route::get('profile', [AdminProfileController::class, 'adminProfile'])->name('profile');
    Route::get('profile/edit', [AdminProfileController::class, 'adminProfileEdit'])->name('edit.profile');
    Route::post('profile/edit', [AdminProfileController::class, 'adminProfileStore'])->name('profile.store');
    Route::get('change/password', [AdminProfileController::class, 'adminPasswordChange'])->name('change.password');
    Route::post('change/password', [AdminProfileController::class, 'adminPasswordStore'])->name('password.store');

});
/// Brand All Routes
Route::controller(BrandController::class)->middleware('auth:admin')->prefix('brand/')->name('brand.')->group(function(){
    Route::get('view', 'BrandView')->name('all');
    Route::post('store', 'BrandStore')->name('store');
    Route::get('edit/{id}', 'BrandEdit')->name('edit');
    Route::post('update/{id}', 'BrandUpdate')->name('update');
    Route::get('delete/{id}', 'BrandDelete')->name('delete');
});

/// Category All Routes

Route::controller(CategoryController::class)->middleware('auth:admin')->prefix('category/')->name('category.')->group(function(){
    Route::get('view', 'CategoryView')->name('all');
    Route::post('store', 'CategoryStore')->name('store');
    Route::get('edit/{id}', 'CategoryEdit')->name('edit');
    Route::post('update/{id}', 'CategoryUpdate')->name('update');
    Route::get('delete/{id}', 'CategoryDelete')->name('delete');
});
/// SubCategory All Routes
Route::controller(SubCategoryController::class)->middleware('auth:admin')->prefix('category/')->name('subcategory.')->group(function(){
    Route::get('sub/view', 'SubCategoryView')->name('all');
    Route::post('sub/store', 'SubCategoryStore')->name('store');
    Route::get('sub/edit/{id}', 'SubCategoryEdit')->name('edit');
    Route::post('sub/update/{id}', 'SubCategoryUpdate')->name('update');
    Route::get('sub/delete/{id}', 'SubCategoryDelete')->name('delete');
});

/// Sub->SubCategory All Routes
Route::controller(SubSubCategoryController::class)->middleware('auth:admin')->prefix('subcategory/')->name('subsubcategory.')->group(function(){
    Route::get('sub/view', 'SubSubCategoryView')->name('all');
    Route::get('sub/ajax/{id}', 'SubCategoryAjax');
    Route::get('sub/sub/ajax/{id}', 'SubSubCategoryAjax');
    Route::post('sub/store', 'SubSubCategoryStore')->name('store');
    Route::get('sub/edit/{id}', 'SubSubCategoryEdit')->name('edit');
    Route::post('sub/update/{id}', 'SubSubCategoryUpdate')->name('update');
    Route::get('sub/delete/{id}', 'SubSubCategoryDelete')->name('delete');
});

/// Product All Routes
Route::controller(ProductController::class)->middleware('auth:admin')->prefix('product/')->name('product.')->group(function(){
    Route::get('add', 'ProductAdd')->name('add');
    Route::post('store', 'ProductStore')->name('store');
    Route::get('mange', 'ProductMange')->name('mange');
    Route::get('edit/{id}', 'ProductEdit')->name('edit');
    Route::post('update/{id}', 'ProductUpdate')->name('update');
    Route::get('delete/{id}', 'ProductDelete')->name('delete');
    Route::post('update-images', 'UpdateImages')->name('update-images');
    Route::post('update-thambnail', 'UpdateThambnail')->name('update.thambnail');
    Route::get('image/delete/{id}', 'ProductImageDelete')->name('image.delete');
    Route::get('inactive/{id}', 'ProductInactive')->name('inactive');
    Route::get('active/{id}', 'ProductActive')->name('active');
});


/// Slider All Routes
Route::controller(SliderController::class)->middleware('auth:admin')->prefix('slider/')->name('slider.')->group(function(){
    Route::get('view', 'SliderView')->name('mange');
    Route::post('store', 'SliderStore')->name('store');
    Route::get('edit/{id}', 'SliderEdit')->name('edit');
    Route::post('update', 'SliderUpdate')->name('update');
    Route::get('delete/{id}', 'SliderDelete')->name('delete');
    Route::get('inactive/{id}', 'SliderInactive')->name('inactive');
    Route::get('active/{id}', 'SliderActive')->name('active');
});



Route::get('admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');



// User All Routes
Route::get('/', [IndexController::class, 'index']);
Route::get('user/profile', [IndexController::class, 'userProfile'])->name('user.profile')->middleware('auth');
Route::post('user/profile', [IndexController::class, 'userProfileStore'])->name('user.profile.store');
Route::get('user/logout', [IndexController::class, 'userLogout'])->name('user.logout');
Route::get('user/change/password', [IndexController::class, 'userChangePassword'])->name('user.change.password');
Route::post('user/change/password', [IndexController::class, 'userPasswordStore'])->name('user.password.store');


