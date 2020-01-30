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

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home/contacts/faq', 'QuestionController@index');
Route::get('/about', 'TreeController@about');
Route::get('/home/payment', 'TreeController@payment');
Route::get('/home/payment/online_payment', 'TreeController@payment');
Route::get('/home/payment/other_payment_methods', 'TreeController@otherPaymentMethods');
Route::get('/home/payment/autopayment', 'TreeController@autopayment');
Route::get('/home/payment/deferred_payment', 'TreeController@deferredPayment');
Route::get('/home/telephony', 'TelephoneController@index');
Route::get('/home/internet', 'TariffController@internet');
Route::get('/home/tv', 'TariffController@tv');
Route::get('/home/internet/tariffs', 'TariffController@internetTariffs');
Route::get('/home/tv/tariffs', 'TariffController@tvTariffs');
Route::get('/home/tv/packages', 'PackageController@index');
Route::get('/home/connect', 'OrderController@index');
Route::get('/home/contacts', 'TreeController@homeContacts');
Route::get('/about/documents', 'TreeController@documents');
Route::get('/about/partnership', 'TreeController@partnership');
Route::get('/about/archive', 'TreeController@archive');
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
Route::get('/about/job_openings/{jobopening}', 'JobOpeningController@show')->where('jobopening', '[0-9]+');;
Route::get('/news/{news}', 'NewsController@show');

Route::resource('orders', 'OrderController');
Route::resource('streets', 'StreetController');
Route::resource('likes', 'LikeController');
Route::get('questions/{question}', 'QuestionController@show');
Route::get('streets/{street}/houses', 'StreetController@searchHouses');
Route::get('posts/{post}', 'PostController@index');

Route::prefix('admin')->group(function () {
    Route::group(['middleware' => ['role:admin']], function () {
        Route::namespace('Admin')->group(function () {
            Route::get('/', 'HomeController@index');
            Route::resource('tariffs', 'TariffController');
            Route::resource('tariff_groups', 'TariffGroupController');
            Route::resource('tariff_types', 'TariffTypeController');
            Route::resource('streets', 'StreetController');
            Route::resource('houses', 'HouseController');
            Route::resource('questions', 'QuestionController');
            Route::resource('question_types', 'QuestionTypeController');
            Route::resource('jobopenings', 'JobOpeningController');
            Route::resource('equipments', 'EquipmentController');
            Route::resource('antiviruses', 'AntivirusController');
            Route::resource('antivirus_periods', 'AntivirusPeriodController');
            Route::resource('antivirus_types', 'AntivirusTypeController');
            Route::resource('news', 'NewsController');
            Route::resource('telephones', 'TelephoneController');
            Route::resource('services', 'ServiceController');
            Route::resource('period_types', 'PeriodTypeController');
            Route::resource('posts', 'PostController');
            Route::resource('payment_methods', 'PaymentMethodController');
            Route::resource('packages', 'PackageController');
            Route::resource('files', 'FileController');
            Route::resource('global_settings', 'GlobalSettingController');
            Route::resource('editor_images', 'EditorImageController');
            Route::resource('slides', 'SlideController');
            Route::get('trees/sections', 'TreeController@sections');
            Route::put('trees/order', 'TreeController@order');
            Route::resource('trees', 'TreeController');
            Route::resource('sections', 'SectionController');
            Route::resource('social_networks', 'SocialNetworkController');
            Route::get('tags/search', 'TagController@search');
            Route::get('profile', 'ProfileController@index');
            Route::put('profile', 'ProfileController@update');
            Route::put('password/reset', 'ProfileController@resetPassword');
        });
    });
});

Route::get('/{url}', 'TreeController@index')->where(['url' => '[A-Za-z-0-9]+[^-0-9.]+']);

Route::get('/home', 'HomeController@index')->name('home');
