@extends('layouts.app')

@section('content')
    <h2 class="text-center mt-5">Inserisci l'appartamento</h2>
    <div class="col-lg-4 col-md-6 col-sm-8 p-3 m-3 mx-auto bg-dark rounded-4">
        <form id="form_apartment" action="{{ route('host.apartments.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            @include('host.apartments.forms.form')
        </form>
    </div>
@endsection
