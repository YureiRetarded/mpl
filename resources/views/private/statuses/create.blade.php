@extends('layouts.private')
@section('title',__('messages.create_status'))
@section('content')
    <form method="post" action="{{route('admin.status.store')}}">
        @csrf
        <div class="mb-3">
            <label for="statusName" class="form-label">{{__('messages.status_name')}}</label>
            <input type="text" name="name" class="form-control" id="statusName" value="{{old('name')}}"
                   aria-describedby="statusName">
            @error('name')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">{{__('messages.create')}}</button>
    </form>
@endsection
