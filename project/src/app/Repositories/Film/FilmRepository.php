<?php

namespace App\Repositories\Film;

use App\Models\Film;
use App\Repositories\BaseRepository;

class FilmRepository extends BaseRepository
{
    public function __construct(Film $film)
    {
        parent::__construct($film);
    }
    public function getPaginatedFilms(){
        return $this->paginate(12);
    }

    public function getInfoFilm($id)
    {
         return $this->model::with('castMembers', 'tags','images')->find($id);
    }
}
