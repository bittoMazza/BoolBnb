@extends('layouts.app')

@section('content')
    <div class="index_background pb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if (session('deleted'))
                        <div class="alert alert-danger my-2 mt-3">
                            {{ session('deleted') }}
                        </div>
                    @elseif (session('restored'))
                        <div class="alert alert-success my-2 mt-3">
                            {{ session('restored') }}
                        </div>
                    @endif

                    @if (session('not-allowed'))
                        <div class="alert alert-warning my-2 mt-3">
                            {{ session('not-allowed') }}
                        </div>
                    @endif

                    {{-- DASHBOARD DESIGN --}}
                    <div class="row my-4">

                        <div class="col-12 col-lg-3">
                            <div class="index_user_panel w-100 h-100 bg-light p-3 shadow-sm rounded">

                                @forelse ($users as $user)
                                    <div class="text-center">
                                        <img class="rounded w-75"
                                            src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png"
                                            alt="{{ $user->name }}">
                                        <h4 class="fw-bold mt-2 fs-3">{{ $user->name }}</h4>
                                        <div class="fw-light mb-2">Anno di nascita: {{ $user->date_birth }}</div>
                                    </div>

                                    <div class="pt-3 text-center">Indirizzo e-mail: <strong>{{ $user->email }}</strong></div>
                                @empty
                                    <div>Non ci sono informazioni disponibili</div>
                                @endforelse


                                <h5 class="text-dark text-center my-3"> Messaggi:</h5>
                                @forelse($apartments as $apartment)
                                    <div class="mt-3 rounded-0 active text-white">
                                        <button class="btn ms_dimensions_btn_messagges btn-sm btn-primary text-white fw-bold dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                           {{ $apartment->title }}
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-bottom user_panel_messages p-3">
                                            @forelse ($apartment->messages as $message)
                                                <div class="my-3">
                                                    <div><span class="fw-bold">Autore:</span> {{ $message->name }}</div>
                                                    <div><span class="fw-bold">E-mail:</span> {{ $message->email }}</div>
                                                    <p><span class="fw-bold">Contenuto:</span> {{ $message->content }}</p>
                                                </div>
                                            @empty
                                                Non ci sono messaggi
                                            @endforelse
                                        </div>
                                    </div>
                                @empty
                                    <div>Non ci sono informazioni disponibili.</div>
                                @endforelse

                            </div>
                        </div>

                        <div class="col-12 g-5 col-lg-9 mt-3">
                            <div class="index_user_management">
                                <h2 class="fw-bold apartments-title title_sm">I miei Appartamenti</h2>

                                <div class="row justify-content-around">
                                    <div class="col-12 col-lg-6 my-2 d-flex flex-wrap justify-content-between px-1">
                                        @forelse ($apartments as $apartment)
                                            <div class="card w-50 mb-2">
                                                @foreach ($apartment->images as $image)
                                                    @if ($image->is_cover == true)
                                                        @if (filter_var($image->image, FILTER_VALIDATE_URL))
                                                            <a href="{{ route('host.apartments.show', $apartment->id) }}">
                                                                <img src="{{ $image->image }}"
                                                                    alt="{{ $apartment->title }}"
                                                                    class="index_image card-img-top rounded-3 p-1" />
                                                                {{-- url --}}
                                                            </a>
                                                        @else
                                                            <a href="{{ route('host.apartments.show', $apartment->id) }}">
                                                                <img src="{{ asset('storage/' . $image->image) }}"
                                                                    alt="{{ $apartment->title }}"
                                                                    class="index_image card-img-top rounded-3" />
                                                                {{-- file --}}
                                                            </a>
                                                        @endif
                                                    @endif
                                                @endforeach

                                                <div class="card-body card-body-cascade pb-0">

                                                    <h5 class="card-title"><strong>
                                                            <a class="text-decoration-none"
                                                                href="{{ route('host.apartments.show', $apartment->id) }}">
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
                                    <div class="col-12 g-5 col-lg-6 mt-4">
                                        <span class="fw-bold fs-4">
                                            Gestione rapida degli Appartamenti:
                                        </span>
                                        <div class="mt-4"><a
                                                class="btn btn-sm btn-success text-white px-3 fw-bold fs-5 {{ request()->routeIs('host.apartments.create') ? 'active' : '' }}"
                                                href="{{ route('host.apartments.create') }}"> + Aggiungi Appartamento</a>
                                        </div>
                                        <ul class="mt-4 mb-4">
                                            @forelse ($apartments as $apartment)
                                                <li class="mb-3">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <strong>{{ $apartment->title }} - </strong><span
                                                                class="fst-italic">{{ $apartment->address }}</span>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="d-flex">
                                                                <a href="{{ route('host.apartments.edit', $apartment->id) }}"
                                                                    class="btn btn-sm btn-primary text-white mr-2 fw-bold">
                                                                    Modifica
                                                                </a>
                                                                <form
                                                                    action="{{ route('host.apartments.destroy', $apartment->id) }}"
                                                                    method="POST" class="d-inline">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-warning ms-2 fw-bold">
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

                                        <a class="text-decoration-none"
                                            href="{{ route('host.apartments.deletedApartments') }}">
                                            <div class="recycle-bin">
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <i class="bi bi-trash3-fill text-light fs-2 mt-1"></i>

                                                </div>
                                                <h5 class="text-center text-white">Vai al cestino</h5>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
