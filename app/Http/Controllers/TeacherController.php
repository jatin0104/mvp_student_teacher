<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Student;
use Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;


class TeacherController extends Controller
{
    function __construct(){
        $this->middleware('auth:teacher',['except' => 'create']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getDetail = Teacher::find(Auth::id());
        return view('teacher.dashboard',['data' =>$getDetail]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teacher = new Teacher;
        $teacher->name = Crypt::encryptString('teacher2');
        $teacher->email = 'teacher2@gmail.com';
        $teacher->password = Hash::make('password');
        $teacher->mobile = '0987654321';
       return $teacher->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the relationship between teacher and student
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showRelation()
    {
        $teacher = Teacher::with('getStudent')->first()->toArray();
        // echo "<pre>"; print_r($teacher); exit;
        return view('teacher.relationship',['data' => $teacher]);

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
    public function deleteStudent($id)
    {
        Student::find($id)->delete();
        return redirect()->route('relation');
    }
}
