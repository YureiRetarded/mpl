@extends('layouts.public')
@section('title','Новости')
@section('content')
    @foreach($news as $newspaper)
        <div role="button" class="card mb-4" onclick="location.href='{{route('news.show',$newspaper->id)}}'">
            <div class="card-header">
                {{$newspaper->title}}
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>{{mb_strimwidth($newspaper->text,0,20)}}</p>
                </blockquote>
            </div>
        </div>
    @endforeach
    {{$news->links()}}
@endsection
