@extends('layouts.public')
@section('title',__('messages.about'))
@section('content')
    <div>
        <h1>{{__('messages.navigate_contacts')}}</h1>
    </div>
    <div>
        <p>{{__('messages.about_text')}}</p>
        <ul>
            <li><a href="mailto: support@myprojectlist.ru">Email</a></li>
            <li><a target="_blank" href="https://t.me/yureideveloper">Telegram</a></li>
        </ul>
    </div>
    <div>
        <p>{{__('messages.about_donation_text')}} <a target="_blank" href="https://boosty.to/yureideveloper">Boosty</a>
        </p>
    </div>
@endsection
