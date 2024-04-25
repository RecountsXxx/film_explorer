<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.admin_panel') }}
        </h2>
    </x-slot>

    <div class="py-12 ps-12 pe-12">
        <div class="flex flex-column">
            <form class="flex flex-col" action="{{ route('film.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3 ">
                    <label for="title_uk" class="form-label">{{ __('messages.title_uk') }}:</label>
                    <input type="text" name="title_uk" id="title_uk" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="title_en" class="form-label">{{ __('messages.title_en') }}:</label>
                    <input type="text" name="title_en" id="title_en" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="description_uk" class="form-label">{{ __('messages.description_uk') }}:</label>
                    <textarea name="description_uk" id="description_uk" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="description_en" class="form-label">{{ __('messages.description_en') }}:</label>
                    <textarea name="description_en" id="description_en" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="poster" class="form-label">{{ __('messages.poster') }}:</label>
                    <input type="file" name="poster" id="poster" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="youtube_trailer_id" class="form-label">{{ __('messages.youtube_trailer_id') }}:</label>
                    <input type="text" name="youtube_trailer_id" id="youtube_trailer_id" class="form-control">
                </div>

                <div class="mb-3 w-25">
                    <label for="release_year" class="form-label">{{ __('messages.release_year') }}:</label>
                    <input type="number" name="release_year" id="release_year" class="form-control">
                </div>

                <div class="mb-3 w-25">
                    <label for="start_date" class="form-label">{{ __('messages.start_date') }}:</label>
                    <input type="datetime-local" name="start_date" id="start_date" class="form-control">
                </div>

                <div class="mb-3 w-25">
                    <label for="end_date" class="form-label">{{ __('messages.end_date') }}:</label>
                    <input type="datetime-local" name="end_date" id="end_date" class="form-control">
                </div>

                <div class="mb-3 d-flex flex-column w-25">
                    <label for="cast_member_id[]" class="form-label">{{ __('messages.select_cast_members') }}:</label>
                    <select name="cast_member_id[]" id="cast_member_id" class="form-select" multiple>
                        @foreach($castMembers as $castMember)
                            <option value="{{ $castMember->id }}">{{ $castMember->name_en . ' | ' . $castMember->type}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="images[]" class="form-label">{{ __('messages.add_images') }}:</label>
                    <input type="file" name="images[]" id="images" class="form-control" multiple>
                </div>

                <button type="submit" class="btn btn-primary">{{ __('messages.add_film') }}</button>
            </form>

        </div>
    </div>
</x-app-layout>
