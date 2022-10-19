@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary fw-bold text-white">{{ __('Registrazione') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" id="form">
                        @csrf

                        <div class="form-group row py-2">
                            <label for="Nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome*') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <div class="error"></div>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row py-2">
                            <label for="Cognome" class="col-md-4 col-form-label text-md-right">{{ __('Cognome*') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>
                                <div class="error"></div>
                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row py-2">
                            <label for="Data di nascita" class="col-md-4 col-form-label text-md-right">{{ __('Data di nascita*') }}</label>

                            <div class="col-md-6">
                                <input id="date_birth" type="date" class="form-control @error('date_birth') is-invalid @enderror" name="date_birth" value="{{ old('date_birth') }}" required autocomplete="date_birth" autofocus>
                                <div class="error"></div>
                                @error('date_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row py-2">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email*') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                <div class="error"></div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row py-2">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password*') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <div class="error"></div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row py-2">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password*') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <div class="error"></div>
                            </div>
                        </div>

                        <div class="form-group row mb-0 my-2">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary text-white">
                                    {{ __('Registrati') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


