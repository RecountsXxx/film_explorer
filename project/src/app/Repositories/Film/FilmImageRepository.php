<?php

namespace App\Repositories\Film;

use App\Models\Film;
use App\Models\FilmImage;
use App\Repositories\BaseRepository;

class FilmImageRepository extends BaseRepository
{
    public function __construct(FilmImage $film)
    {
        parent::__construct($film);
    }
}
