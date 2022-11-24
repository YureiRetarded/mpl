@extends('public.search.users')
@section('title','Пользователи')
@section('searchContent')
    @foreach($users as $user)
        @include('includes.user.card')
    @endforeach
    {{$users->links()}}
@endsection
