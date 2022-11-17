@extends('layouts.user.user')
@section('userContent')
    <table class="table table-striped-columns">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Link</th>
        </tr>
        </thead>
        <tbody>
        @foreach($user->contactInformation as $contact)
            <tr>
                <td>{{$contact->name}}</td>
                <td>{{$contact->value}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
