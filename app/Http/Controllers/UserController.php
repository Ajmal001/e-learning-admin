<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function fileUploadPage()
    {
        return view('users.upload');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();

        if($request->role == 0) {
            DB::table('grades')->insert([
                'user_id' => $user->id, 'role' => $user->role, 'grade' => $request->grade,
            ]);

            foreach ($request->subjects as $subject)
            {
                DB::table('subjects')->insert([
                    'user_id' => $user->id, 'role' => $user->role, 'subject' => $subject,
                ]);
            }
        }

        if($request->role == 1) {
            foreach ($request->grades as $grade)
            {
                DB::table('grades')->insert([
                    'user_id' => $user->id, 'role' => $user->role, 'grade' => $grade,
                ]);
            }

            DB::table('subjects')->insert([
                'user_id' => $user->id, 'role' => $user->role, 'subject' => $request->subject,
            ]);
        }

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
