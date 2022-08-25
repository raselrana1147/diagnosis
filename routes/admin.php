<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\TestController;
use App\Http\Controllers\Admin\EnrollController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\AgencyController;

Route::prefix('admin')->group(function(){
	 
	Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
	Route::get('load_contact',[AdminController::class,'datatable_contact'])->name('admin.load_contact');
	Route::get('contact_list',[AdminController::class,'contact_list'])->name('admin.contact_list');

	// Profile Routes
	Route::get('password_form',[AdminProfileController::class,'password_form'])->name('admin.password_form');
	Route::post('change_password',[AdminProfileController::class,'change_password'])->name('admin.change_password');
	Route::get('profile_form',[AdminProfileController::class,'profile_form'])->name('admin.profile_form');
	Route::post('change_profile',[AdminProfileController::class,'change_profile'])->name('admin.change_profile');

	//Enroll Routes
	Route::group(['prefix'=>'enroll'],function(){

	   Route::get('/',[EnrollController::class,'enroll_patient'])->name('admin.enroll_patient');
	   Route::post('/',[EnrollController::class,'enroll_store'])->name('admin.enroll_store');
	   Route::get('/invoice',[EnrollController::class,'report_invoice'])->name('admin.report_invoice');
	   Route::get('/load_report',[EnrollController::class,'datatable'])->name('admin.load_report');
	   Route::get('/report_list',[EnrollController::class,'report_list'])->name('admin.report_list');
	   Route::get('/patient_detail/{id}',[EnrollController::class,'patient_detail'])->name('admin.patient_detail');
	   Route::get('/test_detail/{id}',[EnrollController::class,'test_detail'])->name('admin.test_detail');
	   Route::post('/status_change',[EnrollController::class,'status_change'])->name('admin.report_status_change');
	   Route::get('/generate_report/{id}',[EnrollController::class,'generate_report'])->name('admin.generate_invoice');
	   Route::post('/update_result',[EnrollController::class,'update_result'])->name('admin.update_result');
	   Route::post('/refund/',[EnrollController::class,'refund'])->name('admin.refund');
	   Route::get('/load_refund_report',[EnrollController::class,'datatable_refund'])->name('refund_load_report');
	   Route::get('/refund_report_list',[EnrollController::class,'refund_report_list'])->name('refund_report_list');
	

	});
	// document
	Route::group(['prefix'=>'document'],function(){

	   Route::get('/upload/{id}',[DocumentController::class,'upload_document'])->name('admin.upload_document');
	   Route::post('/upload_document/',[DocumentController::class,'store_document'])->name('admin.store_document');
	   Route::get('/edit_document/{id}',[DocumentController::class,'edit'])->name('admin.edit_document');
	   Route::post('/update_document/',[DocumentController::class,'update'])->name('admin.update_document');
	   Route::post('/delete_document/',[DocumentController::class,'delete'])->name('delete_document');

	});

   // Report routes
	
	Route::get('generate_report',[ReportController::class,'custom_report'])->name('admin.custom_report');
	Route::post('generate_report',[ReportController::class,'generate_report'])->name('admin.generate_report');
	Route::get('daily_report',[ReportController::class,'daily_report'])->name('admin.daily_report');
	Route::get('weekly_report',[ReportController::class,'weekly_report'])->name('admin.weekly_report');
	Route::get('monthly_report',[ReportController::class,'monthly_report'])->name('admin.monthly_report');

	//Tests Routes
	Route::group(['prefix'=>'test'],function(){

		Route::get('test_load',[TestController::class,'datatable'])->name('test.load');
		Route::get('/',[TestController::class,'index'])->name('test.index');
		Route::get('create',[TestController::class,'create'])->name('test.create');
		Route::post('store',[TestController::class,'store'])->name('test.store');
		Route::get('edit/{id}',[TestController::class,'edit'])->name('test.edit');
		Route::post('update',[TestController::class,'update'])->name('test.update');
		Route::post('delete',[TestController::class,'delete'])->name('test.delete');

	});


	//Country Routes
	Route::group(['prefix'=>'country'],function(){

		Route::get('country_load',[CountryController::class,'datatable'])->name('country.load');
		Route::get('/',[CountryController::class,'index'])->name('country.index');
		Route::get('create',[CountryController::class,'create'])->name('country.create');
		Route::post('store',[CountryController::class,'store'])->name('country.store');
		Route::get('edit/{id}',[CountryController::class,'edit'])->name('country.edit');
		Route::post('update',[CountryController::class,'update'])->name('country.update');
		Route::post('delete',[CountryController::class,'delete'])->name('country.delete');

	});



	//package Routes
	Route::group(['prefix'=>'package'],function(){

		Route::get('package_load',[PackageController::class,'datatable'])->name('package.load');
		Route::get('/',[PackageController::class,'index'])->name('package.index');
		Route::get('create',[PackageController::class,'create'])->name('package.create');
		Route::post('store',[PackageController::class,'store'])->name('package.store');
		Route::get('edit/{id}',[PackageController::class,'edit'])->name('package.edit');
		Route::post('update',[PackageController::class,'update'])->name('package.update');
		Route::post('delete',[PackageController::class,'delete'])->name('package.delete');

	});
	
	//Slider Routes
	Route::group(['prefix'=>'slider'],function(){

		Route::get('slider_load',[SliderController::class,'datatable'])->name('slider.load');
		Route::get('/',[SliderController::class,'index'])->name('slider.index');
		Route::get('create',[SliderController::class,'create'])->name('slider.create');
		Route::post('store',[SliderController::class,'store'])->name('slider.store');
		Route::get('edit/{id}',[SliderController::class,'edit'])->name('slider.edit');
		Route::post('update',[SliderController::class,'update'])->name('slider.update');
		Route::post('delete',[SliderController::class,'delete'])->name('slider.delete');

	});


	//service Routes
	Route::group(['prefix'=>'service'],function(){

		Route::get('service_load',[ServiceController::class,'datatable'])->name('service.load');
		Route::get('/',[ServiceController::class,'index'])->name('service.index');
		Route::get('create',[ServiceController::class,'create'])->name('service.create');
		Route::post('store',[ServiceController::class,'store'])->name('service.store');
		Route::get('edit/{id}',[ServiceController::class,'edit'])->name('service.edit');
		Route::post('update',[ServiceController::class,'update'])->name('service.update');
		Route::post('delete',[ServiceController::class,'delete'])->name('service.delete');

	});


	// Agency Routes
		Route::group(['prefix'=>'agency'],function(){

		Route::get('load_agency',[AgencyController::class,'datatable'])->name('agency.load');
		Route::get('agency_list',[AgencyController::class,'index'])->name('agency.list');
		Route::get('agency_create',[AgencyController::class,'create'])->name('agency.create');
		Route::post('agency_store',[AgencyController::class,'store'])->name('agency.store');
		Route::get('agency_edit/{id}',[AgencyController::class,'edit'])->name('agency.edit');
		Route::post('agency_update',[AgencyController::class,'update'])->name('agency.update');
		Route::post('agency_delete',[AgencyController::class,'delete'])->name('agency.delete');
	});


	// Social Routes
		Route::group(['prefix'=>'social'],function(){

		Route::get('load_social',[SocialController::class,'datatable'])->name('load_social');
		Route::get('social_list',[SocialController::class,'index'])->name('social_list');
		Route::get('social_create',[SocialController::class,'create'])->name('social_create');
		Route::post('social_store',[SocialController::class,'store'])->name('social_store');
		Route::get('social_edit/{id}',[SocialController::class,'edit'])->name('social_edit');
		Route::post('social_update',[SocialController::class,'update'])->name('social_update');
		Route::post('social_delete',[SocialController::class,'delete'])->name('social_delete');
	});


	// Admin authenticate route
	Route::get('login',[AuthenticatedSessionController::class,'create'])->name('admin_login');
	Route::post('login',[AuthenticatedSessionController::class,'store'])->name('login_submit');
	Route::post('logout',[AuthenticatedSessionController::class,'destroy'])->name('admin_logout');

});


