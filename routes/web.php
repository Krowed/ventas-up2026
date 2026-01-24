<?php

use App\Http\Controllers\BusinessController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WarehouseSelectorController;
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

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');

Route::controller(WarehouseSelectorController::class)->prefix('warehouseselect')->group(function () {
    Route::get('/', 'index')->name('warehouses.selector')->middleware('auth');
    Route::post('/store', 'store')->name('warehouses.store');
});


Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::controller(LoginController::class)->prefix('login')->group(function () {
    Route::post('/auth', 'login')->name('login.auth');
    Route::get('/logout', 'logout')->name('login.logout');
});

Route::controller(BusinessController::class)->prefix('business')->group(function () {
    Route::get('/', 'index')->name('admin.business');
    Route::post('/load-ubigeo', 'load_ubigeo')->name('admin.load_ubigeo');
    Route::post('/load-provinces', 'load_provinces')->name('admin.load_provinces');
    Route::post('/load-districts', 'load_districts')->name('admin.load_districts');
    Route::post('/save-info-business', 'save_info_business')->name('admin.save_info_business');
    Route::post('/save-info-user', 'save_info_user')->name('admin.save_info_user');
    Route::post('/gen-json', 'gen_json')->name('admin.gen_json');
});

Route::controller(ProductController::class)->prefix('products')->group(function() {
    Route::get('/'                    , 'index')->name('admin.products')->middleware('auth');
    Route::get('/get'                 , 'get')->name('admin.get_products');
    Route::post('/save'               , 'save')->name('admin.save_product');
    Route::post('/detail'             , 'detail')->name('admin.detail_product');
    Route::post('/store'              , 'store')->name('admin.store_product');
    Route::post('/delete'             , 'delete')->name('admin.delete_product');
    Route::post('/upload-excel'       , 'upload')->name('admin.upload_excel');
    Route::get('/download-excel'      , 'download')->name('admin.download_excel');
    Route::post('/view-detail'        , 'view_detail')->name('admin.view_detail');
    Route::post('/obtener-correlativo', 'obtenerCorrelativo')->name('products.obtenCorrelativo');
});