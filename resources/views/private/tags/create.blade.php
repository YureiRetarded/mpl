@extends('layouts.private')
@section('title',__('messages.create_tag'))
@section('content')
    <form method="post" action="{{route('admin.tag.store')}}">
        @csrf
        <div class="mb-3">
            <label for="tags" class="form-label">{{__('messages.tag_name')}}</label>
            <input type="text" name="name" class="form-control" id="tags" value="{{old('name')}}"
                   aria-describedby="tags">
            @error('name')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">{{__('messages.create')}}</button>
    </form>
@endsection
