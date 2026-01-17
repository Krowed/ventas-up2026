<?php

use App\Http\Controllers\BusinessController;
use App\Http\Controllers\LoginController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/', [LoginController::class, 'index'])->name('login');

Route::controller(BusinessController::class)->prefix('business')->group(function () {
    Route::get('/', 'index')->name('admin.business');
    Route::post('/load-ubigeo', 'load_ubigeo')->name('admin.load_ubigeo');
    Route::post('/load-provinces', 'load_provinces')->name('admin.load_provinces');
    Route::post('/load-districts', 'load_districts')->name('admin.load_districts');
    Route::post('/save-info-business', 'save_info_business')->name('admin.save_info_business');
    Route::post('/save-info-user', 'save_info_user')->name('admin.save_info_user');
    Route::post('/gen-json', 'gen_json')->name('admin.gen_json');
});
