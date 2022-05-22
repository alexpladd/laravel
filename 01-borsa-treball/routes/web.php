<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/filtre/{id}', [App\Http\Controllers\HomeController::class, 'getFilter'])->name('home.filter');

// Rutes fitxa
Route::prefix('/fitxa')->group(function() {
    Route::get('/', [\App\Http\Controllers\FitxaController::class, 'editFitxa'])->name('fitxa');
    Route::post('/update', [\App\Http\Controllers\FitxaController::class, 'updateFitxa'])->name('fitxa.update');
    Route::get('/get/{filename}', [\App\Http\Controllers\FitxaController::class, 'getCurriculum'])->name('fitxa.curriculum');
    Route::get('/download/{filename}', [\App\Http\Controllers\FitxaController::class, 'downloadCurriculum'])->name('fitxa.download');
});

// Rutes empresa
Route::prefix('/empresa')->middleware('coordinator:1')->group(function() {
    Route::get('/', [\App\Http\Controllers\CompanyController::class, 'getCompanies'])->name('companies');
    Route::get('/add', [\App\Http\Controllers\CompanyController::class, 'addCompany'])->name('company.add');
    Route::post('/save', [\App\Http\Controllers\CompanyController::class, 'saveCompany'])->name('company.save');
    Route::get('/edit/{id}', [\App\Http\Controllers\CompanyController::class, 'editCompany'])->name('company.edit');
    Route::post('/update/{id}', [\App\Http\Controllers\CompanyController::class, 'updateCompany'])->name('company.update');
    Route::get('/delete/{id}', [\App\Http\Controllers\CompanyController::class, 'deleteCompany'])->name('company.delete');

    // Rutes oferta
    Route::get('/oferta', [\App\Http\Controllers\OfferController::class, 'getOffers'])->name('offers');
    Route::get('/oferta/filter/{id}', [App\Http\Controllers\OfferController::class, 'getOfferFilter'])->name('offers.filter');
    Route::get('/oferta/add', [\App\Http\Controllers\OfferController::class, 'addOffer'])->name('offer.add');
    Route::post('/oferta/save', [\App\Http\Controllers\OfferController::class, 'saveOffer'])->name('offer.save');
    Route::get('/oferta/edit/{id}', [\App\Http\Controllers\OfferController::class, 'editOffer'])->name('offer.edit');
    Route::post('/oferta/update/{id}', [\App\Http\Controllers\OfferController::class, 'updateOffer'])->name('offer.update');
    Route::get('/oferta/delete/study/{offer_id}/{study_id}', [\App\Http\Controllers\OfferController::class, 'deleteOfferStudy'])->name('offer.delete.study');
    Route::get('/oferta/delete/{id}', [\App\Http\Controllers\OfferController::class, 'deleteOffer'])->name('offer.delete');
    Route::get('/oferta/enviar', [\App\Http\Controllers\OfferController::class, 'sendOffers'])->name('offers.send');
});

// Rutes estudis
Route::prefix('/estudis')->middleware('coordinator:1')->group(function() {
    Route::get('/', [\App\Http\Controllers\StudyController::class, 'getStudies'])->name('studies');
    Route::get('/add', [\App\Http\Controllers\StudyController::class, 'addStudy'])->name('study.add');
    Route::post('/save', [\App\Http\Controllers\StudyController::class, 'saveStudy'])->name('study.save');
    Route::get('/edit/{id}', [\App\Http\Controllers\StudyController::class, 'editStudy'])->name('study.edit');
    Route::post('/update/{id}', [\App\Http\Controllers\StudyController::class, 'updateStudy'])->name('study.update');
    Route::get('/delete/{id}', [\App\Http\Controllers\StudyController::class, 'deleteStudy'])->name('study.delete');
});

// Rutes titulats
Route::prefix('/titulats')->middleware('coordinator:1')->group(function() {
    Route::get('/', [\App\Http\Controllers\GraduatesController::class, 'getGraduates'])->name('graduates');
    Route::get('/edit/{id}', [\App\Http\Controllers\GraduatesController::class, 'editGraduate'])->name('graduate.edit');
    Route::post('/update/{id}', [\App\Http\Controllers\GraduatesController::class, 'updateGraduate'])->name('graduate.update');
    Route::get('/add', [\App\Http\Controllers\GraduatesController::class, 'addGraduate'])->name('graduate.add');
    Route::post('/save', [\App\Http\Controllers\GraduatesController::class, 'saveGraduate'])->name('graduate.save');
    Route::get('/delete/{id}', [\App\Http\Controllers\GraduatesController::class, 'deleteGraduate'])->name('graduate.delete');
    Route::get('/delete/study/{graduate_id}/{study_id}', [\App\Http\Controllers\GraduatesController::class, 'deleteGraduateStudy'])->name('graduate.delete.study');
});



