@extends('layouts.public')
@section('title','Пользователи')
@section('content')
    @include('includes.searchForm')
    @yield('searchContent')
@endsection
