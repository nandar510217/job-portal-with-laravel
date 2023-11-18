<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UiController;
use App\Models\Application;
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

// Route::get('/', function () {
//     return view('welcome');
// });


//Login
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'loginform'])->name('login');

//Register
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'registerform'])->name('register');

Route::post('register/{id}/update', [AuthController::class,'registerUpdate'])->name('registerUpdate')->middleware('auth');

//Ui
Route::get('/', [App\Http\Controllers\UiController::class,'index'])->name('welcome');

//Search
Route::post('search', [UiController::class,'search'])->name('search');
Route::get('search_by_id/{id}', [UiController::class,'searchById'])->name('searchById');

Route::group(['middleware'=>['auth']], function(){
    //Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    //employee profile
    Route::get('employee-profile', [UiController::class,'employeeProfile'])->name('profile');
    //Application
    Route::get('application/{id}', [ApplicationController::class,'application'])->name('application');
    Route::post('application/store', [ApplicationController::class,'applicationStore'])->name('applicationstore');
});


//Admin
Route::group(['prefix'=>'admin','middleware'=> ['auth', 'IsEmployer']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('dashboard/payment/store', [DashboardController::class,'paymentStore'])->name('paymentStore');
    Route::get('payment',[DashboardController::class,'payment'])->name('payment');
    Route::resource('categories',CategoryController::class);
    Route::resource('jobs',JobController::class);
    Route::get('user-list', [ DashboardController::class,'userList'])->name('user_list');
    Route::get('payment-info/{employer_id}', [DashboardController::class,'paymentInfo'])->name('payment_info');
    Route::post('payment/{userId}/confirm', [DashboardController::class,'paymentConfirm'])->name('paymentConfirm');

    //CV Form
    // Route::get('cvform', [FormController::class,'form'])->name('form');
    Route::get('admin/job/{id}/cv', [JobController::class,'form'])->name('form');
    //Accept app
    Route::post('application/{id}/accept', [JobController::class,'acceptApplication'])->name('application.accept');
    //Reject
    Route::post('application/{id}/reject', [JobController::class,'rejectApplication'])->name('application.reject');

});

// Route::get('apply', function(){
//     return view('applyPage');
// })->name('apply');










