@extends('layouts.app')

@section('content')
    <h2 class="text-center mt-2">Form per modificare appartamento</h2>
    <div class="col-4 mx-auto p-3 mt-3 mb-2 bg-dark">
        <form action="{{ route('host.apartments.update', $apartment->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT');
            @include('host.apartments.forms.form');
        </form>
    </div>
@endsection
