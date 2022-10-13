@extends('layouts.app')

@section('content')
    <div class="index_background">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if (session('delete'))
                        <div class="alert alert-warning">
                            "{{ session('delete') }}" was successfully removed.
                        </div>
                    @endif

                    {{-- DASHBOARD DESIGN --}}
                    <div class="row my-4">

                        <div class="col-3">
                            <div class="index_user_panel w-100 bg-light p-3 shadow-sm rounded">
                                <div class="text-center">
                                    <div class="bg-primary p-5 text-white">Utente</div>
                                    <div class="font-weight-bold mt-2">Nome Utente</div>
                                    <div class="font-weight-light mb-2">Data di nascita</div>
                                </div>

                                <div class="pt-3">Indirizzo e-mail</div>
                                <div>Visualizzazioni appartamenti: 0</div>
                                <div class="btn btn-sm btn-outline-primary mt-3 ">Messaggi</div>
                                <div class="user_panel_messages p-3">
                                    <div class="my-2">
                                        <div><span class="font-weight-bold">Autore:</span> Mario</div>
                                        <div><span class="font-weight-bold">Mail:</span> mario@mario.it</div>
                                        <p><span class="font-weight-bold">Contenuto:</span> Lorem ipsum dolor sit amet
                                            consectetur, adipisicing elit. Perspiciatis temporibus exercitationem, magnam
                                            sed ex enim, placeat quae amet voluptate dolores deleniti unde asperiores
                                            perferendis quam nostrum consectetur, odio iste magni!</p>
                                    </div>
                                    <div class="my-2">
                                        <div><span class="font-weight-bold">Autore:</span> Paolo</div>
                                        <div><span class="font-weight-bold">Mail:</span> paolo@paolo.it</div>
                                        <p><span class="font-weight-bold">Contenuto:</span> Lorem ipsum dolor sit amet
                                            consectetur, adipisicing elit. Perspiciatis temporibus exercitationem, magnam
                                            sed ex enim, placeat quae amet voluptate dolores deleniti unde asperiores
                                            perferendis quam nostrum consectetur, odio iste magni!</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-9">
                            <div class="index_user_management">
                                <h2 class="font-weight-bold">I miei Appartamenti</h2>

                                <div class="row justify-content-around">
                                    <div class="col-6 d-flex">
                                        <div class="card w-50 mr-4">
                                            <img class="card-img-top" src="https://cf.bstatic.com/xdata/images/hotel/max500/162105631.jpg?k=8a20c08a1592ff9589716815636f14eef9f1f35a0a2dd1762ebe7b375307c727&o=&hp=1" alt="titolo">
                                            <div class="card-body card-body-cascade pb-0">
                                                <h5 class="card-title"><strong>Casa sul Mare</strong></h5>
                                                <p class="font-italic pb-1">Via Salita Castello 13, 80079 Procida, Italia</p>
                                            </div>
                                        </div>
                                        <div class="card w-50">
                                            <img class="card-img-top" src="https://cf.bstatic.com/xdata/images/hotel/max1280x900/299548786.jpg?k=bf33a424fd5407bbb4ba53d7b1be2f2456da4d3aab923a90ee61fdeaa5a7f1e7&o=&hp=1" alt="titolo">
                                            <div class="card-body card-body-cascade pb-0">
                                                <h5 class="card-title"><strong>Corallo Residence</strong></h5>
                                                <p class="font-italic pb-1">284 Via Vittorio Emanuele 284, 80079 Procida, Italia</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <ul>
                                            <li class="mb-3">
                                                <div class="row">
                                                    <div class="col-8">
                                                        <strong>Casa sul mare - </strong><span class="font-italic">Via Salita Castello 13, 80079 spanrocida, Italia</span>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="d-flex">
                                                            <a href="#" class="btn btn-sm btn-success mr-2">Modifica</a>
                                                            <button type="submit" class="btn btn-sm btn-warning">
                                                                Cestina
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="row">
                                                    <div class="col-8">
                                                        <strong>Corallo Residence - </strong><span class="font-italic">284 Via Vittorio Emanuele 284, 80079 Procida, Italia</span>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="d-flex">
                                                            <a href="#" class="btn btn-sm btn-success mr-2">Modifica</a>
                                                            <button type="submit" class="btn btn-sm btn-warning">
                                                                Cestina
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="d-flex p-4">
                                            <img class="ms_icon_create_apartment mr-2" src="https://tinypic.host/images/2022/10/13/add.png" alt="create"> 
                                            <a href="#"><p><strong>Aggiungi un nuovo appartamento</strong></p></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    {{-- TABLE DESIGN --}}
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
                                        @if (filter_var($apartment->image, FILTER_VALIDATE_URL))
                                            <img src="{{ $apartment->image }}" alt="{{ $apartment->title }}"
                                                class="img-fluid rounded-start" />
                                            {{-- url --}}
                                        @else
                                            <img src="{{ asset('storage/' . $apartment->image) }}"
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
                    </table>

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
