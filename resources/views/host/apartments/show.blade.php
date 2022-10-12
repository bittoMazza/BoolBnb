@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <img src="{{ $apartment->image }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $apartment->title }}</h5>
                        <p class="card-text">Stanze: {{ $apartment->rooms }}</p>
                        <p class="card-text">Bagni: {{ $apartment->bathrooms }}</p>
                        <p class="card-text">Letti: {{ $apartment->beds }}</p>
                        <p class="card-text">Indirizzo: {{ $apartment->address }}</p>
                        <a href="#" class="btn btn-danger">Rimuovi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
