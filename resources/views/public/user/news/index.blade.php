@extends('layouts.user.user')
@section('title','Новости')
@section('userContent')
    @include('includes.newsIndexToolbar')
    @if(count($news)==0)
        У пользователя : {{$user->name}} нет новостей
    @else
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
                    @if(auth()->user()!==null && auth()->user()->name===$newsCard->project->user->name)
                        <form method="POST"
                              action="{{route('user.news.delete',['user'=>auth()->user()->name,'project'=>$newsCard->project->link,'news'=>$newsCard->link])}}">
                            @csrf
                            @method('delete')
                            <a class="btn btn-primary"
                               href="{{'/user/'.auth()->user()->name.'/projects/'.$newsCard->project->link.'/news/'.$newsCard->link.'/edit'}}"
                               role="button">Изменить</a>
                            <button class="btn btn-danger" type="submit">Удались</button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
        {{$news->links()}}
    @endif
@endsection
