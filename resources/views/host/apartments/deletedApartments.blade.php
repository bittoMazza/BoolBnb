@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center fs-2 fw-bold my-4"><i class="bi bi-trash3-fill text-primary"></i> Appartamenti nel cestino </div>
    <div class="row">
        <div class="col-12">
            @if ( !$apartments->isEmpty())
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
                                    {{-- <a href="{{ route('host.apartments.show') }}">
                        {{ $apartment->id }}
                    </a> --}}
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
                                    @if (filter_var($apartment->images['0']->image, FILTER_VALIDATE_URL))
                                        <img src="{{ $apartment->images['0']->image }}" alt="{{ $apartment->title }}"
                                            class="img-fluid rounded-start" />
                                        {{-- url --}}
                                    @else
                                        <img src="{{ asset('storage/' . $apartment->images['0']->image) }}"
                                            alt="{{ $apartment->title }}" class="img-fluid rounded-start" />
                                        {{-- file --}}
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
            @endif
                
        </div>
    </div>
</div>
@endsection
