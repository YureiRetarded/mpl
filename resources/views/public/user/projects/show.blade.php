@extends('layouts.user.user')
@section('title',$project->title)
@section('userContent')
    @include('includes.project.projectToolbar')
    <h1 class="badText">{{$project->title}}</h1>
    <div>
        <h5>{{__('messages.status')}}:
            @if(Config::get('app.locale')=='ru')
                {{$project->status->name_ru}}
            @else
                {{$project->status->name_en}}
            @endif
        </h5>
        <h5>{{__('messages.code')}}:
            @if($project->publicAccessLevel->id==1&&isset($project->code_link))
                <a target="_blank" href="{{$project->code_link}}">
                    @if(Config::get('app.locale')=='ru')
                        {{$project->publicAccessLevel->name_ru}}
                    @else
                        {{$project->publicAccessLevel->name_en}}
                    @endif</a>
            @else
                @if(Config::get('app.locale')=='ru')
                    {{$project->publicAccessLevel->name_ru}}
                @else
                    {{$project->publicAccessLevel->name_en}}
                @endif
            @endif
        </h5>
        @if(isset($project->url))
            <a class="btn btn-primary" role="button" target="_blank"
               href="{{$project->url}}">{{__('messages.project_webpage')}}</a>
        @endif
        @if($project->posts->count()===0)
            <h5>
                {{__('messages.project_no_posts')}}
            </h5>
        @else
            <h5>
                {{__('messages.posts')}}: <a class=""
                                             href="{{route('user.project.posts.index',['user'=>$project->user->link,'project'=>$project->link])}}">{{$project->posts->count()}}</a>
            </h5>
            <h5>
                @foreach($project->tags as $tag)
                    {{$tag->name}}
                @endforeach
            </h5>
        @endif
        @if($project->tags->count()===0)
            <h5>
                {{__('messages.project_no_tags')}}
            </h5>
        @else
            <h7>
                {{__('messages.tags')}}:
            </h7>
            <p>
                @foreach($project->tags as $tag)
                    {{$tag->name}}
                @endforeach
            </p>
        @endif
    </div>
    @if(isset($project->description))
        <h5>{{__('messages.project_description')}}:</h5>
        <p class="text-xl-start">
            {{$project->description}}
        </p>
    @endif
    @if(isset($project->text))
        <div class="text-xl-start badText">
            {!! $project->text !!}
        </div>
    @endif
    @if(!isset($project->text)&&!isset($project->description))
        <h2 class="text-center ">
            {{__('messages.project_no_text_no_description')}}
        </h2>
    @endif
@endsection
