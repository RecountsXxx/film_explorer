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
                <th scope="col">{{ __('messages.type') }}</th>
                <th scope="col">{{ __('messages.photo') }}</th>
                <th scope="col">{{ __('messages.operations') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($members as $member)
                <tr>
                    <th scope="row">{{ $member->id }}</th>
                    <td>{{ $member->name_uk }}</td>
                    <td>{{ $member->name_en }}</td>
                    <td>{{ $member->type }}</td>
                    <td><img src="{{ $member->photo }}" alt="{{ __('messages.poster') }}" style="max-width: 120px; max-height:120px;"></td>
                    <td>
                        <div class="d-flex flex-col gap-2">
                            <button class="btn btn-primary">
                                <a class="text-white" href="{{ route('member.edit', $member->id) }}">{{ __('messages.edit') }}</a>
                            </button>
                            <button class="btn btn-danger">
                                <form action="{{ route('member.destroy', $member->id) }}" method="POST">
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

        {{ $members->links() }}

    </div>
</x-app-layout>
