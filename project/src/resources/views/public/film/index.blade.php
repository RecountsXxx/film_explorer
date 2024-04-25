@extends('public.app')

@section('content')
    <div class="container-fluid p-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row row-cols-1 row-cols-md-4 align-items-stretch">
                    @forelse($films as $film)
                        <div class="col mb-4">
                            <div class="card h-100">
                                <a href="{{ route('public.film.show', $film->id) }}">
                                    <img style="max-height: 500px;" src="{{ $film->poster }}" class="card-img-top img-fluid" alt="{{ $film->getTranslatedAttribute('title') }}">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $film->getTranslatedAttribute('title') }}</h5>
                                    <p class="card-text">{{ $film->release_year }}, {{ $film->getTranslatedAttribute('description') }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <h1>Not films!</h1>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-md-12">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item {{ $films->previousPageUrl() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $films->previousPageUrl() }}" tabindex="-1" aria-disabled="{{ !$films->previousPageUrl() ? 'true' : 'false' }}">Previous</a>
                        </li>
                        @for ($i = 1; $i <= $films->lastPage(); $i++)
                            <li class="page-item {{ $i == $films->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $films->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <li class="page-item {{ $films->nextPageUrl() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $films->nextPageUrl() }}">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection
