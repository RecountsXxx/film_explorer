<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.admin_panel') }}
        </h2>
    </x-slot>

    <div class="py-12 ps-12 pe-12">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{ __('messages.name_uk') }}</th>
                <th scope="col">{{ __('messages.name_en') }}</th>
                <th scope="col">{{ __('messages.slug_uk') }}</th>
                <th scope="col">{{ __('messages.slug_en') }}</th>
                <th scope="col">{{ __('messages.film_id') }}</th>
                <th scope="col">{{ __('messages.operations') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tags as $tag)
                <tr>
                    <th scope="row">{{ $tag->id }}</th>
                    <td>{{ $tag->name_uk }}</td>
                    <td>{{ $tag->name_en }}</td>
                    <td>{{ $tag->slug_uk }}</td>
                    <td>{{ $tag->slug_en }}</td>
                    <td>{{ $tag->film_id }}</td>
                    <td>
                        <div class="d-flex flex-col gap-2">
                            <button class="btn btn-danger">
                                <form action="{{ route('tag.destroy', $tag->id) }}" method="POST">
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



    </div>
</x-app-layout>
