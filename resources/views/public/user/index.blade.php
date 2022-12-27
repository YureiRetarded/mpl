@extends('layouts.user.user')
@section('title',$user->name)
@section('userContent')
    @if($user->isBan===1)
        @include('includes.user.userBan')
    @else
        <div style="word-wrap: break-word">
            <div class="row g-0">
                <div class="col-md-2 border rounded">
                    <img
                        src="{{ $user->avatar != '' && Storage::exists('public/' . $user->avatar) ? asset('/storage/'.$user->avatar) : asset('/storage/no_image.png') }}"
                        class="img-fluid rounded-start">

                </div>
                <div class="col-md-10 py-2 px-2">
                    <div class="card-body">
                        <h2>{{$user->name}}</h2>
                        <h2>{{__('messages.projects')}}: {{$user->projects->count()}}</h2>
                        <h2>{{__('messages.posts')}}: {{$user->posts->count()}}</h2>
                        @if(Request::segment(2) == auth()->user()->link)
                            <a class="btn btn-primary"
                               href="{{route('user.description',['user'=>auth()->user()->link])}}">{{__('messages.change_about')}}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div>
            @if(isset($user->about))
                <p>{{$user->about}}</p>
            @else
                <p>{{$user->name}} {{__('messages.project_no_about')}}</p>
            @endif
        </div>
    @endif
@endsection
