@extends('layouts.public')
@section('title','Проекты')
@section('content')
    @foreach($projects as $project)

        <div role="button" class="card mb-4" onclick="location.href='{{route('project.show',$project->id)}}'">
            <div class="card-header">
                {{$project->title}}
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>{{$project->description}}</p>
                    <footer class="blockquote-footer">
                        @foreach($project->languages as $language)
                            {{$language->name}}
                        @endforeach
                    </footer>
                    <footer class="blockquote-footer">
                        @foreach($project->technologies as $technology)
                            {{$technology->name}}
                        @endforeach
                    </footer>
                </blockquote>
            </div>
        </div>
    @endforeach
    {{$projects->links()}}
@endsection
