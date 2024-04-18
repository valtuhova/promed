<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplicationController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/page/reg', [PageController::class, 'regPage'])->name('regPage');
Route::get('/page/auth', [PageController::class, 'authPage'])->name('authPage');
Route::get('/page/welcome', [PageController::class, 'welcome'])->name('welcome');
Route::post('/page/reg/save', [UserController::class, 'regSave'])->name('regSave');
Route::post('/page/auth/save', [UserController::class, 'auth'])->name('auth');
Route::get('/page/exit', [UserController::class, 'exit'])->name('exit');
Route::get('/page/category', [PageController::class, 'categoryPage'])->name('categoryPage');
Route::post('/page/category/save', [CategoryController::class, 'store'])->name('categorySave');
Route::get('/page/service', [PageController::class, 'servicePage'])->name('servicePage');
Route::post('/page/service/save', [ServiceController::class, 'service'])->name('service');
Route::get('/page/doctor', [PageController::class, 'doctorPage'])->name('doctorPage');
Route::post('/page/doctor/save', [DoctorController::class, 'store'])->name('doctor');
Route::get('/page/doctors', [PageController::class, 'doctorsPage'])->name('doctorsPage');
Route::post('/page/filter', [ServiceController::class, 'filter'])->name('filter');
Route::get('/page/clear', [ServiceController::class, 'clear'])->name('clear');
Route::post('/page/filter/category', [CategoryController::class, 'filter'])->name('filterCategory');
Route::get('/page/services', [PageController::class, 'servicesPage'])->name('servicesPage');
Route::post('/page/sort', [ServiceController::class, 'sort'])->name('sort');
Route::get('/page/detail/service/{id}', [PageController::class, 'detail'])->name('detail');
Route::post('/page/client/save/{service_id}', [ClientController::class, 'store'])->name('clientSave');
Route::get('/page/application', [PageController::class, 'application'])->name('application');
Route::post('/page/application/ok/{application}', [ApplicationController::class, 'ok'])->name('ok');
Route::post('/page/application/reason/{application}', [ApplicationController::class, 'reason'])->name('reason');
Route::get('/page/category/delete/{category}', [CategoryController::class, 'destroy'])->name('deleteCategory');
Route::post('/page/service/update/{service}', [ServiceController::class, 'update'])->name('serviceUpdate');
Route::get('/page/service/delete/{service}', [ServiceController::class, 'destroy'])->name('deleteService');
Route::get('/page/doctor/delete/{doctor}', [DoctorController::class, 'destroy'])->name('deleteDoctor');
Route::get('/page/profile', [PageController::class, 'profile'])->name('profile');
Route::get('/page/application/all', [ApplicationController::class, 'allOrders'])->name('allOrders');
Route::get('/page/contacts', [PageController::class, 'contacts'])->name('contacts');
