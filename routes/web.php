<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');


    Route::get('/redirect', 'SocialAuthController@redirect');

    Route::get('/callback', 'SocialAuthController@callback');

    // Auth::routes();  // Estas son las que Auth::routes() trae por defecto -----------------------
    // ubicada en Illuminate\Routing\   Auth - Router

    // Authentication Routes...
    $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
    $this->post('login', 'Auth\LoginController@login');
    $this->post('logout', 'Auth\LoginController@logout')->name('logout');

    // Registration Routes...
    $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    $this->get('confirmation/{token}', 'Auth\RegisterController@getConfirmation')->name('confirmation');
    $this->post('register', 'Auth\RegisterController@register');

    // Password Reset Routes...
    $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
    $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
    $this->post('password/reset', 'Auth\ResetPasswordController@reset');

    // ---------------------------------------------------------------------- FIN Auth::routes()------

    Route::get('/home', 'HomeController@index')->name('home');


});
Route::group(['middleware' => 'auth'], function () {

    Route::get('account', function () {
        return view('account');
    });

    Route::get('account/password', 'AccountController@getPassword')->name('changePassword');
    Route::post('account/password', 'AccountController@postPassword')->name('postPassword');

    Route::get('account/edit-profile', 'AccountController@EditProfile')->name('editProfile');
    Route::put('account/edit-profile', 'AccountController@UpdateProfile')->name('updateProfile');

    Route::group(['middleware' => 'verified'], function() {

        // RUTAS PARA DEVICES, AGREGAR, ALMACENAR, EDITAR Y BORRAR.
        Route::get('devices/index', 'DeviceController@indexDevice')->name('indexDevice');
        Route::get('devices/add', 'DeviceController@createDevice')->name('createDevice');
        Route::post('devices/add', 'DeviceController@storeDevice')->name('storeDevice');
        Route::get('devices/edit/{id}', 'DeviceController@editDevice')->name('editDevice');
        Route::put('devices/edit/{id}', 'DeviceController@updateDevice')->name('updateDevice');
        Route::get('devices/delete/{id}', 'DeviceController@deleteDevice')->name('deleteDevice');
        Route::delete('devices/delete/{id}', 'DeviceController@destroyDevice')->name('destroyDevice');

        // RUTAS PARA DEPARTMENTS, AGREGAR, ALMACENAR, EDITAR Y BORRAR.
        Route::get('departments/index', 'DepartmentController@indexDepartment')->name('indexDepartment');
        Route::get('departments/add', 'DepartmentController@createDepartment')->name('createDepartment');
        Route::post('departments/add', 'DepartmentController@storeDepartment')->name('storeDepartment');
        Route::get('departments/edit/{id}', 'DepartmentController@editDepartment')->name('editDepartment');
        Route::put('departments/edit/{id}', 'DepartmentController@updateDepartment')->name('updateDepartment');
        Route::get('departments/delete/{id}', 'DepartmentController@deleteDepartment')->name('deleteDepartment');
        Route::delete('departments/delete/{id}', 'DepartmentController@destroyDepartment')->name('destroyDepartment');

        // RUTAS PARA STATUS, AGREGAR, ALMACENAR, EDITAR Y BORRAR.
        Route::get('status/index', 'StatusController@indexStatus')->name('indexStatus');
        Route::get('status/add', 'StatusController@createStatus')->name('createStatus');
        Route::post('status/add', 'StatusController@storeStatus')->name('storeStatus');
        Route::get('status/edit/{id}', 'StatusController@editStatus')->name('editStatus');
        Route::put('status/edit/{id}', 'StatusController@updateStatus')->name('updateStatus');
        Route::get('status/delete/{id}', 'StatusController@deleteStatus')->name('deleteStatus');
        Route::delete('status/delete/{id}', 'StatusController@destroyStatus')->name('destroyStatus');
        Route::post('publish', function() {

            $data = Request::all();
            return $data;
            //return response()->json($data);  // devuelve un json
        });

        Route::group(['middleware' => 'role:admin'], function() {
            Route::get('admin/settings', function () {
                return view('admin/settings');
            });
        });

        Route::group(['middleware' => 'role:editor'], function() {
            Route::get('admin/posts', function () {
                return view('admin/posts');
            });
        });

    });



});
