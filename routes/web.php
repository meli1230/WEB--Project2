<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SuccessStoryController;

//route to the home page, returning the 'welcome' view
Route::get('/', function () {
    return view('welcome');
});

//member routes for listing and creating members without grouping
Route::get('/members/index', [MemberController::class, 'index']);
Route::get('/members/create', [MemberController::class, 'create']);

//member routes for listing and creating events without grouping
Route::get('/events/index', [EventController::class, 'index']);
Route::get('/events/create', [EventController::class, 'create']);

//member routes for listing and creating stories without grouping
Route::get('/successStories/index', [SuccessStoryController::class, 'index']);
Route::get('/successStories/create', [SuccessStoryController::class, 'create']);

//grouping member-related routes under the members prefix
Route::prefix('members')->group(function () {
    Route::get('/', [MemberController::class, 'index'])->name('members.index');
    Route::get('/create', [MemberController::class, 'create'])->name('members.create');
    Route::post('/', [MemberController::class, 'store'])->name('members.store');
    Route::get('/{id}/edit', [MemberController::class, 'edit'])->name('members.edit');
    Route::patch('/{id}', [MemberController::class, 'update'])->name('members.update');
    Route::delete('/{id}', [MemberController::class, 'destroy'])->name('members.destroy');
});

//grouping event-related routes under the events prefix
Route::prefix('events')->group(function () {
    Route::get('/', [EventController::class, 'index'])->name('events.index');
    Route::get('/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/', [EventController::class, 'store'])->name('events.store');
    Route::get('/{id}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::patch('/{id}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/{id}', [EventController::class, 'destroy'])->name('events.destroy');
});

//grouping stories-related routes under the stories prefix
Route::prefix('successStories')->group(function () {
    Route::get('/', [SuccessStoryController::class, 'index'])->name('successStories.index');
    Route::get('/create', [SuccessStoryController::class, 'create'])->name('successStories.create');
    Route::post('/', [SuccessStoryController::class, 'store'])->name('successStories.store');
    Route::get('/{id}/edit', [SuccessStoryController::class, 'edit'])->name('successStories.edit');
    Route::patch('/{id}', [SuccessStoryController::class, 'update'])->name('successStories.update');
    Route::delete('/{id}', [SuccessStoryController::class, 'destroy'])->name('successStories.destroy');
});
