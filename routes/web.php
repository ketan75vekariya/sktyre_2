<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Backend\AdminHomeController;
use App\Http\Controllers\Backend\AdminServiceController;
use App\Http\Controllers\Backend\AdminAboutController;
use App\Http\Controllers\Backend\AdminTestimonialController;
use App\Http\Controllers\Backend\AdminCompanyController;
use App\Http\Controllers\Backend\AdminMessageController;
use App\Http\Controllers\Backend\AdminTeamController;
use App\Http\Controllers\Backend\AdminAuthController;


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
});
Route::controller(AboutController::class)->group(function () {
    Route::get('/about', 'index');
});
Route::controller(ServiceController::class)->group(function () {
    Route::get('/service', 'index');
    Route::get('/service/{id}','singleService')->name('service.singleService');
});
Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'index')->name('contact.index');;
    Route::post('/contact', 'store')->name('contact.store');
});



Route::prefix('administration')->group(function () {
    Route::controller(AdminHomeController::class)->group(function () {
        Route::get('/home', 'index');
    });
    Route::controller(AdminAboutController::class)->group(function () {
        Route::get('/about', 'index')->name('about.index');
        Route::get('/about/{id}','edit')->name('about.edit');
        Route::put('/about','update')->name('about.update');
    });
    Route::controller(AdminCompanyController::class)->group(function () {
        Route::get('/company', 'index')->name('company.index');
        Route::get('/company/{id}','edit')->name('company.edit');
        Route::put('/company','update')->name('company.update');
    });
    Route::controller(AdminServiceController::class)->group(function () {
        Route::get('/service', 'index')->name('service.index');
        Route::post('/service', 'store')->name('service.store');
        Route::get('/service/{id}','edit')->name('service.edit');
        Route::put('/service','update')->name('service.update');
        Route::delete('/service','destroy')->name('service.delete');
    });
    Route::controller(AdminTestimonialController::class)->group(function () {
        Route::get('/testimonial', 'index')->name('testimonial.index');
        Route::post('/testimonial', 'store')->name('testimonial.store');
        Route::get('/testimonial/{id}', 'edit')->name('testimonial.edit');
        Route::put('/testimonial', 'update')->name('testimonial.update');
        Route::delete('/testimonial', 'destroy')->name('testimonial.delete');
    });
    Route::controller(AdminMessageController::class)->group(function () {
        Route::get('/message', 'index')->name('message.index');
        Route::post('/message', 'store')->name('message.store');
        Route::get('/message/{id}','edit')->name('message.edit');
        Route::put('/message','update')->name('message.update');
        Route::delete('/message','destroy')->name('message.delete');
    });
    Route::controller(AdminTeamController::class)->group(function () {
        Route::get('/team', 'index')->name('team.index');
        Route::post('/team', 'store')->name('team.store');
        Route::get('/team/{id}','edit')->name('team.edit');
        Route::put('/team','update')->name('team.update');
        Route::delete('/team','destroy')->name('team.delete');
    });
    Route::controller(AdminAuthController::class)->group(function () {
        Route::match(['GET','POST'], 'register', 'register')->name('register');
        Route::get('/login', 'login')->name('login');
        Route::match(['GET','POST'], 'profile', 'profile')->name('profile');
        Route::get('/logout', 'logout')->name('logout');

    });
    // Route::controller(AdminUserController::class)->group(function () {
    //     Route::get('/user', 'index');
    //     Route::post('/user','addUser')->name('addUser');
    // });
    // Route::controller(AdminLoginController::class)->group(function () {
    //     Route::get('/login', 'index');
    // });
});