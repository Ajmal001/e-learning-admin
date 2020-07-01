<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function all_students()
    {
        $grades_students = User::join('grades', 'users.id', 'grades.user_id')
        ->where('grades.role', 0)->select('users.id', 'users.name', 'users.email', 'grades.grade')->get();
        return view('students.index', compact('grades_students'));
    }

    public function all_teachers()
    {
        $grades_teachers = User::join('subjects', 'users.id', 'subjects.user_id')
        ->join('grades', 'grades.user_id', 'subjects.user_id')
        ->where('subjects.role', 1)->select('users.id', 'users.name', 'users.email', 'subjects.subject', 'grades.grade')->get();
        return view('teachers.index', compact('grades_teachers'));
    }

    public function student_subjects_form($user)
    {
        $student = User::where('id', $user)->where('role', 0)->firstOrFail();
        $student_subjects = DB::table('subjects')->where('user_id', $user)
        ->where('role', 0)->get();
        
        return view('students.subjects-register', compact('student', 'student_subjects'));
    }

    public function student_subjects_register(Request $request, User $user)
    {
        foreach($request->subjects as $subject){
            DB::table('subjects')->insert([
                'user_id' => $user->id, 'subject' => $subject, 'role' => $user->role
            ]);
        
        }

        return redirect()->route('students.index');
    }

    public function student_grade_form($user)
    {
        $student = User::where('id', $user)->where('role', 0)->firstOrFail();
        return view('students.grade-register', compact('student'));
    }

    public function student_grade_register(Request $request, User $user)
    {
        DB::table('grades')->insert([
            'user_id' => $user->id, 'grade' => $request->grade, 'role' => $user->role
        ]);
        

        return redirect()->route('students.index');
    }

    // public function all_teachers()
    // {
    //     $teachers = User::where('role', 1)->get();
    //     return view('teachers.index', compact('teachers'));
    // }

    public function teacher_grades_form($user)
    {
        $teacher = User::where('id', $user)->where('role', 1)->firstOrFail();
        return view('teachers.grade-register', compact('teacher'));
    }

    public function teacher_grades_register(Request $request, User $user)
    {

        foreach($request->grades as $grade){
            DB::table('grades')->insert([
                'user_id' => $user->id, 'grade' => $grade, 'role' => $user->role
            ]);
        
        }
        
        return redirect()->route('teachers.index');
    }

    public function teacher_subject_form($user)
    {
        $teacher = User::where('id', $user)->where('role', 1)->firstOrFail();

        return view('teachers.subject-register', compact('teacher'));
    }

    public function teacher_subject_register(Request $request, User $user)
    {
        DB::table('subjects')->insert([
            'user_id' => $user->id, 'subject' => $request->subject, 'role' => $user->role
        ]);
        

        return redirect()->route('teachers.index');
    }

    public function firebase_upload(Request $request)
    {
        DB::table('subject_data')->insert([
            'teacher_id' => Auth::id(), 'text' => $request->text, 'file_link' => $request->url,
            'subject_id' => 'Arabic', 'grade_id' => 1
        ]);

        return redirect()->back();
    }
}
