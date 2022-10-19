@extends('layouts.app')

@section('content')   
<h2 class="text-center mt-5">Inserisci il tuo appartamento </h2>
<div class="col-4 p-3 m-3 mx-auto bg-primary rounded-4">
    <form action="{{ route('host.apartments.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST') 
        @include('host.apartments.forms.form')
    </form>
</div>
@endsection
