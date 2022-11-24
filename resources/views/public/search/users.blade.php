@extends('layouts.public')
@section('title','Проекты')
@section('content')
    @include('includes.searchForm')
    <div class="container-fluid">
        @yield('searchContent')
    </div>
@endsection
