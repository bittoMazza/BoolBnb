@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center text-center">
        <div class="row">
            <div class="col-12">
                <h1 class="mt-5">Benvenuto</h1>
                <h2>{{ Auth::user()->name }}</h2>
                <img src="{{ asset('assets/img/Bool_bnb_logo_alpha.png') }}" alt="img">
            </div>
        </div>
        <div id="loading-bar-spinner" class="spinner">
            <div class="spinner-icon"></div>
        </div>
    </div>
@endsection
