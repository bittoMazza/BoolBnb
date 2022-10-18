@extends('layouts.app')

@section('content')
    <h2 class="text-center mt-2">Form per modificare appartamento</h2>
    <div class="col-6 mx-auto p-3 m-3 bg-dark rounded-4">
        <form action="{{ route('host.apartments.update', $apartment->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT');
            @include('host.apartments.forms.form');
        </form>
        
        <button class="btn btn-outline-primary ms_pos_btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Immagini Presenti
        </button>
        <div class="dropdown-menu dropdown-menu-bottom bg-dark p-3 dropdown-menu-images">
            @foreach ($apartment->images as $image)
            <div>
                <div class="mt-3 mb-1">
                    @if (filter_var($image->image, FILTER_VALIDATE_URL))
                        <img class="w-100" src="{{ $image->image }}" alt="">
                        {{-- url --}}
                    @else
                        <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $apartment->title }}"/>
                        {{-- file --}}
                    @endif   
                </div>
                <div class="d-flex justify-content-center">
                    <form action="{{ route('host.apartments.deleteImage', $image->id) }}" method="POST" enctype="multipart/form-data" class="d-inline">
                        @method('DELETE')
                        @csrf

                        @if (count($apartment->images) > 1)
                            <button class="btn btn-sm btn-danger">
                                cancella
                            </button>   
                        @else
                            <span class="text-white"></span>
                        @endif
                    </form>
                </div>
            </div>
        @endforeach
        </div>
    </div>
@endsection
