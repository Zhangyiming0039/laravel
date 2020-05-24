<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Manager;
use Crypt;
class PasswordController extends Controller
{
    //
    public function alter(){
       
        $name='oohsehun';
           return view('admin/pwd_alter',compact('name'));
    }
    public function check(Request $request){
        $input=$request->except('_token');
        $value=Manager::where('username',$input['username'])->first();
        $str=$value->password;
        if($input['oldpassword']!=Crypt::decrypt($str)){
                return redirect("/admin/index/pass_alter")->witherrors("原密码错误");
        }
        $value->password=Crypt::encrypt($input['newpassword']);
        $value->update();
         echo('修改成功');
    }

}
