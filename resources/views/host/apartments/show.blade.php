@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row bg-light">
            <div class="col-12">
                @if (session('created'))
                    <div class="alert alert-success">
                        <h1>{{ session('created') }}</h1>
                    </div>
                @elseif (session('edited'))
                    <div class="alert alert-success">
                        <h1>{{ session('edited') }}</h1>
                    </div>
                @endif

                <h1 class="card-title my-4 fw-bold"><i class="bi bi-house me-1"></i> {{ $apartment->title }}</h1>
                <h5 class="card-title my-4 fst-italic">Indirizzo: <span class="fw-semibold">{{ $apartment->address }}</span> -
                    {{ $apartment->lat }}, {{ $apartment->long }}</h5>
                <div class="row">
                    <div class="row row-cols-3">
                        @forelse ($apartment->images as $image)
                            <div class="col">
                                @if (filter_var($image->image, FILTER_VALIDATE_URL))
                                    <img src="{{ $image->image }}" alt="{{ $apartment->title }}"
                                        class="w-100 shadow rounded mb-4" />
                                    {{-- url --}}
                                @else
                                    <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $apartment->title }}"
                                        class="w-100 shadow rounded mb-4" />
                                    {{-- file --}}
                                @endif
                            </div>
                        @empty
                            Non ci sono immagini
                        @endforelse
                    </div>
                </div>

                <h3 class="fw-bold">Cosa troverai:</h3>
                <ul class="fs-5">
                    <li class="list-group-item py-2"><i class="bi bi-house-door-fill me-2"></i> Stanze:
                        {{ $apartment->rooms }}</li>
                    <li class="list-group-item py-2"><i class="bi bi-hdd-fill me-2"></i> Letti: {{ $apartment->beds }}</li>
                    <li class="list-group-item py-2"><i class="bi bi-door-closed-fill me-2"></i> Bagni:
                        {{ $apartment->bathrooms }}</li>
                    <li class="list-group-item py-2"><i class="bi bi-fullscreen me-2"></i> Metri quadrati:
                        {{ $apartment->square_meters }}</li>
                </ul>

                <div class="d-flex pb-4">
                    <div class="text-bg-primary text-white p-2 me-4">Numero visite: {{ $views }}</div>

                    <a href="{{ route('host.apartments.edit', $apartment->id) }}" class="btn btn-success me-2 text-white">
                        Modifica
                    </a>

                    <form action="{{ route('host.apartments.destroy', $apartment->id) }}" method="POST" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-warning ms-2">
                            Cestina
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @include('partials.map')
    </div>
@endsection
