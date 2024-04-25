<?php

namespace App\Http\Controllers\Admin\Films;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Film\FilmRequest;
use App\Http\Requests\Admin\Film\UpdateFilmRequest;
use App\Models\CastMember;
use App\Services\Film\FilmService;

class FilmController extends Controller
{
    public function __construct(private FilmService $filmService){}

    public function index()
    {
        $films = $this->filmService->index();
        return view('admin.film.index', compact('films'));
    }

    public function create()
    {
        $castMembers = CastMember::all();

       return view('admin.film.create', compact('castMembers'));
    }

    public function store(FilmRequest $request)
    {
        $this->filmService->store($request->validated());

        return redirect()->route('film.index')->with('success', ((__('messages.film_successfully_added'))));
    }

    public function edit(string $id)
    {
        $film = $this->filmService->getFilmById($id);
        $castMembers = CastMember::all();

        return view('admin.film.edit', compact('film','castMembers'));
    }

    public function update(UpdateFilmRequest $request, string $id)
    {
        $this->filmService->update($request->validated(),$id);

        return redirect()->route('film.index')->with('success', ((__('messages.film_successfully_updated'))));
    }

    public function destroy(string $id)
    {
        $this->filmService->destroy($id);

        return redirect()->route('film.index')->with('success', ((__('messages.film_successfully_deleted'))));
    }

    public function deleteImage(string $id)
    {
         $this->filmService->deleteImage($id);

        return redirect()->back();
    }
}
