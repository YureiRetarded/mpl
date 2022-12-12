@extends('layouts.private')
@section('title',__('messages.edit_role'))
@section('content')
    <form method="post" action="{{route('admin.role.update',['role'=>$role->id])}}">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="roleName" class="form-label">{{__('messages.role_name')}}</label>
            <input type="text" name="name" class="form-control" id="roleName" value="{{$role->name}}"
                   aria-describedby="roleName">
            @error('name')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="access_level" class="form-label">{{__('messages.access_level')}}</label>
            <input type="number" name="access_level" class="form-control" id="access_level"
                   value="{{$role->access_level}}"
                   aria-describedby="access_level">
            @error('access_level')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">{{__('messages.edit')}}</button>
    </form>
@endsection
