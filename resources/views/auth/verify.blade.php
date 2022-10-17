@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Verifica il tuo indirizzo e-mail.') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Un link di verifica è stato mandato alla tua casella di posta.') }}
                            </div>
                        @endif

                        {{ __('Prima di procedere, controlla la tua casella di posta per il link di verifica') }}
                        {{ __('Se non ricevi la mail.') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit"
                                class="btn btn-link p-0 m-0 align-baseline">{{ __('clicca qui per richiedere un nuovo link.') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
