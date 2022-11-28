@extends('layouts.private')
@section('title','Создать статус')
@section('content')
    <form method="post" action="{{route('admin.tag.store')}}">
        @csrf
        <div class="mb-3">
            <label for="tags" class="form-label">Название тега</label>
            <input type="text" name="name" class="form-control" id="tags" value="{{old('name')}}"
                   aria-describedby="tags">
            @error('name')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
@endsection
