<?php

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\AchievementController;
use App\Http\Controllers\Admin\ContactMessageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::post('/contact', [PortfolioController::class, 'contactSubmit'])->name('contact.submit');
Route::get('/sitemap.xml', [PortfolioController::class, 'sitemap'])->name('sitemap');
Route::get('/robots.txt', [PortfolioController::class, 'robots'])->name('robots');

/*
|--------------------------------------------------------------------------
| Admin Auth Routes
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('login'); // 'login' is used by built-in auth middleware redirects
Route::get('/admin/login-portal', [AuthController::class, 'showLoginForm'])->name('admin.login'); // alias
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

/*
|--------------------------------------------------------------------------
| Admin Dashboard & CRUD Group (Protected by Auth)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->group(function () {
    // Dashboard index
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Site settings & Profile management
    Route::get('/profile', [ProfileController::class, 'index'])->name('admin.profile');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('admin.profile.update');

    // Contact message inbox
    Route::get('/messages', [ContactMessageController::class, 'index'])->name('admin.messages.index');
    Route::get('/messages/{message}', [ContactMessageController::class, 'show'])->name('admin.messages.show');
    Route::delete('/messages/{message}', [ContactMessageController::class, 'destroy'])->name('admin.messages.destroy');

    // Resource CRUD routes
    Route::resource('skills', SkillController::class)->names('admin.skills');
    Route::resource('experiences', ExperienceController::class)->names('admin.experiences');
    Route::resource('projects', ProjectController::class)->names('admin.projects');
    Route::resource('certificates', CertificateController::class)->names('admin.certificates');
    Route::resource('education', EducationController::class)->names('admin.education');
    Route::resource('achievements', AchievementController::class)->names('admin.achievements');
});
