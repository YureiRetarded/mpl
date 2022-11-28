@extends('layouts.private')
@section('title','Создать статус')
@section('content')
    <form method="post" action="{{route('admin.status.store')}}">
        @csrf
        <div class="mb-3">
            <label for="statusName" class="form-label">Название статуса</label>
            <input type="text" name="name" class="form-control" id="statusName" value="{{old('name')}}"
                   aria-describedby="statusName">
            @error('name')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
@endsection
