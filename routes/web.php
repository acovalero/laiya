<?php
Route::get('/', function () {
    // @if(Auth::user()->role_id == 1){}
    return redirect('/admin/home');
    // @elseif(Auth::user()->role_id == 2)
    // return redirect('/marketingDashboard');
    // @endif
});


// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    Route::get('/marketingDashboard', 'MarketingController@index');

    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);

    Route::resource('countries', 'Admin\CountriesController');
    Route::post('countries_mass_destroy', ['uses' => 'Admin\CountriesController@massDestroy', 'as' => 'countries.mass_destroy']);
    Route::post('countries_restore/{id}', ['uses' => 'Admin\CountriesController@restore', 'as' => 'countries.restore']);
    Route::delete('countries_perma_del/{id}', ['uses' => 'Admin\CountriesController@perma_del', 'as' => 'countries.perma_del']);

    Route::resource('customers', 'Admin\CustomersController');
    Route::post('customers_mass_destroy', ['uses' => 'Admin\CustomersController@massDestroy', 'as' => 'customers.mass_destroy']);
    Route::post('customers_restore/{id}', ['uses' => 'Admin\CustomersController@restore', 'as' => 'customers.restore']);
    Route::delete('customers_perma_del/{id}', ['uses' => 'Admin\CustomersController@perma_del', 'as' => 'customers.perma_del']);

    Route::resource('rooms', 'Admin\RoomsController');
    Route::post('rooms_mass_destroy', ['uses' => 'Admin\RoomsController@massDestroy', 'as' => 'rooms.mass_destroy']);
    Route::post('rooms_restore/{id}', ['uses' => 'Admin\RoomsController@restore', 'as' => 'rooms.restore']);
    Route::delete('rooms_perma_del/{id}', ['uses' => 'Admin\RoomsController@perma_del', 'as' => 'rooms.perma_del']);

    Route::resource('inquiries', 'Admin\InquiriesController', ['except' => 'inquiries.create']);
    Route::get('inquiries/create/', ['as' => 'inquiries.create', 'uses' => 'Admin\InquiriesController@create']);
    Route::post('inquiries_mass_destroy', ['uses' => 'Admin\InquiriesController@massDestroy', 'as' => 'inquiries.mass_destroy']);
    Route::post('inquiries_restore/{id}', ['uses' => 'Admin\InquiriesController@restore', 'as' => 'inquiries.restore']);
    Route::delete('inquiries_perma_del/{id}', ['uses' => 'Admin\InquiriesController@perma_del', 'as' => 'inquiries.perma_del']);

    Route::resource('bookings', 'Admin\BookingsController', ['except' => 'bookings.create']);
    Route::get('bookings/create/', ['as' => 'bookings.create', 'uses' => 'Admin\BookingsController@create']);
    Route::post('bookings_mass_destroy', ['uses' => 'Admin\BookingsController@massDestroy', 'as' => 'bookings.mass_destroy']);
    Route::post('bookings_restore/{id}', ['uses' => 'Admin\BookingsController@restore', 'as' => 'bookings.restore']);
    Route::delete('bookings_perma_del/{id}', ['uses' => 'Admin\BookingsController@perma_del', 'as' => 'bookings.perma_del']);


    Route::resource('quotations', 'Admin\QuotationsController', ['except' => 'quotations.create']);
    Route::get('quotations/create/', ['as' => 'quotations.create', 'uses' => 'Admin\QuotationsController@create']);
    Route::post('quotations_mass_destroy', ['uses' => 'Admin\QuotationsController@massDestroy', 'as' => 'quotations.mass_destroy']);
    Route::post('quoatations_restore/{id}', ['uses' => 'Admin\QuotationsController@restore', 'as' => 'quotations.restore']);
    Route::delete('quotations_perma_del/{id}', ['uses' => 'Admin\QuotationsController@perma_del', 'as' => 'quotations.perma_del']);

    Route::resource('fees', 'Admin\FeesController', ['except' => 'fees.create']);
    Route::get('fees/create/', ['as' => 'fees.create', 'uses' => 'Admin\FeesController@create']);
    Route::post('fees_mass_destroy', ['uses' => 'Admin\FeesController@massDestroy', 'as' => 'fees.mass_destroy']);
    Route::post('fees_restore/{id}', ['uses' => 'Admin\FeesController@restore', 'as' => 'fees.restore']);
    Route::delete('fees_perma_del/{id}', ['uses' => 'Admin\FeesController@perma_del', 'as' => 'fees.perma_del']);


    //Route::resource('/find_rooms', 'Admin\FindRoomsController', ['except' => 'create']);
    Route::get('/find_rooms', 'Admin\FindRoomsController@index')->name('find_rooms.index');
    Route::post('/find_rooms', 'Admin\FindRoomsController@index');
    /*Route::get('/inquiries/create/', [
        'as' => 'find_rooms.create',
        'uses' => 'Admin\InquiriesController@create'
    ]);*/

    Route::resource('room_types', 'Admin\RoomTypesController');
    //Route::get('inquiries/create/', ['as' => 'inquiries.create', 'uses' => 'Admin\InquiriesController@create']);
    Route::post('room_types_mass_destroy', ['uses' => 'Admin\RoomTypesController@massDestroy', 'as' => 'room_types.mass_destroy']);
    Route::post('room_types_restore/{id}', ['uses' => 'Admin\RoomTypesController@restore', 'as' => 'room_types.restore']);
    Route::delete('room_types_perma_del/{id}', ['uses' => 'Admin\RoomTypesController@perma_del', 'as' => 'room_types.perma_del']);
});

// Route::group(['middleware' => ['auth'], 'prefix' => 'marketing', 'as' => 'marketing.'], function () {
//     Route::get('/marketingDashboard', 'MarketingController@index');

//     Route::resource('customers', 'Admin\CustomersController');
//     Route::post('customers_mass_destroy', ['uses' => 'Admin\CustomersController@massDestroy', 'as' => 'customers.mass_destroy']);
//     Route::post('customers_restore/{id}', ['uses' => 'Admin\CustomersController@restore', 'as' => 'customers.restore']);
//     Route::delete('customers_perma_del/{id}', ['uses' => 'Admin\CustomersController@perma_del', 'as' => 'customers.perma_del']);
// });
