<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SuccessStoryController;

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

Route::get('/', function () {
    return view('welcome');
});



/*Route::prefix('members')->group(function () {
    Route::get('/', [MemberController::class, 'index'])->name('members.index'); // Listare membri
    Route::get('/create', [MemberController::class, 'create'])->name('members.create'); // Formular creare membru
    Route::post('/', [MemberController::class, 'store'])->name('members.store'); // Salvare membru nou
    Route::get('/{id}/edit', [MemberController::class, 'edit'])->name('members.edit'); // Formular editare
    Route::patch('/{id}', [MemberController::class, 'update'])->name('members.update'); // Actualizare membru
    Route::delete('/{id}', [MemberController::class, 'destroy'])->name('members.destroy'); // Ștergere membru
});*/

/*Route::resource('members', MemberController::class);
Route::resource('success_stories', SuccessStoryController::class);
Route::resource('events', EventController::class);*/


/*
Route::get('/', [MemberController::class, 'index'])->name('members.index'); // Listare membri

//Route::get('/', [MemberController::class, 'index'])->name('members.index');
Route::get('/members/create', [MemberController::class, 'create']);

Route::get('/events/index', [EventController::class, 'index']);
Route::get('/events/create', [EventController::class, 'create']);

Route::get('/successStories/index', [SuccessStoryController::class, 'index']);
Route::get('/successStories/create', [SuccessStoryController::class, 'create']);
*/
