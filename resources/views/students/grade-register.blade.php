@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        Register Grade To Student: <strong>{{ $student->name }}</strong>
    </div>
    <div class="card-body">
        <form action="{{ route('student.grade.register', $student->id) }}" method="post">
            @csrf
            @include('partials.errors')
            
            <div class="form-group">
                <label for="">Grades</label>
                    <select name="grade" id="" class="form-control" required>
                            <option value="1">Grade 1</option>
                            <option value="2">Grade 2</option>
                            <option value="3">Grade 3</option>
                    </select>
            </div>

            <button class="btn btn-primary btn-sm">Register</button>
            
        </form>
    </div>
</div>

@endsection