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
                            <th scope="col">User ID</th>
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
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($apartments as $apartment)
                            <tr>
                                <th scope="row">
                                    {{ $apartment->user->id }}
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
                                    {{ $apartment->image }}
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
                                    {{-- <a href="{{ route('host.apartments.edit') }}" class="btn btn-sm btn-success">
                                        Edit
                                    </a> --}}
                                    Edit
                                </td>
                                <td>
                                    {{-- <form action="{{ route('host.apartments.destroy', $apartment->id) }}" method="apartment"
                                        class="form-apartment-delete" data-apartment-name="{{ $apartment->title }}">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger">
                                            Delete
                                        </button>
                                    </form> --}}
                                    Delete
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