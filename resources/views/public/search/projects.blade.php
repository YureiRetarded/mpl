@extends('layouts.public')
@section('title',__('messages.navigate_projects'))
@section('content')
    @include('includes.searchForm')
    @yield('searchContent')
@endsection
