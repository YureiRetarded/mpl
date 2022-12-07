@extends('layouts.public')
@section('Подтверждения Email','Вход')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Подтвердите свой email</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Новый ссылка была отправлена
                        </div>
                    @endif

                    Пожалуйста подтвердите свой email, прежде чем продолжить.
                    Если вы не получили ссылку:
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Нажмите чтобы отправить новую ссылку</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
