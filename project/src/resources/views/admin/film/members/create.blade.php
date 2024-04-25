<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.admin_panel') }}
        </h2>
    </x-slot>

    <div class="py-12 ps-12 pe-12">
        <div class="flex flex-column">
            <form class="flex flex-col" action="{{ route('member.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name_uk" class="form-label">{{ __('messages.name_uk') }}:</label>
                    <input type="text" name="name_uk" id="name_uk" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="name_en" class="form-label">{{ __('messages.name_en') }}:</label>
                    <input type="text" name="name_en" id="name_en" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="photo" class="form-label">{{ __('messages.photo') }}:</label>
                    <input type="file" name="photo" id="photo" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">{{ __('messages.select_cast_member_type') }}:</label>
                    <select name="type" id="type" class="form-select">
                        <option value="Director">{{ __('messages.director') }}</option>
                        <option value="Writer">{{ __('messages.writer') }}</option>
                        <option value="Actor">{{ __('messages.actor') }}</option>
                        <option value="Composer">{{ __('messages.composer') }}</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">{{ __('messages.add_member') }}</button>
            </form>

        </div>
    </div>
</x-app-layout>
