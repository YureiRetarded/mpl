@extends('layouts.public')
@section('title','Посты')
@section('content')
    @include('includes.searchForm')
    @yield('searchContent')
@endsection
