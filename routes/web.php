<?php

use Illuminate\Support\Facades\Route;



use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudyPlanController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\MaterialsController;


// ========== PUBLIC PAGES ==========
Route::get('/', [HomeController::class, 'index']);
Route::get('/about-us', [HomeController::class, 'about_us']);
Route::get('/contact-us', [HomeController::class, 'contact_us']);
Route::get('/features', [HomeController::class, 'feature']);


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])
    ->middleware('throttle:6,1')
    ->name('login.post');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])
    ->middleware('throttle:6,1')
    ->name('register.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// adminroute

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashController::class, 'Index'])->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Study Plan
    Route::get('/study-plan', [StudyPlanController::class, 'index'])->name('study-plan');
    Route::post('/study-plan', [StudyPlanController::class, 'store'])->name('study-plan.store');
    Route::get('/generate-new-plan', [StudyPlanController::class, 'generate_new_plan'])->name('study-plan.generate');
    Route::put('/study-plan/{id}', [StudyPlanController::class, 'update'])->name('study-plan.update');
    Route::delete('/study-plan/{id}', [StudyPlanController::class, 'destroy'])->name('study-plan.destroy');

    // Progress
    Route::get('/progress', [ProgressController::class, 'index'])->name('progress');
    Route::post('/progress', [ProgressController::class, 'store'])->name('progress.store');
    Route::get('/progress/export', [ProgressController::class, 'export'])->name('progress.export');
    // Materials
    Route::get('/materials', [MaterialsController::class, 'index'])->name('materials');
    Route::post('/materials', [MaterialsController::class, 'store'])->name('materials.store');
    Route::delete('/materials/{id}', [MaterialsController::class, 'destroy'])->name('materials.destroy');
    Route::get('/materials/download/{id}', [MaterialsController::class, 'download'])->name('materials.download');

    // Settings
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::put('/settings/password', [SettingsController::class, 'updatePassword'])->name('settings.password');
    Route::put('/settings/notifications', [SettingsController::class, 'updateNotifications'])->name('settings.notifications');
    Route::put('/settings/privacy', [SettingsController::class, 'updatePrivacy'])->name('settings.privacy');
    Route::put('/settings/preferences', [SettingsController::class, 'updatePreferences'])->name('settings.preferences');
    Route::put('/settings/study', [SettingsController::class, 'updateStudy'])->name('settings.study');
    Route::delete('/settings/account', [SettingsController::class, 'deleteAccount'])->name('settings.account.delete');
});



