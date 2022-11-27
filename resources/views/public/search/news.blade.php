@extends('layouts.public')
@section('title','Новости')
@section('content')
    @include('includes.searchForm')
    @yield('searchContent')
@endsection
