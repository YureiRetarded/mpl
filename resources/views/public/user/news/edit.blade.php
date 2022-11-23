@extends('layouts.user.user')
@section('title','Редактировать новость')
@section('userContent')
    <form method="POST"
          action="{{route('user.news.update',['user'=>auth()->user()->name,'project'=>$news->project->link,'news'=>$news->link])}}">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="newsName" class="form-label">Заголовок новости</label>
            <input type="text" name="title" class="form-control" id="newsName" value="{{$news->title}}"
                   aria-describedby="newsHelp">
            @error('title')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <div id="newsHelp" class="form-text">Заголовок для вашей новости</div>
        </div>
        <div class="mb-3">
            <label for="newsText" class="form-label">Текст новости</label>
            <textarea name="text" class="form-control" id="newsText" rows="2">
                {{$news->text}}
            </textarea>
            @error('text')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="project_id" class="form-label">Проект</label>
            <select class="form-select" id="project_id" name="project_id">
                @foreach($projects as $project)
                    <option name="project_id"
                            value="{{$project->id}}" {{$news->project_id == $project->id ? ' selected ' : ''}}>
                        {{$project->title}}
                    </option>
                @endforeach
            </select>
            @error('project_id')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Редактировать</button>
    </form>
@endsection
