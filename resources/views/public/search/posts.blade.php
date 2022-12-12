@extends('layouts.public')
@section('title',__('messages.navigate_posts'))
@section('content')
    @include('includes.searchForm')
    @yield('searchContent')
@endsection
