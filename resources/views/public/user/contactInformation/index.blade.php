@extends('layouts.user.user')
@section('title',__('messages.navigate_contacts'))
@section('userContent')
    @if(isset($banStatus)&&$banStatus===true)
        @include('includes.user.userBan')
    @else
        @include('includes.contact.contactToolbar')
        @if(count($user->contactInformation)==0)
            <h3 class="badText">
                @if(auth()->user()!==null &&  auth()->user()->link===$user->link)
                    {{__('messages.you_no_contacts')}}
                @else
                    {{$user->name}} {{__('messages.user_no_contacts')}}
                @endif
            </h3>
        @else
            @foreach($user->contactInformation as $contact)
                @include('includes.contact.card')
            @endforeach
        @endif
    @endif
@endsection
