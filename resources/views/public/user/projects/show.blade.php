@extends('layouts.user.user')
@section('title',$project->title)
@section('userContent')
    @include('includes.project.projectToolbar')
    <h1 class="badText">{{$project->title}}</h1>
    <div>
        <h5>Статус: {{$project->status->name}}</h5>
        <h5>Доступ к коду:
            @if($project->publicAccessLevel->id==1&&isset($project->github_link))
                <a target="_blank" href="{{$project->github_link}}"> {{$project->publicAccessLevel->name}}</a>
            @else
                {{$project->publicAccessLevel->name}}
            @endif

        </h5>
        @if(isset($project->url))
            <a class="btn btn-primary" role="button" target="_blank" href="{{$project->url}}">Сайт проекта</a>
        @endif

        @if($project->news->count()===0)
            <h5>
                У проекта нет новостей
            </h5>
        @else
            <h5>
                Новостей: <a class=""
                             href="{{route('user.project.news.index',['user'=>$project->user->name,'project'=>$project->link])}}">{{$project->news->count()}}</a>
            </h5>
            <h5>
                @foreach($project->tags as $tag)
                    {{$tag->name}}
                @endforeach
            </h5>
        @endif
        @if($project->tags->count()===0)
            <h5>
                У проекта нет тегов
            </h5>
        @else
            <h7>
                Теги:
            </h7>
            <p>
                @foreach($project->tags as $tag)
                    {{$tag->name}}
                @endforeach
            </p>
        @endif

    </div>

    @if(isset($project->description))
        <h5>Краткое описание:</h5>
        <p class="text-xl-start">
            {{$project->description}}
        </p>
    @endif
    @if(isset($project->text))
        <p class="text-xl-start badText">
            {{$project->text}}
        </p>
    @endif
    @if(!isset($project->text)&&!isset($project->description))
        <h2 class="text-center ">
            Нет описание проекта
        </h2>
    @endif
@endsection
