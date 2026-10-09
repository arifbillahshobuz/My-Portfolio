<?php

use App\Http\Controllers\Api\Admin\BlogController;
use App\Http\Controllers\Api\Admin\ContactController;
use App\Http\Controllers\Api\Admin\EducationController;
use App\Http\Controllers\Api\Admin\ExperienceController;
use App\Http\Controllers\Api\Admin\HeroController;
use App\Http\Controllers\Api\Admin\ProjectController;
use App\Http\Controllers\Api\Admin\UserController;
use App\Http\Controllers\Api\Admin\UserProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserInterface\Auth\AuthenticationController;
use App\Http\Controllers\Api\Admin\ServiceController;
use App\Http\Controllers\Api\Admin\SkillController;
use App\Http\Controllers\Api\Admin\TestimonialController;
use App\Http\Controllers\Api\UserInterface\HeroController as UserInterfaceHeroController;
use App\Http\Controllers\Api\UserInterface\ServiceController as UserInterfaceServiceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// API Routes
Route::post('/user-registration', [UserController::class, 'userRegistration']);
Route::post('/user-login', [AuthenticationController::class, 'userLogin']);
Route::post('/send-otp', [AuthenticationController::class, 'userSendOTP']);
Route::get('/hero', [UserInterfaceHeroController::class, 'hero']);
Route::get('/service',[UserInterfaceServiceController::class, 'service']);
Route::get('/download-cv', [UserInterfaceHeroController::class, 'downloadCV'])->name('cv.download');



Route::middleware(['apiTokenverification'])->group(function () {
    //AUTH ROUTES
    Route::controller(AuthenticationController::class)->group(function () {
        Route::post('/verify-otp', 'userVerifyOTP');
        Route::post('/reset-password', 'userResetPassword');
        Route::post('/logout', [AuthenticationController::class, 'userLogout'])->name('Logout');
    });
    //USER ROUTES
    Route::controller(UserController::class)->prefix('users')->group(function () {
        Route::get('/list', 'userList');
        Route::put('/update', 'updateUser');
        Route::delete('/destroy', 'deleteUser');
    });
    //USER PROFILE ROUTES
    Route::controller(UserProfileController::class)->prefix('user-profile')->group(function () {
        Route::get('/', 'userProfile');
        Route::post('/update', 'update');
    });
    //SERVICE ROUTES
    Route::controller(ServiceController::class)->prefix('services')->group(function () {
        Route::get('/list', 'list');
        Route::post('/store', 'store');
        Route::put('/update', 'update');
        Route::delete('/destroy', 'delete');
    });
    //PROJECT ROUTES
    Route::controller(ProjectController::class)->prefix('projects')->group(function () {
        Route::get('/list', 'list');
        Route::post('/store', 'store');
        Route::put('/update', 'update');
        Route::delete('/destroy', 'delete');
    });
    //EXPERIENCE ROUTES
    Route::controller(ExperienceController::class)->prefix('experiences')->group(function () {
        Route::get('/list', 'list');
        Route::post('/store', 'store');
        Route::put('/update', 'update');
        Route::delete('/destroy', 'delete');
    });
    //EDUCATIONS ROUTES
    Route::controller(EducationController::class)->prefix('education')->group(function () {
        Route::get('/list', 'list');
        Route::post('/store', 'store');
        Route::put('/update', 'update');
        Route::delete('/destroy', 'delete');
    });
    //SKILL ROUTES
    Route::controller(SkillController::class)->prefix('skills')->group(function () {
        Route::get('/list', 'list');
        Route::post('/store', 'store');
        Route::put('/update', 'update');
        Route::delete('/destroy', 'delete');
    });
    //TESTIMONIAL ROUTES
    Route::controller(TestimonialController::class)->prefix('testimonials')->group(function () {
        Route::get('/list', 'list');
        Route::post('/store', 'store');
        Route::put('/update', 'update');
        Route::delete('/destroy', 'delete');
    });
    //BLOG ROUTES
    Route::controller(BlogController::class)->prefix('blogs')->group(function () {
        Route::get('/list', 'list');
        Route::post('/store', 'store');
        Route::put('/update', 'update');
        Route::delete('/destroy', 'delete');
    });
    //CONTACT ROUTES
    Route::controller(ContactController::class)->prefix('contacts')->group(function () {
        Route::get('/list', 'list');
        Route::post('/store', 'store');
        Route::put('/update', 'update');
        Route::delete('/destroy', 'delete');
    });
    //HERO ROUTES
    Route::controller(HeroController::class)->prefix('hero')->group(function () {
        Route::get('/list', 'index');
        Route::post('/store', 'store');
        Route::put('/update', 'update');
        Route::delete('/destroy', 'delete');
    });
});
