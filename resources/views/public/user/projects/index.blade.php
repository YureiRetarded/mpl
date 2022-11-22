@extends('layouts.user.user')
@section('title','Проекты')
@section('userContent')
    @foreach($projects as $project)
        <div role="button" class="card mb-4"
             onclick="location.href='{{'/user/'.$project->user->name.'/projects/'.$project->link}}'">
            <div class="card-header">
                {{$project->title}}
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>{{$project->description}}</p>
                    <footer class="blockquote-footer">
                        @foreach($project->tags as $tag)
                            {{$tag->name}}
                        @endforeach
                    </footer>
                </blockquote>
            </div>
        </div>
    @endforeach
    {{$projects->links()}}
@endsection
