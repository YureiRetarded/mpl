@extends('layouts.public')
@section('title',__('messages.email_confirmed'))
@section('content')
    <div class="alert alert-success" role="alert">
        {{__('messages.email_confirmed_text')}}
    </div>
@endsection
