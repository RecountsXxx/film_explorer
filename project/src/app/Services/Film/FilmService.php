<?php

namespace App\Services\Film;

use App\Repositories\Film\CastMemberRepository;
use App\Repositories\Film\FilmCastRepository;
use App\Repositories\Film\FilmImageRepository;
use App\Repositories\Film\FilmRepository;
use Illuminate\Support\Facades\Storage;

class FilmService
{
    public function __construct(
        private FilmRepository $filmRepository,
        private FilmImageRepository $imageRepository,
        private FilmCastRepository $castRepository
    ) {}

    public function index()
    {
        return $this->filmRepository->getPaginatedFilms();
    }

    public function store(array $data)
    {
        $film = $this->filmRepository->create($data);

        $this->syncCastMembers($film, $data['cast_member_id']);
        $this->uploadImages($data['images'], $film->id);
        $this->uploadPoster($data['poster'], $film->id);
    }

    public function update(array $data, int $id)
    {
        $film = $this->filmRepository->findOrFail($id);
        $this->filmRepository->update($film, $data);

        if (isset($data['cast_member_id'])) {
            $this->syncCastMembers($film, $data['cast_member_id']);
        }

        if (isset($data['poster'])) {
            $this->uploadPoster($data['poster'], $id);
        }

        if (isset($data['new_images'])) {
            $this->uploadImages($data['new_images'], $id);
        }
    }

    public function uploadImages(array $images, int $filmId)
    {
        foreach ($images as $image) {
            $imageFileName = $this->storeImage($image, $filmId);
            $this->imageRepository->create(['image' => $imageFileName, 'film_id' => $filmId]);
        }
    }

    public function uploadPoster($image, int $filmId)
    {
        $posterFileName = $this->storeImage($image, $filmId, 'poster');
        $film = $this->filmRepository->findOrFail($filmId);
        $this->filmRepository->update($film, ['poster' => $posterFileName]);
    }

    public function destroy(string $id)
    {
        $film = $this->filmRepository->findOrFail($id);

        $this->deleteFilmImages($film);
        foreach($film->images as $image) {
            $this->imageRepository->delete($image);
        }
        $this->filmRepository->delete($film);
    }

    public function deleteImage(string $id)
    {
        $image = $this->imageRepository->findOrFail($id);
        Storage::disk('films')->delete($image->image);
        $this->imageRepository->delete($image);
    }

    public function getInfoFilm(string $id)
    {
        return $this->filmRepository->getInfoFilm($id);
    }

    private function syncCastMembers($film, $castMemberIds)
    {
        $film->castMembers()->sync($castMemberIds);
    }

    private function storeImage($image, int $filmId, $prefix = null)
    {
        $fileName = $filmId . '/' . ($prefix ? $prefix . '.' : '') . uniqid() . '.webp';
        Storage::disk('films')->putFileAs('film_images', $image, $fileName);
        return Storage::disk('films')->url('films/film_images/' . $fileName);
    }

    private function deleteFilmImages($film)
    {
        foreach ($film->images as $image) {
            Storage::disk('films')->delete($image->image);
        }
    }

    public function getFilmById(int $id)
    {
        return $this->filmRepository->findOrFail($id);
    }
}
