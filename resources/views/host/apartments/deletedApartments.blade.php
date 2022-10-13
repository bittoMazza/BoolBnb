@extends('layouts.app')

@section('content')
<h2 class="text-center mt-2">Appartamenti nel cestino</h2>
<div class="col-4 mx-auto p-3 mt-3 mb-2">
   @forelse ($apartments as $apartment)
        <div>
            {{ $apartment->title }}
        </div>
   @empty
       non sono stati eliminati post
   @endforelse
</div>
@endsection