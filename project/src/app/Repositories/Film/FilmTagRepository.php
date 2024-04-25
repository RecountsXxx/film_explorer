<?php

namespace App\Repositories\Film;

use App\Models\FilmTag;
use App\Repositories\BaseRepository;

class FilmTagRepository extends BaseRepository
{
    public function __construct(FilmTag $tag)
    {
        parent::__construct($tag);
    }

    public function getPaginatedTags(){
        return $this->paginate(12);
    }
}
