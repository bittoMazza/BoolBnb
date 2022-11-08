@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row bg-light">
            <div class="col-12">
                @if (session('created'))
                    <div class="alert alert-success">
                        {{ session('created') }}
                    </div>
                @elseif (session('edited'))
                    <div class="alert alert-success">
                        {{ session('edited') }}
                    </div>
                @elseif (session('sponsor'))
                    <div class="alert alert-success">
                        {{ session('sponsor') }}
                    </div>
                @endif

                <h1 class="card-title my-4 fw-bold"><i class="bi bi-house me-1"></i> {{ $apartment->title }}</h1>
                <h3 class="card-title my-4 fw-bold"><i
                        class="bi bi-circle-fill {{ $apartment->is_visible ? 'text-success' : 'text-danger' }}"></i>
                    {{ $apartment->is_visible ? 'Appartamento disponibile' : 'Appartamento non disponibile, clicca su "Modifica" per renderlo disponibile' }}
                </h3>
                <h5 class="card-title my-4 fst-italic">Indirizzo: <span class="fw-semibold">{{ $apartment->address }}</span>
                    -
                    {{ $apartment->lat }}, {{ $apartment->long }}</h5>
                <div class="row">
                    <div class="row row-cols-3">
                        @forelse ($apartment->images as $image)
                            <div class="col">
                                @if (filter_var($image->image, FILTER_VALIDATE_URL))
                                    <img src="{{ $image->image }}" alt="{{ $apartment->title }}"
                                        class="show_image w-100 shadow rounded mb-4" />
                                    {{-- url --}}
                                @else
                                    <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $apartment->title }}"
                                        class="show_image w-100 shadow rounded mb-4" />
                                    {{-- file --}}
                                @endif
                            </div>
                        @empty
                            Non ci sono immagini
                        @endforelse
                    </div>
                </div>

            
                <ul class="fs-5 list-group  list-group-horizontal mt-4">
                    <li class="list-group-item bg-primary py-2 text-white">
                        <i class="bi bi-house-door-fill me-2"></i> Stanze:
                        {{ $apartment->rooms }}
                    </li>
                    <li class="list-group-item bg-primary py-2 text-white">
                        <i class="bi bi-hdd-fill me-2"></i> Letti:
                        {{ $apartment->beds }}
                    </li>
                    <li class="list-group-item bg-primary py-2 text-white">
                        <i class="bi bi-door-closed-fill me-2"></i>Bagni:
                        {{ $apartment->bathrooms }}
                    </li>
                    <li class="list-group-item bg-primary py-2 text-white">
                        <i class="bi bi-fullscreen me-2"></i>
                        {{ $apartment->square_meters }}m²
                    </li>
                </ul>

                <h3 class="fw-bold mt-5">Servizi offerti al cliente</h3>
                @foreach ($apartment->amenities as $amenity)
                    <ul class="mt-4">
                        <li class="fs-4">
                            <i class="bi bi-check-lg"></i> {{ $amenity->name }}
                        </li>
                    </ul>
                @endforeach

                <div>
                    @forelse ($sponsorPlan as $sponsorship)
                        <span>{{ $sponsorship->level }}</span>
                        <span>{{ $sponsorship->name }}</span>
                        <span>{{ $sponsorship->price }}</span>
                        <span>{{ $sponsorship->duration }}</span>
                        <a href="{{ route('host.sponsorshipApartment', $apartment->id) }}">
                            Acquista Ora
                        </a>
                    @empty
                    
                    @endforelse
                </div>


                <div class="d-flex pb-4">

                    <a href="{{ route('host.apartments.edit', $apartment->id) }}"
                        class="btn btn-success me-2 text-white fw-bold">
                        Modifica
                    </a>

                    <form action="{{ route('host.apartments.destroy', $apartment->id) }}" method="POST" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-warning ms-2 fw-bold">
                            Cestina
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <h1 class="text-center">MAPPA</h1>
    <div id="map-div"></div>
    </div>
    
@endsection
