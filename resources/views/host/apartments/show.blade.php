@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    {{-- @forelse ($apartment->messages as $message)
                        <div class="my-2">
                            <div><span class="font-weight-bold">Autore:</span> {{ $message->name }}</div>
                            <div><span class="font-weight-bold">Mail:</span> {{ $message->email }}</div>
                            <p><span class="font-weight-bold">Contenuto:</span> {{ $message->content }}</p>
                        </div>
                    @empty
                        Non ci sono messaggi
                    @endforelse --}}
                    <div class="d-flex flex-wrap">
                        @forelse ($apartment->images as $image)
                            @if (filter_var($image->image, FILTER_VALIDATE_URL))
                                <img src="{{ $image->image }}" alt="{{ $apartment->title }}" class="w-50 rounded-start" />
                                {{-- url --}}
                            @else
                                <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $apartment->title }}" class="img-fluid rounded-start" />
                                {{-- file --}}
                            @endif   
                        @empty
                            Non ci sono immagini
                        @endforelse
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">{{ $apartment->title }}</h5>
                        <p class="card-text">Stanze: {{ $apartment->rooms }}</p>
                        <p class="card-text">Bagni: {{ $apartment->bathrooms }}</p>
                        <p class="card-text">Letti: {{ $apartment->beds }}</p>
                        <p class="card-text">Indirizzo: {{ $apartment->address }}</p>
                        <form action="{{ route('host.apartments.destroy', $apartment->id) }}" method="POST" class="d-inline             form-apartment-delete">
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
