@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    @if (filter_var($apartment->image, FILTER_VALIDATE_URL))
                        <img src="{{ $apartment->image }}" alt="{{ $apartment->title }}" class="img-fluid rounded-start" />
                        {{-- url --}}
                    @else
                        <img src="{{ asset('storage/' . $apartment->image) }}" alt="{{ $apartment->title }}" class="img-fluid rounded-start" />
                        {{-- file --}}
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $apartment->title }}</h5>
                        <p class="card-text">Stanze: {{ $apartment->rooms }}</p>
                        <p class="card-text">Bagni: {{ $apartment->bathrooms }}</p>
                        <p class="card-text">Letti: {{ $apartment->beds }}</p>
                        <p class="card-text">Indirizzo: {{ $apartment->address }}</p>
                        <a href="#" class="btn btn-danger text-white">Rimuovi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
