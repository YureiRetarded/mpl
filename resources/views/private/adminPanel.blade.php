@extends('layouts.private')
@section('title',__('messages.navigate_adminpanel'))
@section('content')
    <div class="container-fluid">
        @yield('adminContent')
    </div>
@endsection
