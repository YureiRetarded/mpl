@extends('layouts.user.user')
@section('title','Редактировать проект')
@section('userContent')

    <form method="POST"
          action="{{route('user.project.update',['user'=>auth()->user()->name,'project'=>$project->link])}}">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="projectName" class="form-label">Название проекта</label>
            <input type="text" name="title" class="form-control" id="projectName" value="{{$project->title}}"
                   aria-describedby="projectHelp">
            @error('title')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <div id="projectHelp" class="form-text">Названия вашего проекта</div>
        </div>
        <div class="mb-3">
            <label for="projectDescription" class="form-label">Описание проекта</label>
            <textarea name="description" class="form-control" id="projectDescription" rows="2">
                {{$project->description}}
            </textarea>
            @error('description')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="projectText" class="form-label">Текст проекта</label>
            <textarea name="text" class="form-control" id="projectText" rows="2">
                {{$project->text}}
            </textarea>
            @error('text')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="accessLevelProject" class="form-label">Открытость проекта</label>
            <select class="form-select" id="accessLevelProject" name="public_access_level_id">
                @foreach($levels as $level)
                    <option name="level"
                            value="{{$level->id}}" {{$project->public_access_level_id == $level->id ? ' selected ' : ''}}>
                        {{$level->name}}
                    </option>
                @endforeach
            </select>
            @error('public_access_level_id')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="statusProject" class="form-label">Статут проекта</label>
            <select class="form-select" id="statusProject" name="status_id">
                @foreach($statuses as $status)
                    <option name="status"
                            value="{{$status->id}}" {{$project->status_id == $status->id ? ' selected ' : ''}}>
                        {{$status->name}}
                    </option>
                @endforeach
            </select>
            @error('status_id')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="gitLink" class="form-label">Ссылка на код вашего проекта</label>
            <input type="url" name="github_link" value="{{$project->github_link}}" class="form-control" id="gitLink">
            <div id="gitLink" class="form-text">Ссылка на ваш проект в Github или т.п(не обязательно)</div>
            @error('github_link')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="url" class="form-label">Ссылка на сайт проекта</label>
            <input type="url" name="url" value="{{$project->url}}" class="form-control" id="url">
            <div id="url" class="form-text">Если у проекта есть свой сайт, впишите ссылку на него</div>
        </div>
        @error('url')
        <p class="text-danger">{{$message}}</p>
        @enderror
        <div class="mb-3">
            <label for="projectTags" class="form-label">Теги</label>
            <input type="text" name="tags" class="form-control" id="projectTags" value="{{$tags}}"
                   aria-describedby="projectTags">
            @error('tags')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <div id="projectTags" class="form-text">Используемые технологии, языки, сферы направления и т.д</div>
        </div>
        <button type="submit" class="btn btn-primary">Редактировать</button>
    </form>
@endsection
