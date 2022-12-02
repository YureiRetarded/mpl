@extends('layouts.public')
@section('title','Регистрация')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Регистрация</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Имя</label>
                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}" required autocomplete="name" autofocus
                                           aria-describedby="nameHelp">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div id="nameHelp" class="form-text">Имя или прозвище которое будет отображаться у
                                        Вас в профиле
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="login" class="col-md-4 col-form-label text-md-end">Ссылка</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text" id="urlPage">https://myprojectlist.ru/users/</span>
                                        <input id="login" type="text"
                                               class="form-control @error('login') is-invalid @enderror" name="login"
                                               value="{{ old('login') }}" required autocomplete="login"
                                               aria-describedby="loginHelp urlPage">
                                    </div>
                                    @error('login')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div id="loginHelp" class="form-text">
                                        Ссылка с помощью которой можно перейти на вашу страницу
                                    </div>
                                </div>
                            </div>
{{--                            <div class="row mb-3">--}}
{{--                                <label for="login" class="col-md-4 col-form-label text-md-end">Ссылка</label>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <div class="input-group">--}}
{{--                                        <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>--}}
{{--                                        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}



                            <div class="row mb-3">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-end">Email</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-end">Пароль</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-end">Подтвердите пароль</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Присоединиться
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
