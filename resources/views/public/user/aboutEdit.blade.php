@extends('layouts.user.user')
@section('title','Редактирование')
@section('userContent')
    <form method="post" action="{{route('user.update',['user'=>$user->name])}}">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="about" class="form-label">Обо мне</label>
            <textarea name="about" class="form-control" id="about" rows="3">
                {{$user->about}}
            </textarea>
            @error('about')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Изменить</button>
    </form>
@endsection
