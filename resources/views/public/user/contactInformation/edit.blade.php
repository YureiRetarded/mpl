@extends('layouts.user.user')
@section('title',__('messages.edit_contact'))
@section('userContent')
    <form method="POST"
          action="{{route('user.contact.update',['user'=>auth()->user()->login,'contact'=>$contact->id])}}">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="contactName" class="form-label">{{__('messages.contact_name')}}</label>
            <input type="text" name="name" class="form-control" id="contactName" value="{{$contact->name}}"
                   aria-describedby="contactName">
            @error('name')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <div id="contactName" class="form-text">{{__('messages.contact_name_help')}}</div>
        </div>
        <div class="mb-3">
            <label for="contactValue" class="form-label">{{__('messages.contact_value')}}</label>
            <input type="text" name="value" class="form-control" id="contactValue" value="{{$contact->value}}"
                   aria-describedby="contactValue">
            @error('value')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <div id="contactValue" class="form-text">{{__('messages.contact_value_help')}}</div>
        </div>
        <button type="submit" class="btn btn-primary">{{__('messages.edit')}}</button>
    </form>
@endsection
