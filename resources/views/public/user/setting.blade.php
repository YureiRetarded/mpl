@extends('layouts.public')
@section('title',__('messages.setting'))
@section('content')
    <h5>{{__('messages.setting')}}</h5>
    <div class="mb-4">
        <form action="{{route('update.avatar')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="File" class="form-label">{{__('messages.avatar')}}</label>
                <input class="form-control" name="avatar" type="file" id="File"
                       accept="image/png, image/jpeg, image/jpg, image/webp" required>
            </div>
            <button type="submit" class="btn btn-primary">{{__('messages.upload')}}</button>
            @if (session('avatar'))
                <div class="alert alert-success" role="alert">
                    {{ session('avatar') }}
                </div>
            @endif
            @error('avatar')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </form>
    </div>
    <div class="mb-4">
        <form method="POST" action="{{route('user.updateName')}}">
            @csrf
            <label class="form-label">{{__('messages.change_name')}}</label>
            <p>{{__('messages.current_name')}}: {{auth()->user()->name}}</p>
            @if (session('statusName'))
                <div class="alert alert-success" role="alert">
                    {{ session('statusName') }}
                </div>
            @endif

            <div class="mb-3">
                <label for="newNameInput" class="form-label">{{__('messages.new_name')}}</label>
                <input name="name" type="text" class="form-control" id="newNameInput"
                       placeholder="{{__('messages.new_name')}}">
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button class="btn btn-primary">{{__('messages.edit')}}</button>
        </form>
    </div>

    <div class="mb-4">
        <form method="POST" action="{{route('user.updateLink')}}">
            @csrf
            <label class="form-label">{{__('messages.change_link')}}</label>
            <p>{{__('messages.current_link')}}: {{auth()->user()->link}}</p>
            @if (session('statusLink'))
                <div class="alert alert-success" role="alert">
                    {{ session('statusLink') }}
                </div>
            @endif

            <div class="mb-3">
                <label for="newLinkInput" class="form-label">{{__('messages.new_link')}}</label>
                <input name="link" type="text" class="form-control" id="newLinkInput"
                       placeholder="{{__('messages.new_link')}}">
                @error('link')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button class="btn btn-primary">{{__('messages.edit')}}</button>
        </form>
    </div>


    <div class="mb-4">
        <form method="POST" action="{{route('user.updatePassword')}}">
            @csrf
            <label class="form-label">{{__('messages.change_password')}}</label>
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
                <label for="oldPasswordInput" class="form-label">{{__('messages.current_password')}}</label>
                <input name="old_password" type="password" class="form-control" id="oldPasswordInput"
                       placeholder="{{__('messages.current_password')}}">
                @error('old_password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="newPasswordInput" class="form-label">{{__('messages.new_password')}}</label>
                <input name="new_password" type="password" class="form-control" id="newPasswordInput"
                       placeholder="{{__('messages.new_password')}}">
                @error('new_password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="confirmNewPasswordInput" class="form-label">{{__('messages.confirm_password')}}</label>
                <input name="new_password_confirmation" type="password" class="form-control"
                       id="confirmNewPasswordInput"
                       placeholder="{{__('messages.confirm_password')}}">
            </div>
            <button class="btn btn-primary">{{__('messages.edit')}}</button>
        </form>
    </div>
@endsection
