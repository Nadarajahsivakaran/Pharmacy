<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\UserPrescriptionController;
use App\Http\Controllers\quotationsController;

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


Route::group(['middleware' => ['checkUser']], function (){

    Route::get('/get-prescription',[UserPrescriptionController::class,'getPrescription'])->name('getPrescription');
    Route::get('/view-prescription',[UserPrescriptionController::class,'viewPrescription'])->name('viewPrescription');
    Route::view('user_prescription', 'users.user_prescription');
    Route::post('/store-prescription',[UserPrescriptionController::class,'storePrescription'])->name('storePrescription');
    Route::get('/create-quotations/{id}',[UserPrescriptionController::class,'createQuotations'])->name('createQuotations');
    Route::post('/store-quotations',[quotationsController::class,'storeQuotations'])->name('storeQuotations');
    Route::get('/user-approve',[quotationsController::class,'userApprove'])->name('userApprove');
    Route::get('/user-Edit/{id}',[quotationsController::class,'userEdit'])->name('userEdit');
    Route::post('/quotations-approve',[quotationsController::class,'quotationsApprove'])->name('quotationsApprove');
    Route::get('/pharmacy-show',[quotationsController::class,'pharmacyShow'])->name('pharmacyShow');


});



Route::view('/signup', 'users.signUp');
Route::view('/user_dashboard', 'users.uesr_first');
Route::view('/', 'users.signIn');
Route::post('/signup',[userController::class,'signup'])->name('signup');
Route::post('/signin',[userController::class,'signin'])->name('signin');
Route::get('/logout', [userController::class,'logout'])->name('logout');
