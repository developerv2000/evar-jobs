<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'MainController@home')->name('home');

Route::post('/feedback', 'MainController@feedback')->name("feedback");

Route::post("/cv/upload", "UploadController@store")->name("cv.upload");
Route::post("/cv/download/template", "CvController@download_template")->name("cv.download.template");
Route::post("/cv/store", "CvController@store")->name("cv.store");


//--------------------------Dasboard start---------------------------
Route::group(["middleware" => "auth"], function() {
    //cvs
    Route::get("/dashboard", "DashboardController@index")->name("dashboard.index");
    Route::get("/dashboard/cvs/{id}", "CvController@webmaster_single")->name("dashboard.cvs.single");

    Route::post("/cvs/download_in_word", "CvController@download_in_word")->name("cvs.download_in_word");
    Route::post("/cvs/remove", "CvController@remove")->name("cvs.remove");
    Route::post("/cvs/remove/multiple", "CvController@remove_multiple")->name("cvs.remove_multiple");

    //uploads
    Route::get("/dashboard/uploads", "UploadController@webmaster_index")->name("dashboard.uploads.index");

    Route::post("/uploads/download", "UploadController@download")->name("uploads.download");
    Route::post("/uploads/remove", "UploadController@remove")->name("uploads.remove");
    Route::post("/uploads/remove/multiple", "UploadController@remove_multiple")->name("uploads.remove_multiple");

    //vacancies
    Route::get("/dashboard/vacancies", "VacancyController@webmaster_index")->name("dashboard.vacancies.index");
    Route::get("/dashboard/vacancies/create", "VacancyController@webmaster_create")->name("dashboard.vacancies.create");
    Route::get("/dashboard/vacancies/{id}", "VacancyController@webmaster_single")->name("dashboard.vacancies.single");

    Route::post("/vacancies/store", "VacancyController@store")->name("vacancies.store");
    Route::post("/vacancies/update", "VacancyController@update")->name("vacancies.update");
    Route::post("/vacancies/remove", "VacancyController@remove")->name("vacancies.remove");
    Route::post("/vacancies/remove/multiple", "VacancyController@remove_multiple")->name("vacancies.remove_multiple");


    //positions
    Route::get("/dashboard/positions", "PositionController@webmaster_index")->name("dashboard.positions.index");
    Route::get("/dashboard/positions/create", "PositionController@webmaster_create")->name("dashboard.positions.create");
    Route::get("/dashboard/positions/{id}", "PositionController@webmaster_single")->name("dashboard.positions.single");

    Route::post("/positions/store", "PositionController@store")->name("positions.store");
    Route::post("/positions/update", "PositionController@update")->name("positions.update");
    Route::post("/positions/remove", "PositionController@remove")->name("positions.remove");
    Route::post("/positions/remove/multiple", "PositionController@remove_multiple")->name("positions.remove_multiple");
});
//---------------------------Dasboard end---------------------------

require __DIR__.'/auth.php';
