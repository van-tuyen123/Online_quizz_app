<?php

namespace App\Http\Controllers;
use App\Models\Oex_students;
use App\Models\Oex_exam_question;
use App\Models\Oex_res;
use Illuminate\Contracts\Session\Session as SessionSession;
use Session;
use Illuminate\Http\Request;

class StudentChorme extends Controller
{
    public function dashboard(){
        if(!Session::get('id'))
        {
            return redirect(url('student/signup'));
            die();
        }
       return view('student/dashboard');
    }

    public function exam(){
        $student_info = Oex_students::select(['oex_students.*','oex_exams.title','oex_exams.exam_date'])
        ->join('oex_exams','oex_students.exam','=','oex_exams.id')
        ->where('oex_students.id',Session::get('id'))->get()->first();
       
        return view('student.exam',['student_info'=>$student_info]);
    }
    public function logout(Request $request){
        $request->session()->forget('id');
        return redirect(url('student/signup'));
    }

    public function join_exam($id){
        $data['all_questions'] = Oex_exam_question::where('exam_id',$id)->get()->toArray();
        return view('student.join_exam',$data);
    }
    public function submit(Request $request){
       $yes_answer = 0;
       $no_answer = 0;
       $data=$request->all();
       $result = array();
       for($i = 1;$i<=$request->index;$i++){
        if(isset($data['question'.$i])){
           $question = Oex_exam_question::where('id',$data['question' .$i])->get()->first();
           if($question->answer == $data['answer'.$i]){
            $result[$data['question' .$i]] ='YES';
            $yes_answer++;
           }else{
            $result[$data['question' .$i]] ='No';
            $no_answer++;
           }
        }
       }
       $res = new Oex_res();
       $res->exam_id =$request->exam_id;
       $res->user_id=Session::get('id');
       $res->yes_answer=$yes_answer;
       $res->no_answer=$no_answer;
       $res->result= json_encode($result);
       echo $res->save();
       return redirect(url('student/show_res/' .$res->id));
      
    }
    public function show_res($id){
        $data['res_info']= Oex_res::where('id',$id)->get()->first();
        $data['student_info'] = Oex_students::select(['oex_students.*','oex_exams.title','oex_exams.exam_date'])
        ->join('oex_exams','oex_students.exam','=','oex_exams.id')
        ->where('oex_students.id',Session::get('id'))->get()->first();
        return view('student.show_res',$data);
    }
}
