@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        Register Subject(s) To Student: <strong>{{ $student->name }}</strong>
    </div>
    <div class="card-body">
        <form action="{{ route('student.subjects.register', $student->id) }}" method="post">
            @csrf
            @include('partials.errors')
            
            <div class="form-group">
                <label for="">Subjects</label>
                @if($student_subjects->count() !== 0)
                    <select name="subjects[]" id="" class="form-control" multiple required>
                        @foreach($student_subjects as $subject)
                            @if($subject->subject == "English")
                                <option value="Arabic">Arabic</option>
                            @else
                                <option value="English">English</option>
                            @endif
                        @endforeach
                    </select>
                @else
                    <select name="subjects[]" id="" class="form-control" multiple required>
                        <option value="Arabic">Arabic</option>
                        <option value="English">English</option>
                    </select>
                @endif
            </div>

            <button class="btn btn-primary btn-sm">Register</button>
            
        </form>
    </div>
</div>

@endsection