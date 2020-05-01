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
    Route::get('userdata', 'DashboardController@getUserdata')->name('userdata');
    Route::post('userdata', 'DashboardController@getUserdata');
    Route::get('submitorder', 'DashboardController@getSubmitOrder')->name('submitorder');
    Route::post('submitorder', 'DashboardController@getSubmitOrder');
    Route::get('deleteorder/{id}', 'DashboardController@deleteSubmitOrder')->name('deleteorder');
    Route::get('savedorder', 'DashboardController@getSavedOrder')->name('savedorder');
    Route::post('savedorder', 'DashboardController@getSavedOrder');
    Route::get('savedbatch', 'DashboardController@getSavedBatches')->name('savedbatch');
    Route::post('savedbatch', 'DashboardController@getSavedBatches');
    Route::get('analystic', 'DashboardController@getAnalystic')->name('analystic');
    Route::post('analystic', 'DashboardController@getAnalystic');
    Route::get('uploadfile', 'DashboardController@getUploadFiles')->name('uploadfile');
    Route::post('uploadfile', 'DashboardController@getUploadFiles');
    Route::get('production', 'DashboardController@getProduction')->name('production');
    Route::post('production', 'DashboardController@getProduction');
    Route::get('summary', 'DashboardController@getSummary')->name('summary');
    Route::post('summary', 'DashboardController@getSummary');
    Route::get('action', 'DashboardController@getAction')->name('action');
    Route::post('action', 'DashboardController@getAction');
    Route::post('add-upload-data', 'DashboardController@addUpload');
    Route::post('delete-upload-data', 'DashboardController@deleteUpload');
    Route::post('delete-upload-data', 'DashboardController@deleteUpload');

});


Route::get('/', 'HomeController@index')->name('index');
Route::get('/testlink', 'HomeController@downBooksView')->name('testlink');
Route::post('/bookdown', 'HomeController@downBooks');
Route::get('/inquiries', 'InquiriesController@index')->name('inquiries');
Route::post('/inquiries', 'InquiriesController@submit');
Route::get('/inquirieschoice', 'InquirieschoiceController@index')->name('inquirieschoice');
Route::get('/mail', 'ContactController@index')->name('mail');


Route::get('/inquiriesprivate', 'InquiriesprivateController@index')->name('inquiriesprivate');
Route::post('/inquiriesprivate', 'InquiriesprivateController@submit');
Route::get('/samplesets', 'SamplesetsController@index')->name('samplesets');
Route::get('/mockup', 'MockupController@index')->name('mockup');
Route::get('/book', 'BookController@index')->name('book');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::post('/add_summary', 'SummaryController@addFromBatch');
Route::post('/detail_save', 'ProfileController@saveDetails');
Route::post('/address_save', 'ProfileController@store_address');
Route::post('/production_filter', 'ProfileController@production_filter');
Route::get('/recent-file', 'ProfileController@getRecentFileByName');

Route::get('/skateboard-deck-configurator', 'ConfiguratorController@index')->name('get.skateboard.configurator');
Route::get('/skateboard-deck-configurator/{id}', 'ConfiguratorController@show')->name('show.skateboard.configurator');
Route::get('/skateboard-deck-configurator-save/{id}', 'ConfiguratorController@save')->name('show.skateboard.save');
Route::post('/skateboard-deck-configurator/{id}/copy', 'ConfiguratorController@copy')->name('copy.skateboard.configurator');
Route::get('/skateboard-remove/{id}', 'ConfiguratorController@delete')->name('delete.skateboard.configurator');
Route::post('/skateboard-deck-configurator', 'ConfiguratorController@store');

Route::get('/getdesign','ConfiguratorController@getdesign');
Route::post('/configurator-fileupload', 'ConfiguratorController@upload');

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
Route::get('/ordersuccess', 'OrdersuccessController@index')->name('ordersuccess');
Route::get('/affiliate','AffiliateController@index');
Route::get('/newsletter','NewsController@index')->name('newsletter');
Route::get('/samples','SamplesController@index')->name('samples');
Route::get('/about','AboutController@index')->name('about');
Route::get('/skateboardfaq','SkateboardFAQController@index')->name('skateboardfaq');
Route::get('/invest','investController@index')->name('invest');
Route::get('/other','otherController@index')->name('other');

