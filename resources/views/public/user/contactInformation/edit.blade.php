@extends('layouts.user.user')
@section('title','Изменить контакт')
@section('userContent')

    <form method="POST" action="{{route('user.contact.update',['user'=>auth()->user()->name,'contact'=>$contact->id])}}">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="contactName" class="form-label">Имя контакта</label>
            <input type="text" name="name" class="form-control" id="contactName" value="{{$contact->name}}"
                   aria-describedby="contactName">
            @error('name')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <div id="contactName" class="form-text">Название соцсети, тип почты или номера телефона</div>
        </div>
        <div class="mb-3">
            <label for="contactValue" class="form-label">Значения контакта</label>
            <input type="text" name="value" class="form-control" id="contactValue" value="{{$contact->value}}"
                   aria-describedby="contactValue">
            @error('value')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <div id="contactValue" class="form-text">Ссылка на соцсеть, адресс электронной почты, номер телефона</div>
        </div>
        <button type="submit" class="btn btn-primary">Изменить</button>
    </form>
@endsection
