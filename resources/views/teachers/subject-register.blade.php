@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        Register Subject To Teacher: <strong>{{ $teacher->name }}</strong>
    </div>
    <div class="card-body">
        <form action="{{ route('teacher.subject.register', $teacher->id) }}" method="post">
            @csrf
            @include('partials.errors')
            
            <div class="form-group">
                <label for="">Subjects</label>
                    <select name="subject" id="" class="form-control" required>
                            <option value="Arabic">Arabic</option>
                            <option value="English">English</option>
                    </select>
            </div>

            <button class="btn btn-primary btn-sm">Register</button>
            
        </form>
    </div>
</div>

@endsection