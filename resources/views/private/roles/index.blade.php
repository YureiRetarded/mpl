@extends('layouts.private')
@section('title','Роли')
@section('content')
    @include('includes.searchForm')
    <div class="container mb-3 row"><a class="btn btn-primary" href="{{route('admin.role.create')}}">Создать</a></div>
    @foreach($roles as $role)
        @include('includes.role.cardAdmin')
    @endforeach
    <div>
        {{$roles->links()}}
    </div>
@endsection
