@extends('public.search.users')
@section('title',__('messages.navigate_users'))
@section('searchContent')
    @foreach($users as $user)
        @include('includes.user.card')
    @endforeach
    {{$users->links()}}
@endsection
