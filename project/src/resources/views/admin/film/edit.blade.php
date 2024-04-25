<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.admin_panel') }}
        </h2>
    </x-slot>

    <div class="py-12 ps-12 pe-12">
        <div class="flex flex-column">
            <form class="flex flex-col" action="{{ route('film.update', $film->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title_uk" class="form-label">{{ __('messages.title_uk') }}:</label>
                    <input type="text" name="title_uk" id="title_uk" value="{{ $film->title_uk }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="title_en" class="form-label">{{ __('messages.title_en') }}:</label>
                    <input type="text" name="title_en" id="title_en" value="{{ $film->title_en }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="description_uk" class="form-label">{{ __('messages.description_uk') }}:</label>
                    <textarea name="description_uk" id="description_uk" class="form-control">{{ $film->description_uk }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="description_en" class="form-label">{{ __('messages.description_en') }}:</label>
                    <textarea name="description_en" id="description_en" class="form-control">{{ $film->description_en }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="poster" class="form-label">{{ __('messages.poster') }}:</label>
                    <input type="file" name="poster" id="poster" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="youtube_trailer_id" class="form-label">{{ __('messages.youtube_trailer_id') }}:</label>
                    <input type="text" name="youtube_trailer_id" id="youtube_trailer_id" value="{{ $film->youtube_trailer_id }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="release_year" class="form-label">{{ __('messages.release_year') }}:</label>
                    <input type="number" name="release_year" id="release_year" value="{{ $film->release_year }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="start_date" class="form-label">{{ __('messages.start_date') }}:</label>
                    <input type="datetime-local" name="start_date" id="start_date" value="{{ $film->start_date }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="end_date" class="form-label">{{ __('messages.end_date') }}:</label>
                    <input type="datetime-local" name="end_date" id="end_date" value="{{ $film->end_date }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="new_images[]" class="form-label">{{ __('messages.new_images') }}:</label>
                    <input type="file" multiple name="new_images[]" id="new_images" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">{{ __('messages.status') }}:</label>
                    <select name="status" id="status" class="form-control">
                        <option value="Show" {{ $film->status == 'Show' ? 'selected' : '' }}>{{ __('messages.show') }}</option>
                        <option value="Hide" {{ $film->status == 'Hide' ? 'selected' : '' }}>{{ __('messages.hide') }}</option>
                    </select>
                </div>
                <div class="mb-3 d-flex flex-column w-25">
                    <label for="cast_member_id[]" class="form-label">{{ __('messages.select_cast_members') }}:</label>
                    <select name="cast_member_id[]" id="cast_member_id" class="form-select" multiple>
                        @foreach($castMembers as $castMember)
                            <option value="{{ $castMember->id }}" @if(in_array($castMember->id, $film->castMembers->pluck('id')->toArray())) selected @endif>{{ $castMember->name_en . ' | ' . $castMember->type}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">{{ __('messages.update_film') }}</button>
            </form>




            @if ($film->images->count() > 0)
                <div class="mb-3">
                    <label for="delete_image" class="form-label">{{ __('messages.delete_image') }}:</label>
                    <div class="row row-cols-3 row-cols-md-6 g-4">
                        @foreach ($film->images as $image)
                            <div class="col">
                                    <img src="{{ $image->image }}" class="ms-3 card-img-top" style="width: 150px; height: 150px;" alt="...">
                                    <div class="card-body">
                                        <form action="{{ route('film.image.destroy', $image->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn ms- btn-danger">{{ __('messages.delete_image') }}</button>
                                        </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