Route::get('/skateboard-griptape-manufacturer', 'GripTapeConfigurator@manufacturer')->name('griptape.manufacturer');
Route::get('/grip-tape-configurator', 'GripTapeConfigurator@index')->name('griptape.index');
Route::post('/grip-tape-configurator', 'GripTapeConfigurator@store')->name('griptape.store');
Route::get('/grip-tape-configurator/{id}', 'GripTapeConfigurator@show')->name('griptape.show');
Route::get('/grip-tape-save/{id}', 'GripTapeConfigurator@save')->name('griptape.save');
Route::get('/grip-tape-remove/{id}', 'GripTapeConfigurator@destroy')->name('griptape.destroy');
Route::post('/grip-tape-configurator/{id}/copy', 'GripTapeConfigurator@copy')->name('griptape.copy');

/**
 * WHEELS CONFIGURATOR
 */
Route::group(['as' => 'wheels.'], function () {
    Route::get('/skateboard-wheels-manufacturer', 'WheelController@manufacturer')->name('manufacturer');
    Route::get('/skateboard-wheels-configurator', 'WheelController@configurator')->name('configurator');
    Route::get('/skateboard-wheels-configurator/{id}', 'WheelController@show')->name('configurator.show');
    Route::get('/skateboard-wheels-save/{id}', 'WheelController@save')->name('configurator.save');
    Route::post('/skateboard-wheels-configurator', 'WheelController@storeConfigurator')->name('configurator.store');
    Route::post('/skateboard-wheels-configurator/{id}', 'WheelController@updateConfigurator')->name('configurator.update');
    Route::get('/skateboard-wheels-remove/{id}/', 'WheelController@destroy')->name('configurator.delete');
    Route::post('/skateboard-wheels-configurator/{id}/copy', 'WheelController@copy')->name('configurator.copy');
});

Route::group(['as' => 'transfers.'], function () {
    Route::get('/transfers-manufacturer', 'TransferController@manufacturer')->name('manufacturer');
    Route::get('/transfers-configurator', 'TransferController@configurator')->name('configurator');
    Route::get('/transfers-configurator/{id}', 'TransferController@show')->name('show');
    Route::put('/transfers-configurator/{id}', 'TransferController@update')->name('update');
    Route::post('/transfers-configurator/{id}/copy', 'TransferController@copy')->name('copy');
    Route::get('/transfers-remove/{id}', 'TransferController@destroy')->name('destroy');
    Route::post('/transfers-save/{id}', 'TransferController@save')->name('save');
    Route::post('/transfers-configurator', 'TransferController@store')->name('configurator.store');
    Route::post('/transfers-configurator-upload', 'TransferController@uploadFile')->name('upload');
});

/**
 * Membership
 */
Route::group(['as' => 'protection.'], function () {
    Route::get('membership', 'MembershipController@index')->name('membership')->middleware('protection:' . config('protection.membership.product_module_number') . ',protection.membership.failed');
    Route::get('membership/access-denied', 'MembershipController@failed')->name('membership.failed');
    Route::get('membership/clear-cache/', 'MembershipController@clearValidationCache')->name('membership.clear_validation_cache');
});


Route::get('/sbblog', 'SbblogController@index')->name('sbblog');

Route::group(['prefix' => 'blog', 'as' => 'blog.', 'middleware' => 'auth'], function () {
    // Route::get('/', 'BlogController@index')->name('index');

    Route::get('/create', 'BlogController@create')->name('create');
    Route::post('/', 'BlogController@store')->name('store');
    Route::delete('/{post}', 'BlogController@destroy')->name('destroy');
    Route::get('/{post}/edit', 'BlogController@edit')->name('edit');
    Route::put('/{post}', 'BlogController@update')->name('update');
});
Route::get('/blog/{id}', 'BlogController@show')->name('blog.show');

Route::post('/vendor-code', 'SummaryController@applyPromocode')->name('vendor.code.apply');

Route::get('/clickevent', 'SamplesController@mouseClicked')->name('clickevent');



