<?php
namespace App\Services\Film\Tag;

use App\Repositories\Film\FilmTagRepository;

class TagService{
    public function __construct(private FilmTagRepository $filmTagRepository){}

    public function store(array $data)
    {
       $this->filmTagRepository->create($data);
    }

    public function destroy(string $id)
    {
        $tag = $this->filmTagRepository->findOrFail($id);
        $this->filmTagRepository->delete($tag);
    }

    public function index($film_id)
    {
        return $this->filmTagRepository->get(['film_id' => $film_id],false);
    }
}
