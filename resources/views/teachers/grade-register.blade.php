@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        Register Grade To Teacher: <strong>{{ $teacher->name }}</strong>
    </div>
    <div class="card-body">
        <form action="{{ route('teacher.grades.register', $teacher->id) }}" method="post">
            @csrf
            @include('partials.errors')
            
            <div class="form-group">
                <label for="">Grades</label>
                    <select name="grades[]" id="" class="form-control" multiple required>
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