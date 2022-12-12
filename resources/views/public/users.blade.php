@extends('layouts.public')
@section('title',__('messages.navigate_users'))
@section('content')
    @include('includes.searchForm')
    <div class="container-fluid">
        @yield('searchContent')
    </div>
@endsection
