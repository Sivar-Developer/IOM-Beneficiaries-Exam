<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('datatable/beneficiaries', 'BeneficiaryController@datatable')->name('beneficiaries.datatable');
Route::resource('/beneficiaries', 'BeneficiaryController');
Route::patch('/beneficiaries/{beneficiary}/approved', 'ApprovalController@storeApprove')->name('beneficiaries.store.approved');
Route::patch('/beneficiaries/{beneficiary}/rejected', 'ApprovalController@storeReject')->name('beneficiaries.store.rejected');
Route::get('/beneficiaries/{beneficiary}/services', 'BeneficiaryController@services')->name('beneficiaries.services.index');
Route::patch('/beneficiaries/{beneficiary}/services/attach', 'ServiceController@attach')->name('beneficiaries.services.attach');
Route::get('/export/beneficiaries', 'BeneficiaryController@export')->name('export.beneficiaries');
Route::post('/import/beneficiaries', 'BeneficiaryController@import')->name('import.beneficiaries');
Route::delete('/destroy/beneficiaries', 'BeneficiaryController@bulkDestroy')->name('beneficiaries.destroy.bulk');