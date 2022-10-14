@extends('layouts.app')

@section('content')
    <div class="index_background pb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if (session('delete'))
                        <div class="alert alert-warning">
                            "{{ session('delete') }}" was successfully removed.
                        </div>
                    @endif

                    @if (session('not-allowed'))
                        <div class="alert alert-warning">
                            {{ session('not-allowed') }}
                        </div>
                    @endif

                    {{-- DASHBOARD DESIGN --}}
                    <div class="row my-4">

                        <div class="col-3">
                            <div class="index_user_panel w-100 bg-light p-3 shadow-sm rounded">

                                @forelse ($users as $user)
                                    <div class="text-center">
                                        <img class="rounded w-75" src="https://tinypic.host/images/2022/10/14/User-Profile-PNG-High-Quality-Image.png" alt="{{ $user->name }}">
                                        <h4 class="fw-bold mt-2 fs-3">{{ $user->name }}</h4>
                                        <div class="fw-light mb-2">Anno di nascita: {{ $user->date_birth }}</div>
                                    </div>

                                    <div class="pt-3">Indirizzo e-mail: <strong>{{ $user->email }}</strong></div>
                                @empty
                                    <div>Non ci sono informazioni disponibili</div>
                                @endforelse
                                    
                
                                @forelse($apartments as $apartment)
                                <div class="mt-3 btn btn-sm btn-outline-primary active text-white"><strong>Messaggi: {{ $apartment->title }}</strong></div>
                                <div class="user_panel_messages px-1">
                                @forelse ($apartment->messages as $message)
                                    <div class="my-3">
                                        <div><span class="fw-bold">Autore:</span> {{ $message->name }}</div>
                                        <div><span class="fw-bold">Mail:</span> {{ $message->email }}</div>
                                        <p><span class="fw-bold">Contenuto:</span> {{ $message->content }}</p>
                                    </div>
                                    @empty
                                    Non ci sono messaggi
                                    @endforelse
                                </div>
                                @empty
                                    <div>Non ci sono informazioni disponibili.</div>
                                @endforelse
                                
                            </div>
                        </div>

                        <div class="col-9">
                            <div class="index_user_management">
                                <h2 class="fw-bold">I miei Appartamenti</h2>

                                <div class="row justify-content-around">
                                    <div class="col-6 d-flex flex-wrap justify-content-between px-1">
                                        @forelse ($apartments as $apartment)
                                            <div class="card w-50 mb-2">
                                                @if (filter_var($apartment->images[0]->image, FILTER_VALIDATE_URL))
                                                <a href="{{ route('host.apartments.show', $apartment->id) }}">
                                                    <img src="{{ $apartment->images[0]->image }}" alt="{{ $apartment->title }}"
                                                        class="card-img-top rounded-start" />
                                                    {{-- url --}}
                                                </a>
                                                @else
                                                <a href="{{ route('host.apartments.show', $apartment->id) }}">
                                                    <img src="{{ asset('storage/' . $apartment->images[0]->image) }}"
                                                        alt="{{ $apartment->title }}" class="card-img-top rounded-start" />
                                                    {{-- file --}}
                                                </a>
                                                @endif

                                                <div class="card-body card-body-cascade pb-0">
                                                    <h5 class="card-title"><strong>
                                                        <a href="{{ route('host.apartments.show', $apartment->id) }}">
                                                            {{ $apartment->title }}                                                        
                                                        </a>
                                                    </strong></h5>
                                                    <p class="fst-italic pb-1">{{ $apartment->address }}</p>
                                                </div>
                                            </div>
                                        @empty
                                            <div>Non hai appartamenti.</div>
                                        @endforelse
                                    </div>
                                    <div class="col-6">
                                        <ul>
                                            @forelse ($apartments as $apartment)
                                                <li class="mb-3">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <strong>{{ $apartment->title }} - </strong><span class="fst-italic">{{ $apartment->address }}</span>
                                                        </div>
                                                        <div class="col-2">
                                                            <div class="d-flex">
                                                                <a href="{{ route('host.apartments.edit', $apartment->id) }}"
                                                                    class="btn btn-sm btn-success mr-2 text-white">
                                                                    Modifica
                                                                </a>
                                                                <form action="{{ route('host.apartments.destroy', $apartment->id) }}"
                                                                    method="POST" class="d-inline">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-sm btn-warning ms-2">
                                                                        Cestina
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @empty
                                                <div>Non hai appartamenti.</div>
                                            @endforelse
                                        </ul>
                                        <div class="d-flex p-4">
                                            <img class="ms_icon_create_apartment mr-2" src="https://tinypic.host/images/2022/10/13/add.png" alt="create"> 
                                            <a class="ms-2" href="{{ route('host.apartments.create') }}"><p><strong>Aggiungi un nuovo appartamento</strong></p></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- TABLE DESIGN --}}
                    {{-- <hr>
                    
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
                                <th scope="col">Msg Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($apartments as $apartment)
                                <tr>
                                    <th scope="row">
                                        {{ $apartment->id }} --}}
                                        {{-- <a href="{{ route('host.apartments.show') }}">
                                        {{ $apartment->id }}
                                    </a> --}}
                                    {{-- </th>
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
                                        @if (filter_var($apartment->image, FILTER_VALIDATE_URL))
                                            <img src="{{ $apartment->image }}" alt="{{ $apartment->title }}"
                                                class="img-fluid rounded-start" /> --}}
                                            {{-- url --}}
                                        {{-- @else
                                            <img src="{{ asset('storage/' . $apartment->image) }}"
                                                alt="{{ $apartment->title }}" class="img-fluid rounded-start" /> --}}
                                            {{-- file --}}
                                        {{-- @endif
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
                                        <a href="{{ route('host.apartments.edit', $apartment->id) }}"
                                            class="btn btn-sm btn-success">
                                            Modifica
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('host.apartments.destroy', $apartment->id) }}"
                                            method="POST" class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-warning">
                                                Cestina
                                            </button>
                                        </form>
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
                    </table> --}}

                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer-scripts')
    <script>
        const deleteFormElements = document.querySelectorAll('.form-apartment-delete');
        deleteFormElements.forEach(
            formElement => {
                formElement.addEventListener('submit', function(event) {
                    const name = this.getAttribute('data-apartment-name');
                    event.preventDefault();
                    const result = window.confirm(`Are you sure you want to delete "${name}"?`);
                    if (result) this.submit();
                })
            }
        )
    </script>
@endsection
