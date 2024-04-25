@extends('public.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <img src="{{ $film->poster }}" alt="{{ $film->getTranslatedAttribute('title')}}" class="img-fluid">
                <div class="mt-3">
                    @foreach($film->images as $image)
                        <img src="{{ $image->url }}" alt="poster" class="img-fluid">
                    @endforeach
                </div>
            </div>
            <div class="col-md-4">
                <h2>{{ $film->getTranslatedAttribute('title')}} ({{ $film->release_year }})</h2>
                <p>{{ $film->getTranslatedAttribute('description') }}</p>

               @foreach($film->castMembers as $member)
                    <p>{{ $member->getTranslatedAttribute('name') }}</p>
                    <p>{{ $member->getTranslatedType($member->type) }}</p>
                    <img width="50px" height="50px" src="{{ $member->photo }}"></img>
               @endforeach
                <br>
                <br>
                @foreach($film->tags as $tag)
                    <span class="badge badge-primary">{{ $tag->getTranslatedAttribute('tag_name') }}</span>
                @endforeach
                <br>
                <br>
                @if($currentDate >= $film->start_date && $currentDate <= $film->end_date)
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{ $film->youtube_trailer_id }}" frameborder="0" allowfullscreen></iframe>
                @else
                    <p>{{(__('messages.video_unavailable'))}}</p>
                @endif
                <br>
                <br>
                @foreach($film->images as $image)
                    <img class="mt-2 mb-2" width="250px" height="250px" src="{{ $image->image }}"></img>
                @endforeach
            </div>
        </div>
    </div>
@endsection
