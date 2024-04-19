@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
{{--                <div class="card-header">{{ __('Verify Your Email Address') }}</div>--}}
                <div class="card-header">Verifique seu e-mail</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
{{--                            {{ __('A fresh verification link has been sent to your email address.') }}--}}
                            Reenviamos um e-mail para você com o link de validação
                        </div>
                    @endif

{{--                    {{ __('Before proceeding, please check your email for a verification link.') }}--}}
{{--                    {{ __('If you did not receive the email') }},--}}

                    Antes de prosseguir, por favor, valide seu e-mail com o link que lhe enviamos,</br>
                    Se você não recebeu o e-mail
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
{{--                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.--}}
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">clique aqui</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
