@extends('layouts.app')

@section('content')
    <div class="text-center mt-5">
        <h1>Benvenuto</h1>
        <h2>{{ Auth::user()->name }}</h2>
    </div>

    <div class="loader">
        <div class="square"></div>
        <div class="square"></div>
        <div class="square last"></div>
        <div class="square clear"></div>
        <div class="square"></div>
        <div class="square last"></div>
        <div class="square clear"></div>
        <div class="square "></div>
        <div class="square last"></div>
    </div>
@endsection
