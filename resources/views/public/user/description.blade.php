@extends('layouts.user.user')
@section('title',__('messages.description'))
@section('userContent')
    <form method="POST" action="{{route('user.updateAbout')}}">
        @csrf
        <div class="mb-3">
            <label for="about" class="form-label">{{__('messages.about_me')}}</label>
            @if (session('statusAbout'))
                <div class="alert alert-success" role="alert">
                    {{ session('statusAbout') }}
                </div>
            @endif
            <textarea name="about" class="form-control" id="about" rows="20">
                {{auth()->user()->about}}
            </textarea>
            @error('about')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">{{__('messages.edit')}}</button>
    </form>
@endsection
