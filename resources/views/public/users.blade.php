@extends('layouts.public')
@section('title','Пользователи')
@section('content')
    @include('includes.searchForm')
    <div class="container-fluid">
        @yield('searchContent')
    </div>
@endsection
