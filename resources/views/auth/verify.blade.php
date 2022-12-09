@extends('layouts.public')
@section('Подтверждения Email','Вход')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('messages.confirm_email')}}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{__('messages.new_link_sended')}}
                            </div>
                        @endif
                        {{__('messages.verify_email_text1')}}
                        {{__('messages.verify_email_text2')}}
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit"
                                    class="btn btn-link p-0 m-0 align-baseline">{{__('messages.link_for_send_link')}}</button>
                            .
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
