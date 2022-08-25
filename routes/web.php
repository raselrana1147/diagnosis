<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

require __DIR__.'/admin.php';

Route::get('/',[HomeController::class,'index'])->name('front_page');
Route::match(array('post','get'),'/search',[HomeController::class, 'report_search'])->name('report_search');
Route::get('/about_us',[HomeController::class,'about_us'])->name('about_us');
Route::get('/contact_us',[HomeController::class,'contact_us'])->name('contact_us');
Route::get('/service',[HomeController::class,'service'])->name('service');
Route::get('/privacy_policy',[HomeController::class,'privacy_policy'])->name('privacy_policy');
Route::get('/term_condition',[HomeController::class,'term_condition'])->name('term_condition');
Route::get('/package_pricing',[HomeController::class,'package_pricing'])->name('package_pricing');
Route::post('/store_contact',[HomeController::class,'store_contact'])->name('store.contact_us');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
