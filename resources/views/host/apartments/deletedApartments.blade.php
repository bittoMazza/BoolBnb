@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center fs-2 fw-bold my-4"><i class="bi bi-trash3-fill text-primary"></i>
            Appartamenti nel cestino
        </div>
        <div>
            @if (!$apartments->isEmpty())
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 flex-wrap">
                    @forelse ($apartments as $apartment)
                        <div class="col">
                            <div class="card my-3">
                                @if (isset($apartment->images['0']->image))
                                    @if (filter_var($apartment->images['0']->image, FILTER_VALIDATE_URL))
                                        <img src="{{ $apartment->images['0']->image }}" alt="{{ $apartment->title }}"
                                            class="deleted_image" />
                                    @else
                                        <img src="{{ asset('storage/' . $apartment->images['0']->image) }}"
                                            alt="{{ $apartment->title }}" class="deleted_image" />
                                    @endif
                                @else
                                    <div>nessuna immagine presente</div>
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="{{ route('host.apartments.show', $apartment->id) }}">
                                            {{ $apartment->title }}
                                        </a>
                                    </h5>
                                </div>
                                <div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            Utente: {{ $apartment->user->name }}
                                        </li>
                                        <li class="list-group-item">
                                            ID Appartamento: {{ $apartment->id }}
                                        </li>
                                        <li class="list-group-item">
                                            Via: {{ $apartment->address }}
                                        </li>
                                        @forelse ($apartment->messages as $message)
                                            <li class="list-group-item">
                                                Messaggio di: {{ $message->name }}
                                            </li>
                                        @empty
                                            <li class="list-group-item">
                                                Non ci sono messaggi
                                            </li>
                                        @endforelse
                                    </ul>
                                </div>
                                <div class="card-body text-center">
                                    <a class="btn btn-sm btn-danger text-white mx-2 mt-3 px-2 fw-bold"
                                        href="{{ route('host.apartments.deletePermanently', $apartment->id) }}">
                                        Elimina definitivamente
                                    </a>
                                    <a class="btn btn-sm btn-success text-white mx-2 mt-3 px-1 fw-bold"
                                        href="{{ route('host.apartments.restoreApartments', $apartment->id) }}">
                                        Ripristina l'appartamento
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h3>
                            <p>Non ci sono appartamenti disponibili.</p>
                        </h3>
                    @endforelse
                </div>
            @else
                <div class="text-center mt-5">
                    <h2 class="mb-2">Non hai cancellato nessun appartamento</h2>
                    <a href="{{ route('host.apartments.index') }}" class="btn btn-sm btn-primary text-white fw-bold mt-2">
                        Torna alla DASHBOARD
                    </a>
                </div>
            @endif
        </div>
    </div>
    {{-- @if (!$apartments->isEmpty())
                    <table class="table table-striped mt-2">
                        <thead>
                            <tr>
                                <th scope="col">ID Appartamento</th>
                                <th scope="col">Utente</th>
                                <th scope="col">Titolo</th>
                                <th scope="col">Stanze</th>
                                <th scope="col">Letti</th>
                                <th scope="col">Bagni</th>
                                <th scope="col">Metri quadrati</th>
                                <th scope="col">Indirizzo</th>
                                <th scope="col">Foto di copertina</th>
                                <th scope="col">Messagi</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($apartments as $apartment)
                                <tr>
                                    <th scope="row">
                                        {{ $apartment->id }}
                                    </th>
                                    <td>{{ $apartment->user->name }}</td>
                                    <td>
                                        <a href="{{ route('host.apartments.show', $apartment->id) }}">
                                            {{ $apartment->title }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $apartment->rooms }}
                                    </td>
                                    <td>
                                        {{ $apartment->beds }}
                                    </td>
                                    <td>
                                        {{ $apartment->bathrooms }}
                                    </td>
                                    <td>
                                        {{ $apartment->square_meters }}m²
                                    </td>
                                    <td>
                                        {{ $apartment->address }}
                                    </td>
                                    <td>
                                        @if (isset($apartment->images['0']->image))
                                            @if (filter_var($apartment->images['0']->image, FILTER_VALIDATE_URL))
                                                <img src="{{ $apartment->images['0']->image }}"
                                                    alt="{{ $apartment->title }}" class="img-fluid rounded-start" />
                                            @else
                                                <img src="{{ asset('storage/' . $apartment->images['0']->image) }}"
                                                    alt="{{ $apartment->title }}" class="img-fluid rounded-start" />
                                            @endif
                                        @else
                                            <div>nessuna immagine presente</div>
                                        @endif
                                    </td>
                                    <td>
                                        @forelse ($apartment->messages as $message)
                                            {{ $message->name }}
                                        @empty
                                            Non ci sono messaggi
                                        @endforelse
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-success text-white"
                                            href="{{ route('host.apartments.restoreApartments', $apartment->id) }}">
                                            Ripristina l'appartamento
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-danger text-white"
                                            href="{{ route('host.apartments.deletePermanently', $apartment->id) }}">
                                            Elimina definitivamente
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="18">Non ci sono appartamenti disponibi.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                @else
                    <div class="text-center">
                        <a href="{{ route('host.apartments.index') }}" class="btn btn-sm btn-outline-primary">
                            Non hai cancellato nessuno appartamento, torna alla dashboard
                        </a>
                    </div>
                @endif --}}
@endsection
