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

Route::get('/', 'HomeController@index')->name('home');

/**
 * Register the typical authentication routes for an application.
 * Replacing: Auth::routes();
 */
Route::group(['namespace' => 'Auth'], function () {
    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');

    // Registration Routes...
        Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'RegisterController@register');

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');

    if (config('adminlte.impersonate')) {
        /**
         * Impersonate User. Requires authentication.
         */
        Route::post('impersonate/{id}', 'ImpersonateController@impersonate')->name('impersonate');
        /**
         * Stop Impersonate. Requires authentication.
         */
        Route::get('impersonate/stop', 'ImpersonateController@stopImpersonate')->name('impersonate.stop');
    }
});

// Redirect to /dashboard
Route::get('/home', 'HomeController@index')->name('home');

/**
 * Requires authentication.
 */
Route::group(['middleware' => 'auth'], function () {
    /**
     * Dashboard. Common access.
     * // Matches The "/dashboard/*" URLs
     */
    Route::group(['prefix' => 'dashboard', 'namespace' => 'Dashboard', 'as' => 'dashboard::'], function () {
        /**
         * Dashboard Index
         * // Route named "dashboard::index"
         */
        Route::get('/', ['as' => 'index', 'uses' => 'IndexController@index']);

        /**
         * Profile
         * // Route named "dashboard::profile"
         */
        Route::get('profile', ['as' => 'profile', 'uses' => 'ProfileController@showProfile']);
        Route::post('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@updateProfile']);
    });

    /**
     * // Matches The "/admin/*" URLs
     */
    Route::group(['prefix' => 'cks-admin', 'namespace' => 'Admin', 'as' => 'admin::'], function () {
        Route::group(['middleware' => 'admin'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'IndexController@index']);
            Route::resource('users', 'UsersController');

            Route::group(['prefix' => 'category'], function(){
                Route::get('list', 'CategoryController@index');
                Route::get('add', 'CategoryController@getAdd');
                Route::post('add', 'CategoryController@postAdd');
                Route::get('edit/{id}', 'CategoryController@getEdit');
                Route::post('edit/{id}', 'CategoryController@postEdit');
                Route::post('delete', 'CategoryController@delete');
            });
            Route::group(['prefix' => 'post'], function(){
                Route::get('list', 'PostController@index');
                Route::get('add', 'PostController@getAdd');
                Route::post('add', 'PostController@postAdd');
                Route::get('edit/{id}', 'PostController@getEdit');
                Route::post('edit/{id}', 'PostController@postEdit');
                Route::post('delete', 'PostController@delete');
            });
        });
    });

});

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/{slug}', 'HomeController@category');
Route::get('/post-detail/{slug}', 'HomeController@post');