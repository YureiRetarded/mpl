@extends('layouts.private')
@section('title',__('messages.roles'))
@section('content')
    <form method="post" action="{{route('admin.role.store')}}">
        @csrf
        <div class="mb-3">
            <label for="roleName" class="form-label">{{__('messages.role_name')}}</label>
            <input type="text" name="name" class="form-control" id="roleName" value="{{old('name')}}"
                   aria-describedby="roleName">
            @error('name')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="access_level" class="form-label">{{__('messages.access_level')}}</label>
            <input type="number" name="access_level" class="form-control" id="access_level" value="{{old('name')}}"
                   aria-describedby="access_level">
            @error('access_level')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">{{__('messages.create')}}</button>
    </form>
@endsection
