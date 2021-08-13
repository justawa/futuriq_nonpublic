<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrgEnrolmentController;

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
header("Access-Control-Allow-Origin: *");

Route::get('/', function () {
    return view('welcome');
});

Route::get('/videocheck/{application_id?}', 'VideoController@check')->name('video.check');

Route::get('/videorecord', function() {
    return view('video_record');
})->name('vidoerecord');

Route::post('/video/upload', 'VideoController@upload')->name('video.upload');
Route::post('/video/verification', 'EnrolmentController@video_verification_store')->name('video.verification');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('apply-dsc', 'EnrolmentController@apply_dsc')->name('apply.dsc');
    Route::post('/enrolment', 'EnrolmentController@store')->name('enrolment.store');

    Route::get('/enrolment/authentication/ekyc/{token1}/dsc/{token2}', 'EnrolmentController@authentication')->name('enrolment.authentication');

    Route::get('enrolment/offline-kyc/{application_id}', 'EnrolmentController@get_offline_kyc')->name('enrolment.offline.kyc');

    Route::get('enrolment/list', 'EnrolmentController@list')->name('enrolment.list');
    Route::get('enrolment/dsc-list', 'EnrolmentController@dsc_list')->name('enrolment.dsc.list');
    Route::get('enrolment/completed-steps/{application_id}', 'EnrolmentController@getEnrolmentByApplicationIdSteps')->name('enrolment.steps.completed');


    //partner
    Route::get('/partner/create', 'PartnerController@create')->name('partner.create');
    Route::post('/partner', 'PartnerController@store')->name('partner.store');
});

Route::get('/esign', 'EsignController@sendXml');

Route::get('/get-certificate', 'ServerRequestController@getCertificate');

// api
Route::get('/enrolment/application_id', 'EnrolmentController@getEnrolmentByApplicationId')->name('enrolment.by.application.id');
Route::get('/enrolment/application_id_and_dob', 'EnrolmentController@getEnrolmentByApplicationIdAndDob')->name('enrolment.by.application.id.and.dob');


// saurav
Route::view('/ind', 'saurav.ind')->name('saurav.ind');
Route::view('/orggov', 'saurav.orggov')->name('saurav.orggov');
Route::view('/orggov2', 'saurav.orggov2')->name('saurav.orggov2');
Route::get('orggovnon', 'OrgEnrolmentController@create')->name('saurav.orggovnon');

Route::post('orggovnon', 'OrgEnrolmentController@store')->name('saurav.orggovnon');
// Route::view('/orggovnon', 'saurav.orggovnon')->name('saurav.orggovnon');
Route::view('/orggovnon2', 'saurav.orggovnon2')->name('saurav.orggovnon2');
Route::view('/orggovdgst', 'saurav.orggovdgst')->name('saurav.orggovdgst');
Route::view('/orggovdgst2', 'saurav.orggovdgst2')->name('saurav.orggovdgst2');
Route::any('/last', [OrgEnrolmentController::class, 'store'])->name('saurav.last');
// Route::view('/last', 'saurav.last')->name('saurav.last');



