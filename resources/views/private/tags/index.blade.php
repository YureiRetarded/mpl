@extends('layouts.private')
@section('title',__('messages.tags'))
@section('content')
    @include('includes.searchForm')
    <div class="container mb-3 row"><a class="btn btn-primary"
                                       href="{{route('admin.tag.create')}}">{{__('messages.create')}}</a></div>
    @foreach($tags as $tag)
        @include('includes.tag.cardAdmin')
    @endforeach
    <div>
        {{$tags->links()}}
    </div>
@endsection
