<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oex_category;
use App\Models\Oex_exam;
use App\Models\Oex_students;
use App\Models\Oex_portal;
use App\Models\Oex_exam_question;
use Validator;

class Admin extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }
    public function exam_category()
    {
        $data['category'] = Oex_category::orderBy('id','asc')->get()->toArray();
        return view('admin.exam_category',$data);
   
    }
    // Add Category
    public function add_new_category(Request $request)
    {
       $validator = Validator::make($request->all(),['name'=>'required']);

       if($validator->passes()){
        $cat = new Oex_category();
        $cat->name=$request->name;
        $cat->status = 1;
        $cat->save();
        $arr = array('status'=>'true','message'=>'Thêm môn học thành công !','reload'=>url('/admin/exam_category'));
       

       }else{
        $arr = array('status'=>'false','message'=>$validator->errors()->all());
       }
       echo json_encode($arr);
        // print_r($request->all());
    }

    // Update
    public function edit_category($id){
        $category = Oex_category::where('id',$id)->get()->first();
        return view('admin.edit_category',['category' => $category]);
        // echo $id;
       
    }
    public function edit_new_category(Request $request){
        //  print_r($request->all());
        $cat = Oex_category::where('id',$request->id)->get()->first();
        $cat->name = $request->name;
        $cat->update();
        echo json_encode( array('status'=>'true','message'=>'Cập nhật thành công !','reload'=>url('/admin/exam_category')));
       
    }
    // Delete Exam_category
    public function delete_category($id){
        $cat = Oex_category::where('id',$id)->get()->first();
        $cat->delete();
        return redirect(url('admin/exam_category'));
        // echo $id;
    }

    // Manage Exam

    // 
    public function manage_exam(){
        $data['category'] = Oex_category::orderBy('id','asc')->where('status','1')->get()->toArray();
        $data['exams'] = Oex_exam::
        select(['oex_exams.*','oex_categories.name as cat_name'])
        ->orderBy('id','asc')
        ->join('oex_categories','oex_exams.category','=','oex_categories.id')
        ->get()->toArray();
        return view('admin.manage_exam',$data);
    }
    // Add new exam
    public function add_new_exam(Request $request){
    //    
        $validator = Validator::make($request->all(),['title'=>'required','exam_date'=>'required','exam_category'=>'required']);

        if($validator->passes()){
        $exam = new Oex_exam();
        $exam->title=$request->title;
        $exam->exam_date=$request->exam_date;
        $exam->category=$request->exam_category;
        $exam->status = 1;
        $exam->save();
        $arr = array('status'=>'true','message'=>'Thêm bài thi thành công!','reload'=>url('/admin/manage_exam'));
        }else{
        $arr = array('status'=>'false','message'=>$validator->errors()->all());
        }
        echo json_encode($arr);
    }
    // Edit Exam
    public function edit_exam($id){
        $data['exam'] = Oex_exam::where('id',$id)->get()->first();
        $data['category'] = Oex_category::orderBy('id','asc')->where('status','1')->get()->toArray();
        return view('admin.edit_exam',$data);
        // print_r($exmal);
        // echo $id;
    }
    public function edit_exam_sub(Request $request){
        $exam = Oex_exam::where('id',$request->id)->get()->first();
        $exam->title=$request->title;
        $exam->exam_date=$request->exam_date;
        $exam->category=$request->exam_category;
        $exam->update();
        echo json_encode( array('status'=>'true','message'=>'Cập nhật thành công !','reload'=>url('/admin/manage_exam')));
        // print_r($request->all());
        // echo $id;
    }
     // Delete Exam
    public function delete_exam($id){
        $exmal = Oex_exam::where('id',$id)->get()->first();
        $exmal->delete();
        return redirect(url('admin/manage_exam'));
        // echo $id;
    }
    // Add question
    public function add_question($id){
       $data['questions'] = Oex_exam_question::where('exam_id',$id)->get()->toArray();
       return view('admin.add_question',$data);
    }
    public function add_new_question(Request $request){
        $validator = Validator::make($request->all(),['question'=>'required','opt_1'=>'required',
        'opt_2'=>'required' ,'opt_3'=>'required','opt_4'=>'required' ,'answer'=>'required']);

        if($validator->passes()){
            $question = new Oex_exam_question();
            $question->exam_id=$request->exam_id;
            $question->question=$request->question;
            $question->answer=$request->answer;
            $question->options=json_encode(array('opt_1'=>$request->opt_1,'opt_2'=>$request->opt_2,'opt_3'=>$request->opt_3
            ,'opt_4'=>$request->opt_4));
            $question->save();
            $arr = array('status'=>'true','message'=>'Thêm câu hỏi thành công !','reload'=>url('admin/add_question/' .$request->exam_id));
            
            // print_r($request->all());
        }else{
            $arr = array('status'=>'false','message'=>$validator->errors()->all());
        }
        echo json_encode($arr);
       
     }

    //  Edit Question
    public function update_question($id){
        $data['questions'] = Oex_exam_question::where('id',$id)->get()->toArray();
        return view('admin.update_question',$data);
    }
    public function edit_question(Request $request){
        // print_r($request->all());
        $question = Oex_exam_question::where('id',$request->id)->get()->first();
        $question->question=$request->question;
        $question->answer=$request->answer;
        $question->options=json_encode(array('opt_1'=>$request->opt_1,'opt_2'=>$request->opt_2,'opt_3'=>$request->opt_3
        ,'opt_4'=>$request->opt_4));
        $question->update();
        echo json_encode( array('status'=>'true','message'=>'Cập nhật thành công !','reload'=>url('admin/add_question/'.$question->exam_id)));

}

    //  Delete Qeustion
    public function delete_question($id){
        $question = Oex_exam_question::where('id',$id)->get()->first();
        $exam_id=$question->exam_id;
        $question->delete();
        return redirect(url('admin/add_question/'.$exam_id));
        // echo $id;
    }

    // Students

    public function manage_students(){
        $data['exams'] = Oex_exam::where('status','1')->get()->toArray();
        $data['students'] = Oex_students::select(['oex_students.*','oex_exams.title as ex_name','oex_exams.exam_date'])
        ->orderBy('id','asc')
        ->join('oex_exams','oex_students.exam','=','oex_exams.id')
        ->get()->toArray();
        return view('admin.manage_students',$data);
    }
    // add Students
    public function add_new_students(Request $request){
       
        $validator = Validator::make($request->all(),['name'=>'required','email'=>'required','mobile_no'=>'required','dob'=>'required','exam'=>'required','password'=>'required']);

       if($validator->passes()){
        $std = new Oex_students();
        $std->name=$request->name;
        $std->email=$request->email;
        $std->mobile_no=$request->mobile_no;
        $std->dob=$request->dob;
        $std->exam=$request->exam;
        $std->password=$request->password;
        $std->status = 1;
        $std->save();
        $arr = array('status'=>'true','message'=>'Thêm thành công !','reload'=>url('/admin/manage_students'));
       

       }else{
        $arr = array('status'=>'false','message'=>$validator->errors()->all());
       }
       echo json_encode($arr);
    }

    // Edit Students
    public function edit_students($id){
        $std = Oex_students::where('id',$id)->get()->first();
        $exams = Oex_exam::where('status','1')->get()->toArray();
        return view('admin.edit_students',['students'=> $std ,'exams'=>$exams]);
    }
    public function update_students(Request $request){
        $std = Oex_students::where('id',$request->id)->get()->first();
        $std->name=$request->name;
        $std->email=$request->email;
        $std->mobile_no=$request->mobile_no;
        $std->dob=$request->dob;
        $std->exam=$request->exam;
        if($request->password != '' ){
             $std->password=$request->password;
        }
        $std->update();
        echo json_encode( array('status'=>'true','message'=>'Students update success','reload'=>url('/admin/manage_students')));
    //    print_r($request->all());
    }
    // Delete Students
  
    public function delete_students($id){
        $std = Oex_students::where('id',$id)->get()->first();
        $std->delete();
        return redirect(url('admin/manage_students'));
    }

    // Manage Portal

    public function manage_portal(){
        $data['portal'] = Oex_portal::orderBy('id','asc')->where('status','1')->get()->toArray();
        return view('admin.manage_portal',$data);
    }
    public function add_new_portal(Request $request){
        // print_r($request->all());

        $validator = Validator::make($request->all(),['name'=>'required','email'=>'required','mobile_no'=>'required','password'=>'required']);

        if($validator->passes()){
         $std = new Oex_portal();
         $std->name=$request->name;
         $std->email=$request->email;
         $std->mobile_no=$request->mobile_no;
         $std->password=$request->password;
         $std->status = 1;
         $std->save();
         $arr = array('status'=>'true','message'=>'Thêm thành công !','reload'=>url('/admin/manage_portal'));
        }else{
         $arr = array('status'=>'false','message'=>$validator->errors()->all());
        }
        echo json_encode($arr);
    }

    // Edit portal
    public function edit_portal($id){
        $data['portal_info'] = Oex_portal::where('id',$id)->get()->first();
        return view('admin.edit_portal',$data);
    }
    public  function update_portal(Request $request){
        // print_r($request->all());
        $portal = Oex_portal::where('id',$request->id)->get()->first();
        $portal->name=$request->name;
        $portal->email=$request->email;
        $portal->mobile_no=$request->mobile_no;
        if($request->password != '' ){
             $portal->password=$request->password;
        }
        $portal->update();
        echo json_encode( array('status'=>'true','message'=>'Cập nhật thành công !','reload'=>url('/admin/manage_portal')));
    }
    // Delete portal 
    public function delete_portal($id){
        $portal = Oex_portal::where('id',$id)->get()->first();
        $portal->delete();
        return redirect(url('admin/manage_portal'));
    }
    public function logout(Request $request){
        $request->session()->forget('id');
        return redirect(url('/admin/signup'));
    }
}
