<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.admin_panel') }}
        </h2>
    </x-slot>

    <div class="py-12 ps-12">
        <div class="flex flex-column">
            <form class="flex flex-col" action="{{ route('tag.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="film_id" value="{{ $film_id }}">

                <div class="mb-3">
                    <label for="tag_name_uk" class="form-label">{{ __('messages.tag_name_uk') }}:</label>
                    <input type="text" name="tag_name_uk" id="tag_name_uk" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="tag_name_en" class="form-label">{{ __('messages.tag_name_en') }}:</label>
                    <input type="text" name="tag_name_en" id="tag_name_en" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="slug_uk" class="form-label">{{ __('messages.slug_uk') }}:</label>
                    <textarea name="slug_uk" id="slug_uk" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="slug_en" class="form-label">{{ __('messages.slug_en') }}:</label>
                    <textarea name="slug_en" id="slug_en" class="form-control"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">{{ __('messages.add_tag') }}</button>
            </form>
        </div>
    </div>
</x-app-layout>
