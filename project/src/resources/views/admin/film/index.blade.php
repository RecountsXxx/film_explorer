<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.admin_panel') }}
        </h2>
    </x-slot>

    <div class="py-12 ps-12">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{ __('messages.status') }}</th>
                <th scope="col">{{ __('messages.title_uk') }}</th>
                <th scope="col">{{ __('messages.title_en') }}</th>
                <th scope="col">{{ __('messages.description_uk') }}</th>
                <th scope="col">{{ __('messages.description_en') }}</th>
                <th scope="col">{{ __('messages.poster') }}</th>
                <th scope="col">{{ __('messages.youtube_trailer_id') }}</th>
                <th scope="col">{{ __('messages.release_year') }}</th>
                <th scope="col">{{ __('messages.start_date') }}</th>
                <th scope="col">{{ __('messages.end_date') }}</th>
                <th scope="col">{{ __('messages.operations') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($films as $film)
                <tr>
                    <th scope="row">{{ $film->id }}</th>
                    <td>{{ $film->status }}</td>
                    <td>{{ $film->title_uk }}</td>
                    <td>{{ $film->title_en }}</td>
                    <td>{{ $film->description_uk }}</td>
                    <td>{{ $film->description_en }}</td>
                    <td><img src="{{ $film->poster }}" alt="Poster" style="max-width: 120px; max-height:120px;"></td>
                    <td>{{ $film->youtube_trailer_id }}</td>
                    <td>{{ $film->release_year }}</td>
                    <td>{{ $film->start_date }}</td>
                    <td>{{ $film->end_date }}</td>
                    <td>
                        <div class="d-flex flex-col gap-2">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                                <a class="text-white" href="{{ route('film.edit', $film->id) }}">{{ __('messages.edit') }}</a>
                            </button>
                            <button class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                                <a class="text-white" href="{{ route('tag.create', ['film_id' => $film->id]) }}">{{ __('messages.add_tag') }}</a>
                            </button>
                            <button class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                                <a class="text-white" href="{{ route('tag.show', ['film_id' => $film->id]) }}">{{ __('messages.show_tags') }}</a>
                            </button>
                            <button class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                                <form action="{{ route('film.destroy', $film->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" onclick="event.preventDefault(); this.closest('form').submit();" class="text-white">{{ __('messages.delete') }}</a>
                                </form>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $films->links() }}
    </div>
</x-app-layout>
