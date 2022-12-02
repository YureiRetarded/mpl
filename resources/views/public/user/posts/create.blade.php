@extends('layouts.user.user')
@section('title','Создать пост')
@section('userContent')
    <form method="POST" action="{{route('user.post.store',['user'=>auth()->user()->login])}}">
        @csrf
        <div class="mb-3">
            <label for="PostName" class="form-label">Заголовок поста</label>
            <input type="text" name="title" class="form-control" id="PostName" value="{{old('title')}}"
                   aria-describedby="PostHelp">
            @error('title')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <div id="PostHelp" class="form-text">Заголовок для вашего поста</div>
        </div>
        <div class="mb-3">
            <label for="PostText" class="form-label">Текст поста</label>
            <textarea name="text" class="ckeditor form-control" id="PostText" rows="5">
                {{old('text')}}
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
                            value="{{$project->id}}" {{old('project_id') == $project->id ? ' selected ' : ''}}>
                        {{$project->title}}
                    </option>
                @endforeach
            </select>
            @error('project_id')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
@endsection
