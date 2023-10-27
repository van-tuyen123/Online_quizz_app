<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oex_students;
class StudentController extends Controller
{
    public function signup(){
        return view('student.signup');
    }
    public function login_subject(Request $request){
       $resp = Oex_students::where('email',$request->email)->where('password',$request->password)->get()->first();
       if($resp){
        $request->session()->put('id',$resp->id);
        $arr = array('status'=>'true','message'=>' success','reload'=>url('student/dashboard'));
        
       }
       else
       {
        $arr = array('status'=>'false','message'=>'Email và Mật khẩu không đúng !');
        
       }
       echo json_encode($arr);
    }
}
