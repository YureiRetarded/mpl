@extends('layouts.public')
@section('title','Настройки')
@section('content')
    <h5>Настройки</h5>
    <div class="mb-4">
        <form method="POST" action="{{route('user.updateAbout')}}">
            @csrf
            <div class="mb-3">
                <label for="about" class="form-label">Обо мне</label>
                @if (session('statusAbout'))
                    <div class="alert alert-success" role="alert">
                        {{ session('statusAbout') }}
                    </div>
                @endif
                <textarea name="about" class="form-control" id="about" rows="10">
                {{auth()->user()->about}}
            </textarea>
                @error('about')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
    </div>



    <div class="mb-4">
        <form method="POST" action="{{route('user.updateName')}}">
            @csrf
            <label class="form-label">Смена имени</label>
            <p>Текущие имя: {{auth()->user()->name}}</p>
            @if (session('statusName'))
                <div class="alert alert-success" role="alert">
                    {{ session('statusName') }}
                </div>
            @endif

            <div class="mb-3">
                <label for="newNameInput" class="form-label">Новое имя</label>
                <input name="name" type="text" class="form-control" id="newNameInput"
                       placeholder="Новое имя">
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button class="btn btn-primary">Изменить</button>
        </form>
    </div>






    <div class="mb-4">
        <form method="POST" action="{{route('user.updatePassword')}}">
            @csrf
            <label class="form-label">Смена пароля</label>
            @if (session('statusPassword'))
                <div class="alert alert-success" role="alert">
                    {{ session('statusPassword') }}
                </div>
            @endif
            @if (session('statusPasswordError'))
                <div class="alert alert-danger" role="alert">
                    {{ session('statusPasswordError') }}
                </div>
            @endif
            <div class="mb-3">
                <label for="oldPasswordInput" class="form-label">Старый пароль</label>
                <input name="old_password" type="password" class="form-control" id="oldPasswordInput"
                       placeholder="Старый пароль">
                @error('old_password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="newPasswordInput" class="form-label">Новый пароль</label>
                <input name="new_password" type="password" class="form-control" id="newPasswordInput"
                       placeholder="Новый пароль">
                @error('new_password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="confirmNewPasswordInput" class="form-label">Подвердите новый пароль</label>
                <input name="new_password_confirmation" type="password" class="form-control"
                       id="confirmNewPasswordInput"
                       placeholder="Подвердите новый пароль">
            </div>
            <button class="btn btn-primary">Изменить</button>
        </form>
    </div>
@endsection
