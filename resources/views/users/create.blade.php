@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        Create New User
    </div>
    <div class="card-body">
        <form action="{{ route('users.store') }}" method="post">
            @csrf
            @include('partials.errors')
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" required class="form-control" name="name" placeholder="Enter Name">
            </div>

            <div class="form-group">
                <label for="">Email</label>
                <input type="text" required class="form-control" name="email" placeholder="Enter Email">
            </div>

            <div class="form-group">
                <label for="">Password</label>
                <input type="password" required class="form-control" name="password" placeholder="Enter Password">
            </div>

            <div class="form-group">
                <label for="">Role</label>
                <select name="role" required onChange="append_div()" id="role" class="form-control">
                <option selected disabled>Select Role</option>
                    <option value="0">Student</option>
                    <option value="1">Teacher</option>
                    <option value="2">Admin</option>
                </select>
            </div>

            <div id="student-div" class="mb-3" style="display:none">
                <label for="">Grade</label>
                <select name="grade" id="" class="form-control">
                    <option value="1">Grade 1</option>
                    <option value="2">Grade 2</option>
                    <option value="3">Grade 3</option>
                </select>

                <label for="">Subjects</label>
                <select name="subjects[]" id="" multiple class="form-control">
                    <option value="Arabic">Arabic</option>
                    <option value="English">English</option>
                </select>
            </div>

            <div id="teacher-div" class="mb-3" style="display:none">
                <label for="">Grade</label>
                <select name="grades[]" multiple id="" class="form-control">
                    <option value="1">Grade 1</option>
                    <option value="2">Grade 2</option>
                    <option value="3">Grade 3</option>
                </select>

                <label for="">Subjects</label>
                <select name="subject" id="" class="form-control">
                    <option value="Arabic">Arabic</option>
                    <option value="English">English</option>
                </select>
            </div>

            <button class="btn btn-primary btn-sm">Create</button>
            
        </form>
    </div>
</div>

@endsection

<script>

const append_div = function() {
    let roleValue = document.getElementById('role').value;
    const teacher_div = document.getElementById('teacher-div');
    const student_div = document.getElementById('student-div');

    if(roleValue == 0) {
        student_div.style.display = 'block';
        teacher_div.style.display = 'none';
    } else if (roleValue == 1) {
        student_div.style.display = 'none';
        teacher_div.style.display = 'block';
    } else {
        student_div.style.display = 'none';
        teacher_div.style.display = 'none';
    }
}


</script>