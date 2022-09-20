<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class TeacherLoginController extends Controller
{

    function __construct(){
        $this->middleware('guest:teacher', ['except' => 'logout']);
    }

    /***
     *  Display login form
     */
    function show(){
        return view('auth.teacherLogin');
    }

    function login(Request $request){

        $validator = $this->validate($request,[ 
            'email' => 'required:email',
            'password' => 'required',
        ]);

        if(Auth::guard('teacher')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('teacher.dashboard');
        }else{
            return redirect()->back()->withErrors('These credentials do not match our records.')->withInput();
            // return redire
        }
        
    }

    function logout(Request $request){
        Auth::guard('teacher')->logout();

        return redirect()->route('teacher.login');
    }
}
