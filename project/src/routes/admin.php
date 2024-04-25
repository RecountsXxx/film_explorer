<?php

use App\Http\Controllers\Admin\Films\FilmController;
use App\Http\Controllers\Admin\Films\Member\MemberController;
use App\Http\Controllers\Admin\Films\Tag\TagController;
use App\Http\Controllers\Admin\Profile\ProfileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale()], function() {
    Route::resource('film',FilmController::class)->names('film');
    Route::delete('film/image/{id}',[FilmController::class, 'deleteImage'])->name('film.image.destroy');

    Route::resource('member',MemberController::class)->names('member');

    Route::get('tag/{film_id}',[TagController::class,'create'])->name('tag.create');
    Route::get('tag/show/{film_id}',[TagController::class,'index'])->name('tag.show');
    Route::delete('tag/{film_id}',[TagController::class,'destroy'])->name('tag.destroy');
    Route::post('tag',[TagController::class,'store'])->name('tag.store');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });


    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

});

