<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('language', function (Request $request) {
    \Illuminate\Support\Facades\App::setLocale($request->locale);
    session()->put('locale', $request->locale);
    \cookie('locale',$request->locale,60);
    return redirect('/');
})->name('language');

Route::middleware(['auth','setlocale'])->group(function () {
    Route::get('/', [\App\Http\Controllers\SiteController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('navigation',\App\Http\Controllers\admin\NavigationController::class);
    Route::resource('role',\App\Http\Controllers\admin\RoleController::class);
    Route::resource('department', \App\Http\Controllers\DepartmentController::class);
    Route::resource('job-title',\App\Http\Controllers\JobTitleController::class);
    Route::resource('tutor', \App\Http\Controllers\TutorController::class);
    //  Route::get('teachers',[\App\Http\Controllers\TutorController::class,'teachers'])->name('teachers');
    Route::resource('tutor-qualification',\App\Http\Controllers\TutorQualificationController::class);
    Route::resource('award',\App\Http\Controllers\AwardController::class);
    Route::resource('tutor-award',\App\Http\Controllers\TutorAwardController::class);
    Route::controller(\App\Http\Controllers\Journal\TutorJournalController::class)->group(function (){
        Route::get('/tutor-journals', 'index')->name('tutor-journals');
        Route::get('/tutor-journals/{tutorId}/{subjectId}', 'show')->name('tutor-journal.show');
    });

    Route::resource('content',\App\Http\Controllers\Journal\ContentController::class);
    Route::post('ckeditor/upload', [\App\Http\Controllers\CKEditorController::class,'upload'])->name('ckeditor.image-upload');
//    Route::controller(\App\Http\Controllers\TutorQualificationController::class)->group(function () {
//        Route::get('/tutor-qualification/{tutor_id}', 'index')->name('tutor-qualification.index');
//        Route::post('/tutor-qualification/create/{tutor_id}', 'create')->name('tutor-qualification.create');
//        Route::put('/tutor-qualification/{tutor-qualification}/edit', 'create')->name('tutor-qualification');
//        Route::delete('/tutor-qualification/destroy/{tutor-qualification}', 'destroy')->name('tutor-qualification.destroy');
//    });

//    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
//        \UniSharp\LaravelFilemanager\Lfm::routes();
//    });
});

require __DIR__.'/auth.php';
