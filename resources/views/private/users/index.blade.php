@extends('layouts.private')
@section('title',__('messages.navigate_users'))
@section('content')
    @include('includes.searchForm')
    @foreach($users as $user)
        @include('includes.user.cardAdmin')
    @endforeach
    <div>
        {{$users->links()}}
    </div>
@endsection
