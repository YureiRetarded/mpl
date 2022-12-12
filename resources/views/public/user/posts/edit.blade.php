@extends('layouts.user.user')
@section('title',__('messages.edit_post'))
@section('userContent')
    <form method="POST"
          action="{{route('user.post.update',['user'=>auth()->user()->login,'project'=>$post->project->link,'post'=>$post->link])}}">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="postName" class="form-label">{{__('messages.post_name')}}</label>
            <input type="text" name="title" class="form-control" id="postName" value="{{$post->title}}"
                   aria-describedby="postHelp">
            @error('title')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <div id="postHelp" class="form-text">{{__('messages.post_name_help')}}</div>
        </div>
        <div class="mb-3">
            <label for="postText" class="form-label">{{__('messages.post_text')}}</label>
            <textarea name="text" class="ckeditor form-control" id="postText" rows="5">
                {{$post->text}}
            </textarea>
            @error('text')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="project_id" class="form-label">{{__('messages.project')}}</label>
            <select class="form-select" id="project_id" name="project_id">
                @foreach($projects as $project)
                    <option name="project_id"
                            value="{{$project->id}}" {{$post->project_id == $project->id ? ' selected ' : ''}}>
                        {{$project->title}}
                    </option>
                @endforeach
            </select>
            @error('project_id')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">{{__('messages.edit')}}</button>
    </form>
@endsection
