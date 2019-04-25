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
Route::get('dev', function() {
    return view('blog.show');
});


/**
 * Auth routes
 */
Route::group(['namespace' => 'Auth'], function () {

    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout')->name('logout');

    // Registration Routes...
    if (config('auth.users.registration')) {
        Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'RegisterController@register');
    }

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset')->name('password.reset.request');

    // Confirmation Routes...
    if (config('auth.users.confirm_email')) {
        Route::get('confirm/{user_by_code}', 'ConfirmController@confirm')->name('confirm');
        Route::get('confirm/resend/{user_by_email}', 'ConfirmController@sendEmail')->name('confirm.send');
    }

    // Social Authentication Routes...
    Route::get('social/redirect/{provider}', 'SocialLoginController@redirect')->name('social.redirect');
    Route::get('social/login/{provider}', 'SocialLoginController@login')->name('social.login');
});

/**
 * Backend routes
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'admin'], function () {

    // Dashboard
    Route::get('/', 'DashboardController@index')->name('dashboard');

    //Users
    Route::get('users', 'UserController@index')->name('users');
    Route::get('users/{user}', 'UserController@show')->name('users.show');
    Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit');
    Route::put('users/{user}', 'UserController@update')->name('users.update');
    Route::get('users/{user}/delete', 'UserController@destroy')->name('users.delete');
    Route::get('permissions', 'PermissionController@index')->name('permissions');
    Route::get('permissions/{user}/repeat', 'PermissionController@repeat')->name('permissions.repeat');
    Route::get('dashboard/log-chart', 'DashboardController@getLogChartData')->name('dashboard.log.chart');
    Route::get('dashboard/registration-chart', 'DashboardController@getRegistrationChartData')->name('dashboard.registration.chart');
});


Route::get('/', 'HomeController@index')->name('index');
Route::get('/inquiries', 'InquiriesController@index');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::post('/detail_save', 'ProfileController@detail_save');
Route::post('/address_save', 'ProfileController@store_address');
Route::get('/skateboard-deck-configurator', 'ConfiguratorController@index')->name('get.skateboard.configurator');
Route::get('/skateboard-deck-configurator/{id}', 'ConfiguratorController@show')->name('show.skateboard.configurator');
Route::get('/getdesign','ConfiguratorController@getdesign');
Route::get('/skateboard-remove/{id}', 'ConfiguratorController@delete');
Route::post('/configurator-fileupload', 'ConfiguratorController@upload');
Route::post('/skateboard-deck-configurator', 'ConfiguratorController@store');

Route::get('/skateboard-deck-manufacturer', 'ManufacturerController@index')->name('skateboard.manufacturer');
Route::get('/export_csv','SummaryController@exportcsv')->name('export.invoice');
Route::get('/export_csv/{id}','SummaryController@exportcsvbyid')->name('export.csv.id');
Route::get('/submit_order','SummaryController@submitOrder')->name('orders.submit');
Route::get('/save_order', 'SummaryController@saveOrder');
Route::get('/remove_saveorder/{id}','SummaryController@removeOrder');
Route::get('/getdata','HomeController@getData');




Route::get('/summary', 'SummaryController@index')->name('summary');
Route::get('/summary/{id}', 'SummaryController@load');
Route::get('/summary/view/{id}', 'SummaryController@view');
Route::get('/imprint', 'ImprintController@index');
Route::get('/affiliate','AffiliateController@index');
Route::get('/newsletter','NewsController@index');
Route::get('/blogpost1', function() { return view('blogpost1');});
/**
 * Membership
 */
Route::group(['as' => 'protection.'], function () {
    Route::get('membership', 'MembershipController@index')->name('membership')->middleware('protection:' . config('protection.membership.product_module_number') . ',protection.membership.failed');
    Route::get('membership/access-denied', 'MembershipController@failed')->name('membership.failed');
    Route::get('membership/clear-cache/', 'MembershipController@clearValidationCache')->name('membership.clear_validation_cache');
});

Route::group(['prefix' => 'blog', 'as' => 'blog.', 'middleware' => 'auth'], function () {
    Route::get('/', 'BlogController@index')->name('index');
    Route::get('/create', 'BlogController@create')->name('create');
    Route::get('/{post}', 'BlogController@show')->name('show');
    Route::post('/', 'BlogController@store')->name('store');
});
