@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        All Teachers
    </div>
    <div class="card-body">
    <div class="tab">
        <button class="tablinks" onClick="openGrade(event, 'grade1')">Grade 1</button>
        <button class="tablinks" onClick="openGrade(event, 'grade2')">Grade 2</button>
        <button class="tablinks" onClick="openGrade(event, 'grade3')">Grade 3</button>
    </div>

       <div id="grade1" class="tabcontent">
            <ul class="list-group">
                @foreach($grades_teachers->where('grade', 1) as $teacher)
                    <li class="list-group-item">
                        <div>Teacher Name: <strong>{{ $teacher->name }}</strong></div>
                        <div>Teacher Email: <strong>{{ $teacher->email }}</strong></div>
                        <div>Teacher Grade: <strong>{{ $teacher->grade }}</strong></div>   
                        <div>Teacher Subject: <strong>{{$teacher->teacher_subject($teacher->id)}}</strong></div>
                    </li>
                @endforeach
            </ul>
        </div>

        <div id="grade2" class="tabcontent">
            <ul class="list-group">
                @foreach($grades_teachers->where('grade', 2) as $teacher)
                    <li class="list-group-item">
                        <div>Teacher Name: <strong>{{ $teacher->name }}</strong></div>
                        <div>Teacher Email: <strong>{{ $teacher->email }}</strong></div>
                        <div>Teacher Grade: <strong>{{ $teacher->grade }}</strong></div> 
                        <div>Teacher Subject: <strong>{{$teacher->teacher_subject($teacher->id)}}</strong></div>
                    </li>
                @endforeach
            </ul>
        </div>

        <div id="grade3" class="tabcontent">
            <ul class="list-group">
                @foreach($grades_teachers->where('grade', 3) as $teacher)
                    <li class="list-group-item">
                        <div>Teacher Name: <strong>{{ $teacher->name }}</strong></div>
                        <div>Teacher Email: <strong>{{ $teacher->email }}</strong></div>
                        <div>Teacher Grade: <strong>{{ $teacher->grade }}</strong></div>
                        <div>Teacher Subject: <strong>{{$teacher->teacher_subject($teacher->id)}}</strong></div>
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