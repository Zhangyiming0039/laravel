<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Manager;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use Crypt;

class PublicController extends Controller
{
    //登录界面展示
    public function login(){
        return view('admin.public.login');
    }
    public function check(Request $request){
        //开始自动验证
        $rule=[
            'username' =>'required',
            'password' =>'required',
            'captcha' =>'required|captcha',
        ];
        $msg=[
            'username.required'=>'用户名不能为空',
            'password.required'=>'密码不能为空',
            'captcha.required'=>'验证码不能为空',
            'captcha.captcha'=>'验证码错误',
        ]; 
        $data=$request->except('_token');
        $validator=Validator::make($data,$rule,$msg);
      
       
       
       
       if($validator->fails()){
        return redirect('/admin/public/login')
        ->witherrors($validator)
        ->withinput();
       }
        $input=$request->except('_token');
        $user=Manager::where('username',$input['username'])->first();
       
        // $user=Manager::where('username',$input['username'])->get();
         if((is_null($user))){
            session(['user' => null]);
        return redirect('/admin/public/login')
            ->witherrors('用户名不存在');

         }
        
           if($input['password']!=Crypt::decrypt($user->password)){
            session(['user' => null]);
                return redirect('/admin/public/login')
                ->witherrors('密码错误');
            }
           
        
         else{
            session(['user' => $user]);
            $name= $user->username;
            return redirect('/admin/index/myindex')->with('name');
         }
               
            
            
          
       
       
        // $data['status']='2';
        // $request=Auth::guard('oohsehun')->attempt($data,$request->get('online'));
        // if($request){
        //     return redirect('/admin/index/myindex');
        // }else{
        //     return redirect('/admin/public/login')->witherrors($validator);
        // }
        // 验证是否有此用户
      
       

    }
    public function logout(){
        session(['user'=>null]);
        return redirect('/admin/public/login');
    }
  
 
}

