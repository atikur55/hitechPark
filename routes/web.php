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
    return view('auth.login');
});

Auth::routes(['verify' => true]);
// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
|--------------------------------------------------------------------------
| Admin Route ==> Banner Section
|--------------------------------------------------------------------------
*/
Route::get('/create_banner','BannerPartController@create_banner')->name('create_banner');
Route::post('/banner_post','BannerPartController@banner_post')->name('banner_post');
Route::get('/view_banner','BannerPartController@view_banner')->name('view_banner');
Route::get('/active_banner/{banner_id}','BannerPartController@active_banner')->name('active_banner');
Route::get('/edit_banner/{banner_id}','BannerPartController@edit_banner')->name('view_banner');
Route::post('/edit_banner_post','BannerPartController@edit_banner_post')->name('edit_banner_post');
Route::post('/delete_banner/{banner_id}','BannerPartController@delete_banner')->name('delete_banner');
/*
|--------------------------------------------------------------------------
| Admin Route ==> Description Section
|--------------------------------------------------------------------------
*/
Route::get('/create_description','DescriptionPartController@create_description')->name('create_description');
Route::post('/description_post','DescriptionPartController@description_post')->name('description_post');
Route::get('/view_description','DescriptionPartController@view_description')->name('view_description');
Route::get('/active_description/{description_id}','DescriptionPartController@active_description')->name('active_description');
Route::get('/edit_description/{description_id}','DescriptionPartController@edit_description')->name('edit_description');
Route::post('/edit_description_post','DescriptionPartController@edit_description_post')->name('edit_description_post');
Route::get('/delete_description/{description_id}','DescriptionPartController@delete_description')->name('delete_description');
/*
|--------------------------------------------------------------------------
| Admin Route ==> Country Contact Section
|--------------------------------------------------------------------------
*/
Route::get('/create_country_contact','CountryContactController@create_country_contact')->name('create_country_contact');
Route::post('/country_contact_post','CountryContactController@country_contact_post')->name('country_contact_post');
Route::get('/view_create_country','CountryContactController@view_create_country')->name('view_create_country');
// Client Enquiry Form
Route::get('/cef','ClientEnquiryController@create');
Route::post('/sent_enquiry','ClientEnquiryController@sent_enquiry');
Route::get('/view_enquiry','ClientEnquiryController@view_enquiry');
Route::get('/delete_enquiry/{enquiry_id}','ClientEnquiryController@delete_enquiry');

// Download Filter Wise Data

Route::post('/download_pdf','DownloadController@download_pdf');
Route::get('/download','DownloadController@download');

// Mp3 Download 
Route::get('/mp3upload','Mp3UploadController@mp3upload');
Route::post('/upload_post','Mp3UploadController@upload_post');

// Download Mp3
Route::get('/download_mp3/{id}','DownloadController@download_mp3');