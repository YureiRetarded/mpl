@extends('layouts.private')
@section('title',__('messages.edit_status'))
@section('content')
    <form method="post" action="{{route('admin.status.update',['status'=>$status->id])}}">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="statusName" class="form-label">{{__('messages.status_name')}} RU</label>
            <input type="text" name="name_ru" class="form-control" id="statusName" value="{{$status->name_ru}}"
                   aria-describedby="statusName">
            @error('name_ru')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <label for="statusName" class="form-label">{{__('messages.status_name')}} EN</label>
            <input type="text" name="name_en" class="form-control" id="statusName" value="{{$status->name_en}}"
                   aria-describedby="statusName">
            @error('name_en')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">{{__('messages.edit')}}</button>
    </form>
@endsection
