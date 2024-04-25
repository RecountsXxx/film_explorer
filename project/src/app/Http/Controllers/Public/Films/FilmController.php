<?php

namespace App\Http\Controllers\Public\Films;

use App\Http\Controllers\Controller;
use App\Services\Film\FilmService;

class FilmController extends Controller
{
    public function __construct(private FilmService $filmService){}

    public function index()
    {
        $films = $this->filmService->index();
        return view('public.film.index', compact('films'));
    }

    public function show(string $id)
    {
        $film = $this->filmService->getInfoFilm($id);
        $currentDate = date('Y-m-d');

        if($film->status == 'Show')
           return view('public.film.show', compact('film', 'currentDate'));
        else
            return view('public.film.error');
    }
}
