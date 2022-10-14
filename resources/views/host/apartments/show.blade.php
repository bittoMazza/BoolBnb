@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
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
                <div class="card my-4">
                    <div class="row">
                        <div class="row row-cols-3">
                            @forelse ($apartment->images as $image)
                                <div class="col">
                                    @if (filter_var($image->image, FILTER_VALIDATE_URL))
                                        <img src="{{ $image->image }}" alt="{{ $apartment->title }}"
                                            class="w-100 shadow-1-strong rounded mb-4" />
                                        {{-- url --}}
                                    @else
                                        <img src="{{ asset('storage/' . $image->image) }}"
                                            alt="{{ $apartment->title }}" class="w-100 shadow-1-strong rounded mb-4" />
                                        {{-- file --}}
                                    @endif
                                </div>
                                @empty
                                    Non ci sono immagini
                                @endforelse
                        </div>


                    </div>

                    <div class="card-body">
                        <h5 class="card-title">{{ $apartment->title }}</h5>
                        <p class="card-text">Stanze: {{ $apartment->rooms }}</p>
                        <p class="card-text">Bagni: {{ $apartment->bathrooms }}</p>
                        <p class="card-text">Letti: {{ $apartment->beds }}</p>
                        <p class="card-text">Indirizzo: {{ $apartment->address }}</p>
                        <form action="{{ route('host.apartments.destroy', $apartment->id) }}" method="POST"
                            class="d-inline             form-apartment-delete">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-warning">
                                Cestina
                            </button>
                        </form>
                        <span class="card-text btn btn-primary text-white">Numero visite: {{ $views }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
