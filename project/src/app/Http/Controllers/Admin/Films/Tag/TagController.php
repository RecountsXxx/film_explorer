<?php

namespace App\Http\Controllers\Admin\Films\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Film\Tag\TagRequest;
use App\Services\Film\Tag\TagService;

class TagController extends Controller
{
    public function __construct(private TagService $tagService){}

    public function index($film_id)
    {
        $tags = $this->tagService->index($film_id);

        return view('admin.film.tags.index', compact('tags'));
    }

    public function create($film_id)
    {
        return view('admin.film.tags.create', compact('film_id'));
    }

    public function store(TagRequest $request)
    {
        $this->tagService->store($request->validated());

        return redirect()->route('film.index')->with('success', ((__('messages.tag_successfully_added'))));
    }

    public function destroy(string $id)
    {
        $this->tagService->destroy($id);

        return redirect()->route('film.index')->with('success', ((__('messages.tag_successfully_deleted'))));
    }
}
