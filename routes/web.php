<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AnnouncementController;

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

// PublicController
Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/search', [PublicController::class, 'search'])->name('search');
Route::get('/search/results', [PublicController::class, 'search'])->name('search_results');
Route::get('/advice/tips', [PublicController::class, 'tips'])->name('advice.tips');

//PublicController - MAIL
Route::get('/mail/work-with-us', [PublicController::class, 'workWithUs'])->name('workWithUs');
Route::post('/mail/work-with-us/submit', [PublicController::class, 'workWithUsSubmit'])->name('workWithUsSubmit');


//PublicController - LANG
Route::post('/locale/{locale}', [PublicController::class, 'locale'])->name('locale');
// Route::get('/{locale?}', [PublicController::class, 'localeHome'])->name('localeHome');




// AnnouncementeController
Route::get('/announcement/index', [AnnouncementController::class, 'index'])->name('announcement.index');
Route::get('/announcement/create', [AnnouncementController::class, 'create'])->name('announcement.create');
Route::post('/announcement/store', [AnnouncementController::class, 'store'])->name('announcement.store');
Route::get('/announcement/show/{announcement}', [AnnouncementController::class, 'show'])->name('announcement.show');
Route::get('/announcement/showByCategory/{announcement?}/{category?}', [AnnouncementController::class, 'showByCategory'])->name('announcement.showByCategory');
Route::get('/announcement/showByCategoryNav/{category}', [AnnouncementController::class, 'showByCategoryNav'])->name('announcement.showByCategoryNav');

//AnnouncementController - DropZone
Route::post('/announcement/images/upload', [AnnouncementController::class, 'uploadImage'])->name('announcement.images.upload');
Route::delete('/announcement/images/remove', [AnnouncementController::class, 'removeImage'])->name('announcement.images.remove');
Route::get('/announcement/images', [AnnouncementController::class, 'getImages'])->name('announcement.images');


// Revisor Controller
Route::get('/revisor/home', [RevisorController::class, 'index'])->name('revisor.home');
Route::post('/revisor/announcement/{id}/accept', [RevisorController::class, 'accept'])->name('revisor.accept');
Route::post('/revisor/announcement/{id}/reject', [RevisorController::class, 'reject'])->name('revisor.reject');
Route::post('/revisor/announcement/{id}/undo', [RevisorController::class, 'undo'])->name('revisor.undo');



