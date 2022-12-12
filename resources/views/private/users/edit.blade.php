@extends('layouts.private')
@section('title',$user->name)
@section('content')
    <div>
        <p>{{__('messages.user_id')}}:{{$user->id}}</p>
        <p>{{__('messages.user_name')}}:{{$user->name}}</p>
        <p>{{__('messages.ban')}}: {{$user->isBan?__('messages.yes'):__('messages.no')}}</p>
    </div>
    <form method="post" action="{{route('admin.user.update',['user'=>$user->id])}}">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="role" class="form-label">{{__('messages.user_role')}}</label>
            <select class="form-select" id="role" name="role_id">
                @foreach($roles as $role)
                    <option name="role_id"
                            value="{{$role->id}}" {{$user->role_id == $role->id ? ' selected ' : ''}}>
                        {{$role->name}}
                    </option>
                @endforeach
            </select>
            @error('role_id')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div>
            <h5>{{__('messages.ban')}}</h5>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="0" name="isBan"
                       id="banNo" {{!$user->isBan?'checked':''}}>
                <label class="form-check-label" for="banNo">
                    {{__('messages.no')}}
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="1" name="isBan"
                       id="banYes" {{$user->isBan?'checked':''}}>
                <label class="form-check-label" for="banYes">
                    {{__('messages.yes')}}
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">{{__('messages.edit')}}</button>
    </form>
@endsection
