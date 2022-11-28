@extends('layouts.private')
@section('title','Создать статус')
@section('content')
    <form method="post" action="{{route('admin.status.update',['status'=>$status->id])}}">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="statusName" class="form-label">Название статуса</label>
            <input type="text" name="name" class="form-control" id="statusName" value="{{$status->name}}"
                   aria-describedby="statusName">
            @error('name')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Изменить</button>
    </form>
@endsection
