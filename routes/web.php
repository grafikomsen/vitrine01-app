<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\ServicesController as AdminServicesController;
use App\Http\Controllers\admin\BlogController as AdminBlogController;
use App\Http\Controllers\admin\FaqController as AdminFaqController;
use App\Http\Controllers\admin\SettingController as AdminSettingController;
use App\Http\Controllers\admin\PageController as AdminPageController;
use App\Http\Controllers\admin\BannerController as AdminBannerController;
use App\Http\Controllers\admin\ParternController as AdminParternController;
use App\Http\Controllers\admin\TeamController as AdminTeamController;
use App\Http\Controllers\admin\TempImageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/services', [ServicesController::class, 'index'])->name('services');
Route::get('/services/detail/{id}', [ServicesController::class, 'detail'])->name('serviceDetail');
Route::get('/a-propos-de-nous', [AboutController::class, 'index'])->name('about');
Route::get('/faqs', [FaqController::class, 'index'])->name('faq');
Route::get('/realisations', [ProjetController::class, 'index'])->name('projets');
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
Route::get('/blogs/detail/{id}', [BlogController::class, 'detail'])->name('blogDetail');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
// SEND EMAIL
Route::post('/send-email', [ContactController::class, 'sendEmail'])->name('sentFormContact');

Route::group(['prefix' => 'admin'], function(){
    Route::group(['middleware' => 'admin.guest'], function(){
        Route::get('/login', [LoginController::class, 'index'])->name('admin.login');
        Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('admin.authenticate');
    });

    Route::group(['middleware' => 'admin.auth'], function(){
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/logout', [DashboardController::class, 'logout'])->name('admin.logout');

        //SERVICES
        Route::get('/services', [AdminServicesController::class, 'services'])->name('admin.services');
        Route::get('/services/create', [AdminServicesController::class, 'create'])->name('admin.services.create');
        Route::post('/services/store', [AdminServicesController::class, 'store'])->name('admin.services.store');
        Route::get('/services/edit/{id}', [AdminServicesController::class, 'edit'])->name('admin.services.edit');
        Route::put('/services/updated/{id}', [AdminServicesController::class, 'updated'])->name('admin.services.updated');
        Route::delete('/services/delete/{id}', [AdminServicesController::class, 'destroy'])->name('admin.services.delete');

        //BLOGS
        Route::get('/blogs', [adminBlogController::class, 'blogs'])->name('admin.blogs');
        Route::get('/blogs/create', [adminBlogController::class, 'create'])->name('admin.blogs.create');
        Route::post('/blogs/store', [adminBlogController::class, 'store'])->name('admin.blogs.store');
        Route::get('/blogs/edit/{id}', [adminBlogController::class, 'edit'])->name('admin.blogs.edit');
        Route::put('/blogs/updated/{id}', [adminBlogController::class, 'updated'])->name('admin.blogs.updated');
        Route::delete('/blogs/delete/{id}', [adminBlogController::class, 'destroy'])->name('admin.blogs.delete');

        //PARTNERS
        Route::get('/partners', [adminParternController::class, 'parterns'])->name('admin.partners');
        Route::get('/partners/create', [adminParternController::class, 'create'])->name('admin.partners.create');
        Route::post('/partners/store', [adminParternController::class, 'store'])->name('admin.partners.store');
        Route::get('/partners/edit/{id}', [adminParternController::class, 'edit'])->name('admin.partners.edit');
        Route::put('/partners/updated/{id}', [adminParternController::class, 'updated'])->name('admin.partners.updated');
        Route::delete('/partners/delete/{id}', [adminParternController::class, 'destroy'])->name('admin.partners.delete');

        //FAQS
        Route::get('/faqs', [adminFaqController::class, 'faqs'])->name('admin.faqs');
        Route::get('/faqs/create', [adminFaqController::class, 'create'])->name('admin.faqs.create');
        Route::post('/faqs/store', [adminFaqController::class, 'store'])->name('admin.faqs.store');
        Route::get('/faqs/edit/{id}', [adminFaqController::class, 'edit'])->name('admin.faqs.edit');
        Route::put('/faqs/updated/{id}', [adminFaqController::class, 'updated'])->name('admin.faqs.updated');
        Route::delete('/faqs/delete/{id}', [adminFaqController::class, 'destroy'])->name('admin.faqs.delete');

        //BANNERS
        Route::get('/banners', [adminBannerController::class, 'banners'])->name('admin.banners');
        Route::get('/banners/create', [adminBannerController::class, 'create'])->name('admin.banners.create');
        Route::post('/banners/store', [adminBannerController::class, 'store'])->name('admin.banners.store');
        Route::get('/banners/edit/{id}', [adminBannerController::class, 'edit'])->name('admin.banners.edit');
        Route::put('/banners/updated/{id}', [adminBannerController::class, 'updated'])->name('admin.banners.updated');
        Route::delete('/banners/delete/{id}', [adminBannerController::class, 'destroy'])->name('admin.banners.delete');

        //TEAMS
        Route::get('/teams', [adminTeamController::class, 'teams'])->name('admin.teams');
        Route::get('/teams/create', [adminTeamController::class, 'create'])->name('admin.teams.create');
        Route::post('/teams/store', [adminTeamController::class, 'store'])->name('admin.teams.store');
        Route::get('/teams/edit/{id}', [adminTeamController::class, 'edit'])->name('admin.teams.edit');
        Route::put('/teams/updated/{id}', [adminTeamController::class, 'updated'])->name('admin.teams.updated');
        Route::delete('/teams/delete/{id}', [adminTeamController::class, 'destroy'])->name('admin.teams.delete');

        //PAGES
        Route::get('/pages', [adminPageController::class, 'pages'])->name('admin.pages');
        Route::get('/pages/create', [adminPageController::class, 'create'])->name('admin.pages.create');
        Route::post('/pages/store', [adminPageController::class, 'store'])->name('admin.pages.store');
        Route::get('/pages/edit/{id}', [adminPageController::class, 'edit'])->name('admin.pages.edit');
        Route::put('/pages/updated/{id}', [adminPageController::class, 'updated'])->name('admin.pages.updated');
        Route::delete('/pages/delete/{id}', [adminPageController::class, 'destroy'])->name('admin.pages.delete');

        //PARAMÉTRES
        Route::get('/settings', [adminSettingController::class, 'settings'])->name('admin.settings');
        Route::get('/settings/create', [adminSettingController::class, 'create'])->name('admin.settings.create');
        Route::post('/settings/store', [adminSettingController::class, 'store'])->name('admin.settings.store');
        Route::get('/settings/edit/{id}', [adminSettingController::class, 'edit'])->name('admin.settings.edit');
        Route::put('/settings/updated/{id}', [adminSettingController::class, 'updated'])->name('admin.settings.updated');
        Route::delete('/settings/delete/{id}', [adminSettingController::class, 'destroy'])->name('admin.settings.delete');

        //IMAGE
        Route::post('/temp/upload', [TempImageController::class, 'upload'])->name('tempUpload');
    });
});


