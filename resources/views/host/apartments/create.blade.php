@extends('layouts.app')

@section('content')   
<h2 class="text-center mt-2">Form per creazione appartamento</h2>
<div class="col-6 p-3 m-3 mx-auto bg-dark rounded-4">
    <form action="{{ route('host.apartments.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST'); 
        @include('host.apartments.forms.form');
    </form>
</div>
@endsection