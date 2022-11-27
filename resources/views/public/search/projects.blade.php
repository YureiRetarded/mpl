@extends('layouts.public')
@section('title','Проекты')
@section('content')
    @include('includes.searchForm')
    @yield('searchContent')
@endsection
