@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if (session('delete'))
                    <div class="alert alert-warning">
                        "{{ session('delete') }}" was successfully removed.
                    </div>
                @endif
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
                            <th scope="col">Msg</th>
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
                                        <img src="{{ $apartment->image }}" alt="{{ $apartment->title }}" class="img-fluid rounded-start" />
                                        {{-- url --}}
                                    @else
                                        <img src="{{ asset('storage/' . $apartment->image) }}" alt="{{ $apartment->title }}" class="img-fluid rounded-start" />
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
                                    <a href="{{ route('host.apartments.edit', $apartment->id) }}" class="btn btn-sm btn-success">
                                        Modifica
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('host.apartments.destroy', $apartment->id) }}" method="POST" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-warning">
                                            Cestina
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    @forelse ($apartment->messages as $message)
                                        {{ $message }}
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