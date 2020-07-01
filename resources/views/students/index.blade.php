@extends('layouts.app')
@section('content')

<div class="card">
   
    <div class="card-body">
    <div class="tab">
        <button class="tablinks" onClick="openGrade(event, 'grade1')">Grade 1</button>
        <button class="tablinks" onClick="openGrade(event, 'grade2')">Grade 2</button>
        <button class="tablinks" onClick="openGrade(event, 'grade3')">Grade 3</button>
    </div>

    
            <div id="grade1" class="tabcontent">
                <ul class="list-group">
                @foreach($grades_students->where('grade', 1) as $student)
                    <li class="list-group-item">
                        <div>Student Name: <strong>{{ $student->name }}</strong></div>
                        <div>Student Email: <strong>{{ $student->email }}</strong></div>
                        <div>Student Grade: <strong>{{ $student->grade }}</strong></div>   
                        <div>Student Subjects: <strong>
                        @foreach($student->student_subjects($student->id) as $subject)
                        {{ $subject->subject }},
                        @endforeach
                        </strong></div>   
                    </li>
                @endforeach
                </ul>
            </div>

            <div id="grade2" class="tabcontent">
            <ul class="list-group">
                @foreach($grades_students->where('grade', 2) as $student)
                    <li class="list-group-item">
                        <div>Student Name: <strong>{{ $student->name }}</strong></div>
                        <div>Student Email: <strong>{{ $student->email }}</strong></div>
                        <div>Student Grade: <strong>{{ $student->grade }}</strong></div> 
                        <div>Student Subjects: <strong>
                        @foreach($student->student_subjects($student->id) as $subject)
                        {{ $subject->subject }},
                        @endforeach
                        </strong></div>                 
                    </li>
                @endforeach
                </ul>
            </div>

            <div id="grade3" class="tabcontent">
            <ul class="list-group">
                @foreach($grades_students->where('grade', 3) as $student)
                    <li class="list-group-item">
                        <div>Student Name: <strong>{{ $student->name }}</strong></div>
                        <div>Student Email: <strong>{{ $student->email }}</strong></div>
                        <div>Student Grade: <strong>{{ $student->grade }}</strong></div>
                        <div>Student Subjects: <strong>
                        @foreach($student->student_subjects($student->id) as $subject)
                        {{ $subject->subject }},
                        @endforeach
                        </strong></div>                  
                    </li>
                @endforeach
                </ul>
            </div>
      
    </div>
</div>

@endsection

<script>

const openGrade =  function(event, gradeid) {
    const tabContents = document.querySelectorAll('.tabcontent');
    tabContents.forEach((tab) => {
        tab.style.display = 'none';
    });

    const tabLinks = document.querySelectorAll('.tablinks');
    tabLinks.forEach((tab) => {
        tab.classList.remove('active');
    });

    document.getElementById(gradeid).style.display = 'block';
    event.currentTarget.className += ' active';

}

</script>