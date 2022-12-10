@extends('layouts.private')
@section('title',__('messages.statuses'))
@section('content')
    @include('includes.searchForm')
    <div class="container mb-3 row"><a class="btn btn-primary"
                                       href="{{route('admin.status.create')}}">{{__('messages.create')}}</a></div>
    @foreach($statuses as $status)
        @include('includes.status.cardAdmin')
    @endforeach
    <div>
        {{$statuses->links()}}
    </div>
@endsection
