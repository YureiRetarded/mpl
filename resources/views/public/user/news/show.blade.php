@extends('layouts.user.user')
@section('title','Новости')
@section('userContent')
    Имя новости: {{$news->title}}<br>
    Текст новости: {{$news->text}}<br>
    Новость относится к проекту: {{$news->project->title}}<br>
    @if(auth()->user()->name===$news->project->user->name)
        <a class="btn btn-primary" href="{{url()->current().'/edit'}}" role="button">Редактировать</a><br>
        <form method="POST"
              action="{{route('user.news.delete',['user'=>auth()->user()->name,'project'=>$news->project->link,'news'=>$news->link])}}">
            @csrf
            @method('delete')
            <button class="btn btn-primary" type="submit">Удались</button>
        </form>
    @endif
@endsection
