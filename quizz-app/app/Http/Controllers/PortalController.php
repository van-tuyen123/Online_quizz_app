<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oex_portal;
use Session;
use Validator;
class PortalController extends Controller
{
    public function portal_signup(){
        if(Session::get('portal_session'))
        {
            return redirect(url('portal/dashboard'));
        }
        return view('portal.signup');
    }
    public function signup_subject(Request $request){
        $validator = Validator::make($request->all(),['name'=>'required','email'=>'required','mobile_no'=>'required','password'=>'required']);

        if($validator->passes())
        {     
            $portal = new Oex_portal();
            $portal->name=$request->name;
            $portal->email=$request->email;
            $portal->mobile_no=$request->mobile_no;
            $portal->password=$request->password;
            $portal->status = 1;
            $portal->save();
            $arr = array('status'=>'true','message'=>'Success','reload'=>url('portal/login'));
             
    
        }else
        {
            $arr = array('status'=>'false','message'=>$validator->errors()->all());
        }
        echo json_encode($arr);
    }
    public function login(){
        if(Session::get('portal_session'))
        {
            return redirect(url('portal/dashboard'));
        }
        return view('portal.login');
    }
   
    public function login_subject(Request $request){
       $portal = Oex_portal::where('email',$request->email)->where('password',$request->password)->get()->toArray();
       if($portal)
       {
            if($portal[0]['status'] == 1)
            {
                $request->session()->put('portal_session',$portal[0]['id']);
                $arr= array('status'=>'true','message'=>'Success','reload'=>url('portal/dashboard'));
            }
            else
            {
                $arr= array('status'=>'false','message'=>'Tài khoản cảu bạn bị lỗi');
            }
        }
        else
        {
            $arr= array('status'=>'false','message'=>'Email và Mật khẩu không đúng ?');
        }
        echo json_encode($arr);
    }
    
       
}
