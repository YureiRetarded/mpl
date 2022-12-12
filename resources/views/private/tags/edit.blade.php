@extends('layouts.private')
@section('title',__('messages.edit_tag'))
@section('content')
    <form method="post" action="{{route('admin.tag.update',['tag'=>$tag->id])}}">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="tags" class="form-label">{{__('messages.tag_name')}}</label>
            <input type="text" name="name" class="form-control" id="tags" value="{{$tag->name}}"
                   aria-describedby="tags">
            @error('name')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">{{__('messages.edit')}}</button>
    </form>
@endsection
