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
                @if(auth()->user()->name===$project->user->name)
                    <a class="btn btn-primary" href="{{url()->current().'/'.$project->link.'/edit'}}" role="button">Редактировать</a>
                    <form method="POST"
                          action="{{route('user.project.delete',['user'=>auth()->user()->name,'project'=>$project->link])}}">
                        @csrf
                        @method('delete')
                        <button class="btn btn-primary" type="submit">Удались</button>
                    </form>
                @endif
            </div>
        </div>
    @endforeach
    {{$projects->links()}}
@endsection
