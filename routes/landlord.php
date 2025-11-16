<?php

use App\Http\Controllers\Api\SuperAdmin\ContactUsTypeController;
use App\Http\Controllers\Api\SuperAdmin\DepartmentController;
use App\Http\Controllers\Api\SuperAdmin\ExperienceYearController;
use App\Http\Controllers\Api\SuperAdmin\FaqController;
use App\Http\Controllers\Api\SuperAdmin\InsuranceCompanyController;
use App\Http\Controllers\Api\SuperAdmin\ReportTypeController;
use App\Http\Controllers\Api\SuperAdmin\ScientificDegreeController;
use App\Http\Controllers\Api\SuperAdmin\ScientificTitleController;
use App\Http\Controllers\Api\SuperAdmin\ServiceController;
use App\Http\Controllers\Api\SuperAdmin\ServiceProviderTypeController;
use App\Http\Controllers\Api\SuperAdmin\SpecialtyController;
use App\Http\Controllers\Api\SuperAdmin\VisitTypeController;
use Illuminate\Support\Facades\Route;












Route::prefix('super-admin')->group(function(){

    
Route::prefix('manage-service-provider')->group(function(){

    // Route::get('/',[ManageServiceProviderController::class,'index']);
    // Route::post('/',[ManageServiceProviderController::class,'store']);
    // Route::put('/{msp}',[ManageServiceProviderController::class,'show']);
    // Route::delete('/{msp}',[ManageServiceProviderController::class,'destroy']);

});
    

Route::prefix('service-provider-type')->group(function(){
    
    Route::get('/',[ServiceProviderTypeController::class,'index']);
    Route::post('/',[ServiceProviderTypeController::class,'store']);
    Route::get('/{serviceProviderType}',[ServiceProviderTypeController::class,'show']);
    Route::put('/{serviceProviderType}',[ServiceProviderTypeController::class,'update']);
    Route::delete('/{serviceProviderType}',[ServiceProviderTypeController::class,'destroy']);


});


Route::prefix('experience-year')->group(function(){

    Route::get('/',[ExperienceYearController::class,'index']);
    Route::post('/',[ExperienceYearController::class,'store']);
    Route::get('/{experienceYear}',[ExperienceYearController::class,'show']);
    Route::put('/{experienceYear}',[ExperienceYearController::class,'update']);
    Route::delete('/{experienceYear}',[ExperienceYearController::class,'destroy']);


});



Route::prefix('service')->group(function(){

    Route::get('/',[ServiceController::class,'index']);
    Route::post('/',[ServiceController::class,'store']);
    Route::get('/{service}',[ServiceController::class,'show']);
    Route::put('/{service}',[ServiceController::class,'update']);
    Route::delete('/{service}',[ServiceController::class,'destroy']);


});


    Route::prefix('contact-us-type')->group(function () {
    Route::get('/',[ContactUsTypeController::class,'index']);
    Route::post('/',[ContactUsTypeController::class,'store']);
    Route::get('/{contactUsType}',[ContactUsTypeController::class,'show']);
    Route::put('/{contactUsType}',[ContactUsTypeController::class,'update']);
    Route::delete('/{contactUsType}',[ContactUsTypeController::class,'destroy']);

    });

    Route::prefix('department')->group(function () {
    Route::get('/',[DepartmentController::class,'index']);
    Route::post('/',[DepartmentController::class,'store']);
    Route::get('/{department}',[DepartmentController::class,'show']);
    Route::put('/{department}',[DepartmentController::class,'update']);
    Route::delete('/{department}',[DepartmentController::class,'destroy']);

    });


    Route::prefix('faq')->group(function () {
    Route::get('/',[FaqController::class,'index']);
    Route::post('/',[FaqController::class,'store']);
    Route::get('/{faq}',[FaqController::class,'show']);
    Route::put('/{faq}',[FaqController::class,'update']);
    Route::delete('/{faq}',[FaqController::class,'destroy']);

    });

    Route::prefix('insurance-company')->group(function () {
    Route::get('/',[InsuranceCompanyController::class,'index']);
    Route::post('/',[InsuranceCompanyController::class,'store']);
    Route::get('/{insuranceCompany}',[InsuranceCompanyController::class,'show']);
    Route::put('/{insuranceCompany}',[InsuranceCompanyController::class,'update']);
    Route::delete('/{insuranceCompany}',[InsuranceCompanyController::class,'destroy']);

    });


    
      Route::prefix('report-type')->group(function () {
    Route::get('/',[ReportTypeController::class,'index']);
    Route::post('/',[ReportTypeController::class,'store']);
    Route::get('/{reportType}',[ReportTypeController::class,'show']);
    Route::put('/{reportType}',[ReportTypeController::class,'update']);
    Route::delete('/{reportType}',[ReportTypeController::class,'destroy']);

    });


    Route::prefix('scientific-degree')->group(function () {
    Route::get('/',[ScientificDegreeController::class,'index']);
    Route::post('/',[ScientificDegreeController::class,'store']);
    Route::get('/{scientificDegree}',[ScientificDegreeController::class,'show']);
    Route::put('/{scientificDegree}',[ScientificDegreeController::class,'update']);
    Route::delete('/{scientificDegree}',[ScientificDegreeController::class,'destroy']);

    });
    




    Route::prefix('scientific-title')->group(function () {
    Route::get('/',[ScientificTitleController::class,'index']);
    Route::post('/',[ScientificTitleController::class,'store']);
    Route::get('/{scientificTitle}',[ScientificTitleController::class,'show']);
    Route::put('/{scientificTitle}',[ScientificTitleController::class,'update']);
    Route::delete('/{scientificTitle}',[ScientificTitleController::class,'destroy']);
    });


      Route::prefix('specialty')->group(function () {
    Route::get('/',[SpecialtyController::class,'index']);
    Route::post('/',[SpecialtyController::class,'store']);
    Route::get('/{specialty}',[SpecialtyController::class,'show']);
    Route::put('/{specialty}',[SpecialtyController::class,'update']);
    Route::delete('/{specialty}',[SpecialtyController::class,'destroy']);
    });

    Route::prefix('visit-type')->group(function () {
    Route::get('/',[VisitTypeController::class,'index']);
    Route::post('/',[VisitTypeController::class,'store']);
    Route::get('/{visitType}',[VisitTypeController::class,'show']);
    Route::put('/{visitType}',[VisitTypeController::class,'update']);
    Route::delete('/{visitType}',[VisitTypeController::class,'destroy']);
    });






});
