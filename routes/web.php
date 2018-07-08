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

Route::get('/', function () {
    abort(404);
});

Auth::routes();

// Auth
Route::group(['prefix' => 'auth'], function () {
    Route::name('auth.')->group(function() {
        Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
        Route::get('logout', 'Auth\LoginController@logout')->name('logout');
        
        Route::post('authenticate', 'Auth\LoginController@authenticate')->name('authenticate');
        Route::get('showLinkRequestForm', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('passwords.request.form');
        Route::post('sendResetLinkEmail', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.send.link');
        Route::get('showResetForm/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset.form');
        Route::post('reset', 'Auth\ResetPasswordController@reset')->name('password.reset');
        
        Route::get('singup', 'Auth\RegisterController@showRegistrationForm')->name('signup');
        Route::get('singup/success', 'Auth\RegisterController@registerSuccess')->name('signup.success');
        Route::get('singup/confirm/{id}', 'Auth\RegisterController@confirmRegister')->name('signup.confirm');
        Route::get('singup/confirm-fail', 'Auth\RegisterController@confirmFail')->name('signup.confirm.fail');
        Route::get('singup/confirm-success', 'Auth\RegisterController@confirmSuccess')->name('signup.confirm.success');
        Route::post('register', 'Auth\RegisterController@register')->name('register');
        Route::post('check_email', 'Auth\RegisterController@checkMail')->name('check.email');
        
        Route::get('redirect/{cms_name}', 'Auth\RegisterController@redirectConfirm')->name('signup.redirect');
    });
});

// Auth
Route::group([], function () {
    
    $urlCmsName = request()->segment(count(request()->segments()));
    
    $authenUser = \App\User::select('cms_name')->get()->pluck('cms_name')->toArray();
    $userAuth = Request::segment(1);
    
    if($urlCmsName != 'auth' && in_array($urlCmsName, $authenUser)) {
        $userAuth = $urlCmsName;
    }
    Route::prefix($userAuth)->group(function() {
        $urlCmsName = request()->segment(count(request()->segments()));
        $authenUser = \App\User::select('cms_name')->get()->pluck('cms_name')->toArray();
        $userAuth = Request::segment(1);
        if($urlCmsName != 'auth' && in_array($urlCmsName, $authenUser)) {
            $userAuth = $urlCmsName;
        }
        Route::name($userAuth . '.')->group(function() {
            $folder = 'Auth';
            Route::get('login', $folder . '\LoginController@showLoginForm')->name('login');
            Route::get('logout', $folder . '\LoginController@logout')->name('logout');
            Route::post('authenticate', $folder . '\LoginController@authenticate')->name('authenticate');
            Route::get('showLinkRequestForm', $folder . '\ForgotPasswordController@showLinkRequestForm')->name('passwords.request.form');
            Route::post('sendResetLinkEmail', $folder . '\ForgotPasswordController@sendResetLinkEmail')->name('password.send.link');
            Route::get('showResetForm/{token}', $folder . '\ResetPasswordController@showResetForm')->name('password.reset.form');
            Route::post('reset', $folder . '\ResetPasswordController@reset')->name('password.reset');
            
            Route::get('singup', $folder . '\RegisterController@showRegistrationForm')->name('signup');
            Route::get('singup/success', $folder . '\RegisterController@registerSuccess')->name('signup.success');
            Route::get('singup/confirm/{id}', $folder . '\RegisterController@confirmRegister')->name('signup.confirm');
            Route::get('singup/confirm-fail', $folder . '\RegisterController@confirmFail')->name('signup.confirm.fail');
            Route::get('singup/confirm-success', $folder . '\RegisterController@confirmSuccess')->name('signup.confirm.success');
            Route::post('register', $folder . '\RegisterController@register')->name('register');
            Route::post('check_email', $folder . '\RegisterController@checkMail')->name('check.email');
            
            Route::get('dashboard', 'Cms\CmsController@dashboard')->name('cms.dashboard');
        });
    });
});


Route::get('/login', function () {
    abort(404);
});
    
