@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Benvenuto</h1>
        <h2>{{ Auth::user()->name }}</h2>
    </div>
@endsection
