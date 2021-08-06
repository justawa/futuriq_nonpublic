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

Route::get('/videorecord', function() {
    return view('video_record');
})->name('vidoerecord');

Route::get('/video/upload', 'VideoController@upload')->name('video.upload');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('apply-dsc', 'EnrolmentController@apply_dsc')->name('apply.dsc');
    Route::post('/enrolment', 'EnrolmentController@store')->name('enrolment.store');

    Route::get('/enrolment/authentication/ekyc/{token1}/dsc/{token2}', 'EnrolmentController@authentication')->name('enrolment.authentication');

    Route::get('enrolment/list', 'EnrolmentController@list')->name('enrolment.list');
    Route::get('enrolment/dsc-list', 'EnrolmentController@dsc_list')->name('enrolment.dsc.list');
    Route::get('enrolment/completed-steps/{application_id}', 'EnrolmentController@getEnrolmentByApplicationIdSteps')->name('enrolment.steps.completed');


    //partner
    Route::get('/partner/create', 'PartnerController@create')->name('partner.create');
    Route::post('/partner', 'PartnerController@store')->name('partner.store');
});

Route::get('enrolment/kyc/{application_id}', 'EnrolmentController@get_offline_kyc')->name('enrolment.offline.kyc');

Route::get('/esign', 'EsignController@sendXml');
Route::get('/esign/response', 'EsignController@fetchResponse');

// api
Route::get('/enrolment/application_id', 'EnrolmentController@getEnrolmentByApplicationId')->name('enrolment.by.application.id');
Route::get('/enrolment/application_id_and_dob', 'EnrolmentController@getEnrolmentByApplicationIdAndDob')->name('enrolment.by.application.id.and.dob');
