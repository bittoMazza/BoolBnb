@extends('layouts.app')

@section('content')
    <h2 class="text-center mt-2">Appartamenti nel cestino</h2>
    <div class="row">
        <div class="col-12">
            @forelse ($apartments as $apartment)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Apartment ID</th>
                            <th scope="col">Username</th>
                            <th scope="col">Title</th>
                            <th scope="col">Rooms</th>
                            <th scope="col">Beds</th>
                            <th scope="col">Bathrooms</th>
                            <th scope="col">Square_meters</th>
                            <th scope="col">Address</th>
                            <th scope="col">Image</th>
                            <th scope="col">Is Visible</th>
                            <th scope="col">Long</th>
                            <th scope="col">Lat</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col">Message name</th>
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
                                    {{ $apartment->square_meters }}
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
                                    {{ $apartment->is_visible }}
                                </td>
                                <td>
                                    {{ $apartment->long }}
                                </td>
                                <td>
                                    {{ $apartment->lat }}
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-success"
                                        href="{{ route('host.apartments.restoreApartments', $apartment->id) }}">
                                        Ripristina l'appartamento
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-danger"
                                        href="{{ route('host.apartments.deletePermanently', $apartment->id) }}">
                                        Elimina definitivamente
                                    </a>
                                </td>
                                <td>
                                    @forelse ($apartment->messages as $message)
                                        {{ $message->name }}
                                    @empty
                                        Non ci sono messaggi
                                    @endforelse
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">There are no apartments available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            @empty
                non sono stati eliminati post
            @endforelse
        </div>
    </div>
@endsection
