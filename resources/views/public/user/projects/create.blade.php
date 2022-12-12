@extends('layouts.user.user')
@section('title',__('messages.create_project'))
@section('userContent')
    <form method="POST" action="{{route('user.project.store',['user'=>auth()->user()->login])}}">
        @csrf
        <div class="mb-3">
            <label for="projectName" class="form-label">{{__('messages.project_name')}}</label>
            <input type="text" name="title" class="form-control" id="projectName" value="{{old('title')}}"
                   aria-describedby="projectHelp">
            @error('title')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <div id="projectHelp" class="form-text">{{__('messages.project_name_help')}}</div>
        </div>
        <div class="mb-3">
            <label for="projectDescription" class="form-label">{{__('messages.project_description')}}</label>
            <input name="description" class="form-control" id="projectDescription" value="{{old('description')}}"
                   aria-describedby="projectHelpDescription">
            {{old('description')}}
            @error('description')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <div id="projectHelpDescription" class="form-text">{{__('messages.project_description_help')}}</div>
        </div>
        <div class="mb-3">
            <label for="projectText" class="form-label">{{__('messages.project_text')}}</label>
            <textarea name="text" class="ckeditor form-control" id="projectText" rows="5">
                {{old('text')}}
            </textarea>
            @error('text')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="accessLevelProject" class="form-label">{{__('messages.project_open_status')}}</label>
            <select class="form-select" id="accessLevelProject" name="public_access_level_id">
                @foreach($levels as $level)
                    <option name="level"
                            value="{{$level->id}}" {{old('public_access_level_id') == $level->id ? ' selected ' : ''}}>
                        @if(Config::get('app.locale')=='ru')
                            {{$level->name_ru}}
                        @else
                            {{$level->name_en}}
                        @endif
                    </option>
                @endforeach
            </select>
            @error('public_access_level_id')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="statusProject" class="form-label">{{__('messages.project_status')}}</label>
            <select class="form-select" id="statusProject" name="status_id">
                @foreach($statuses as $status)
                    <option name="status"
                            value="{{$status->id}}" {{old('status_id') == $status->id ? ' selected ' : ''}}>
                        @if(Config::get('app.locale')=='ru')
                            {{$status->name_ru}}
                        @else
                            {{$status->name_en}}
                        @endif
                    </option>
                @endforeach
            </select>
            @error('status_id')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="gitLink" class="form-label">{{__('messages.project_code_link')}}</label>
            <input type="url" name="github_link" value="{{old('github_link')}}" class="form-control" id="gitLink">
            <div id="gitLink" class="form-text">{{__('messages.project_code_link_help')}}</div>
            @error('github_link')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="url" class="form-label">{{__('messages.project_page')}}</label>
            <input type="url" name="url" value="{{old('url')}}" class="form-control" id="url">
            <div id="url" class="form-text">{{__('messages.project_page_help')}}</div>
        </div>
        @error('url')
        <p class="text-danger">{{$message}}</p>
        @enderror
        <div class="mb-3">
            <label for="projectTags" class="form-label">Теги</label>
            <input type="text" name="tags" class="form-control" id="projectTags" value="{{old('tags')}}"
                   aria-describedby="projectTags">
            @error('tags')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <div id="projectTags" class="form-text">{{__('messages.project_tags_help')}}</div>
        </div>
        <button type="submit" class="btn btn-primary">{{__('messages.create')}}</button>
    </form>
@endsection
