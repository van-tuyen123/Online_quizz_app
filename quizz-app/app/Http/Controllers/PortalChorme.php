<?php

namespace App\Http\Controllers;
use App\Models\Oex_exam;
use App\Models\Oex_students;
use Session;
use Illuminate\Http\Request;
use Validator;
class PortalChorme extends Controller
{
    public function dashboard(){
        if(!Session::get('portal_session'))
        {
            return redirect(url('portal/login'));
        }
        $data['portal_exams']=Oex_exam::select(['oex_exams.*','oex_categories.name as cat_name'])
        ->join('oex_categories','oex_exams.category','=','oex_categories.id')
        ->orderBy('id','desc')->where('oex_exams.status','1')->get()->toArray();
        return view('portal.dashboard',$data);
    }
    public function exam_form($id){
        $data['id']=$id;
        $data['exam_title']=Oex_exam::where('id',$id)->get()->first()->title;
        return view('portal.exam_form',$data);
    }
    public function exam_submit(Request $request){
        $validator = Validator::make($request->all(),['name'=>'required','email'=>'required','mobile_no'=>'required','password'=>'required']);
        if($validator->passes()){
            $std= new Oex_students();
            $std->name=$request->name;
            $std->email=$request->email;
            $std->mobile_no=$request->mobile_no;
            $std->password=$request->password;
            $std->exam=$request->id;
            $std->save();
            $arr = array('status'=>'true','message'=>'Gửi thành công !','reload'=>url('portal/print/'.$std->id));
            
        }else{
            $arr = array('status'=>'false','message'=>$validator->errors()->all());
        }
        echo json_encode($arr);
    }
    public function print($id){
        $std_info=Oex_students::where('id',$id)->get()->first();
       return view('portal.print',['std_info'=>$std_info]);
    }
    public function update_form(){
        $data['exams']=Oex_exam::where('status','1')->get()->toArray();
        return view('portal.update_form',$data);
    }
    public function student_exam(){
        $data['exam_info']=Oex_exam::where('id',$_GET['exam'])->get()->first();
        $data['std_info']=Oex_students::where('mobile_no',$_GET['mobile_no'])->where('dob',$_GET['dob'])->where('exam',$_GET['exam'])->get()->toArray();
        return view('portal.student_exam',$data);
    }

    public function logout(Request $request){
        $request->session()->forget('portal_session');
        return redirect(url('portal/login'));
    }
}

