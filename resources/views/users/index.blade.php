@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        All Users
    </div>
    <div class="card-body">
       <ul class="list-group">
        @foreach($users as $user)
            <li class="list-group-item">
                <div>User Name: <strong>{{ $user->name }}</strong></div>
                <div>User Role: <strong>{{ $user->role }}</strong></div>
            </li>
        @endforeach
       </ul>
    </div>
</div>

@endsection