<?php

use App\Http\Controllers\Public\Films\FilmController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(['prefix' => LaravelLocalization::setLocale()], function() {
    Route::get('/', [FilmController::class,'index'])->name('public.film.index');
    Route::get('public/film/{id}', [FilmController::class,'show'])->name('public.film.show');

});


require __DIR__.'/admin.php';
require __DIR__.'/auth.php';
