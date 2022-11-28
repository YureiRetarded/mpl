@extends('layouts.private')
@section('title','Создать статус')
@section('content')
    <div>
        <p>ID пользователя:{{$user->id}}</p>
        <p>Имя пользователя:{{$user->name}}</p>
        <p>Бан: {{$user->isBan?'Да':'Нет'}}</p>
    </div>
    <form method="post" action="{{route('admin.user.update',['user'=>$user->id])}}">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="role" class="form-label">Роль пользователя</label>
            <select class="form-select" id="role" name="role_id">
                @foreach($roles as $role)
                    <option name="role_id"
                            value="{{$role->id}}" {{$user->role_id == $role->id ? ' selected ' : ''}}>
                        {{$role->name}}
                    </option>
                @endforeach
            </select>
            @error('role_id')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div>
            <h5>Бан</h5>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="0" name="isBan"
                       id="banNo" {{!$user->isBan?'checked':''}}>
                <label class="form-check-label" for="banNo">
                    Нет
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="1" name="isBan"
                       id="banYes" {{$user->isBan?'checked':''}}>
                <label class="form-check-label" for="banYes">
                    Да
                </label>
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Изменить</button>
    </form>
@endsection
