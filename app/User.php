<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function student_subjects($id)
    {
        $subjects = DB::table('subjects')->where('user_id', $id)
        ->select('subject')->get();
        return $subjects;
    }

    public function student_grade($id)
    {
        $grade = DB::table('grades')->where('user_id', $id)
        ->where('role', 0)->first('grade');
        return $grade;
    }

    public function teacher_subject($id)
    {
        $subject = DB::table('subjects')->where('user_id', $id)
        ->where('role', 1)->pluck('subject')->first();
        return $subject;
    }

    public function teacher_grades($id)
    {
        $grades = DB::table('grades')->where('user_id', $id)
        ->where('role', 1)->get();
        return $grades;
    }
}
