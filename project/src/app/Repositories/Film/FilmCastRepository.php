<?php

namespace App\Repositories\Film;

use App\Models\Film;
use App\Models\FilmCast;
use App\Repositories\BaseRepository;

class FilmCastRepository extends BaseRepository
{
    public function __construct(FilmCast $film)
    {
        parent::__construct($film);
    }

    public function deleteWhere(array $conditions)
    {
        return $this->model->where($conditions)->delete();
    }

}
