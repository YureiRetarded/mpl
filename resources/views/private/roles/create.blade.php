@extends('layouts.private')
@section('title','Создать статус')
@section('content')
    <form method="post" action="{{route('admin.role.store')}}">
        @csrf
        <div class="mb-3">
            <label for="roleName" class="form-label">Название роли</label>
            <input type="text" name="name" class="form-control" id="roleName" value="{{old('name')}}"
                   aria-describedby="roleName">
            @error('name')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="access_level" class="form-label">Уровень доступа</label>
            <input type="number" name="access_level" class="form-control" id="access_level" value="{{old('name')}}"
                   aria-describedby="access_level">
            @error('access_level')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
@endsection