@extends('layouts.user.user')
@section('userContent')
    <table class="table table-striped-columns">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Link</th>
            @if(auth()->user()->name===$user->name)
                <th scope="col">Действия</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach($user->contactInformation as $contact)
            <tr>
                <td>{{$contact->name}}</td>
                <td>{{$contact->value}}</td>
                @if(auth()->user()->name===$user->name)
                   <td>
                       <form method="POST" action="{{route('user.contact.delete',['user'=>auth()->user()->name,'contact'=>$contact->id])}}">
                       <a class="btn btn-primary" href="{{route('user.contact.edit',['user'=>auth()->user()->name,'contact'=>$contact->id])}}" role="button">Изменить</a>
                           @method('delete')
                           @csrf
                           <button class="btn btn-danger" type="submit">Удалить</button>
                       </form>

                   </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
