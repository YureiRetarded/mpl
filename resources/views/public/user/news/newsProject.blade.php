@extends('layouts.user.user')
@section('title','Новости')
@section('userContent')
    @foreach($news as $newsCard)
        <div role="button" class="card mb-4"
             onclick="location.href='{{'/user/'.$newsCard->project->user->name.'/projects/'.$newsCard->project->link.'/news/'.$newsCard->link}}'">
            <div class="card-header">
                {{$newsCard->title}}
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>{{mb_strimwidth($newsCard->text,0,20)}}</p>
                </blockquote>
            </div>
        </div>
    @endforeach
    {{$news->links()}}
@endsection
