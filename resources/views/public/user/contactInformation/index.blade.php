@extends('layouts.user.user')
@section('userContent')
    @include('includes.contact.contactToolbar')
    @if(count($user->contactInformation)==0)
        <h3 class="badText">
            @if(auth()->user()!==null &&  auth()->user()->name===$user->name)
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
