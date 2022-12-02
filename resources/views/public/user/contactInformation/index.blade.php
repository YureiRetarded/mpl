@extends('layouts.user.user')
@section('title','Контакты')
@section('userContent')
    @include('includes.contact.contactToolbar')
    @if(count($user->contactInformation)==0)
        <h3 class="badText">
            @if(auth()->user()!==null &&  auth()->user()->login===$user->login)
                У вас нет контактов
            @else
                Пользователь {{$user->name}} не оставил контактны данные
            @endif
        </h3>
    @else
        @foreach($user->contactInformation as $contact)
            @include('includes.contact.card')
        @endforeach
    @endif
@endsection
