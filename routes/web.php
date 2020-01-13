<?php

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

Route::get('/', function() {
    return redirect('home/internet');
});
Route::get('/home/contacts/faq', 'QuestionController@index');
Route::get('/about', 'NavigationController@about');
Route::get('/home/payment', 'NavigationController@payment');
Route::get('/home/payment/online_payment', 'NavigationController@payment');
Route::get('/home/payment/other_payment_methods', 'NavigationController@otherPaymentMethods');
Route::get('/home/payment/autopayment', 'NavigationController@autopayment');
Route::get('/home/payment/deferred_payment', 'NavigationController@deferredPayment');
Route::get('/home/telephony', 'TelephoneController@index');
Route::get('/home/internet', 'TariffController@internet');
Route::get('/home/tv', 'TariffController@tv');
Route::get('/home/internet/tariffs', 'TariffController@internetTariffs');
Route::get('/home/tv/tariffs', 'TariffController@tvTariffs');
Route::get('/home/tv/packages', 'PackageController@index');
Route::get('/home/connect', 'OrderController@index');
Route::get('/home/contacts', 'NavigationController@homeContacts');
Route::get('/about/contacts', 'NavigationController@aboutContacts');
Route::get('/business/contacts', 'NavigationController@aboutContacts');
Route::get('/about/documents', 'NavigationController@documents');
Route::get('/about/partnership', 'NavigationController@partnership');
Route::get('/about/archive', 'NavigationController@archive');
Route::get('/about/partnership/become_dealer', 'NavigationController@dealer');
Route::get('/about/partnership/become_partner', 'NavigationController@partner');
Route::get('/home/internet/antiviruses', 'AntivirusController@index');
Route::get('/home/internet/equipments', 'EquipmentController@index');
Route::get('/home/internet/services', 'ServiceController@index');
Route::get('/home/internet/antiviruses/{antivirusType}', 'AntivirusController@show');
Route::get('/home/internet/equipments/{equipment}', 'EquipmentController@show');
Route::get('/home/internet/services/{service}', 'ServiceController@show');
Route::get('/about/news', 'NewsController@index');
Route::get('/about/job_openings', function() {
    return redirect(url('/about/job_openings/get_job'));
});
Route::get('/about/job_openings/get_job', 'JobOpeningController@index');
Route::get('/about/job_openings/{jobopening}', 'JobOpeningController@show');
Route::get('/news/{news}', 'NewsController@show');

Route::resource('orders', 'OrderController');
Route::resource('streets', 'StreetController');
Route::resource('likes', 'LikeController');
Route::get('questions/{question}', 'QuestionController@show');
Route::get('streets/{street}/houses', 'StreetController@searchHouses');
Route::get('posts/{post}', 'PostController@index');
Route::prefix('admin')->group(function () {
    Route::namespace('Admin')->group(function () {
        Route::get('/', 'HomeController@index');
        Route::resource('tariffs', 'TariffController');
        Route::resource('tariff_groups', 'TariffGroupController');
        Route::resource('tariff_types', 'TariffTypeController');
    });
});
Route::get('/{url}', 'NavigationController@index')->where(['url' => '[A-Za-z-0-9]+[^-0-9.]+']);
