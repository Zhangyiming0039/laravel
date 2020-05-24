<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Category;
use App\Http\Controllers\Controller;
use App\Admin\Article_content;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    // public function category(){
    //     return view('admin.index.category');
    // }
    public function index(){
    
      $categories=Category::Paginate(2);
     
    return view('admin.index.category')->with('data',$categories);
    }
    public function create(Request $request){
        $input=$request->except('_token','art_content');
        $content=$request->only('art_content');
        $tent=$content['art_content'];
        
        $create=Category::insert($input);
        $id=Category::orderBy("cate_time",'DESC')->first()->cate_id;
        $var=[
            'name'=>$id,
            'art_content'=>$tent
        ];
        // $content=Article_content::create(['cate_id'=>$id],['art_content'=>'$tent']);不知道为啥这样插入不成功
        $content=Article_content::create($var);
        if($create&&$content)
        {
            echo("添加成功");
        }else{
            echo("添加失败");
        }
    }
    public function show(){
        
    }
    public function update(Request $request,$id)
    {
        // 这里的requset用来获取用户的输入
        // $categories=DB::table('category')->get();
        $input=$request->except('_token','art_content');

        $va=$request->only('art_content');
        $content=Article_content::where('cate_id',$id)->update($va);
        $re=Category::where('cate_id',$id)->update($input);
        if($re||$va){
            // echo("修改成功");
            return view('admin/index/category');
        }
        else{
            // return back()->with('errors','编辑失败');
            echo("无任何修改");
        }
        // dd($input);
       
        
    }
    public function destroy()
    {

    }
    public function edit(){
   
    }
    public function alter($cate_id){
        
        $v=Category::where('cate_id', $cate_id)->first(); 
       //用下面的这种方式也可以，但是已经设置的关联了，不要画蛇添足了
     
        // $art=Article_content::where('cate_id', $cate_id)->first(); 
        
        
            return view('admin.index.alter',compact('v'));
        
             
       
       
    }
    public function delete(Request $request,$cate_id){
        // ($cate_id-1);
        $re=Category::where('cate_id',$cate_id)->delete();
        if($re){
           echo("删除成功");
        // redirect("admin.index.index");
        // return view("admin/index/");
        }
        else{
            // return back()->with('errors','编辑失败');
            echo("删除失败");
        }
    }
    public function add(){
        return view('admin.index.add');
    }
   
    public function before(){
        // $categories=DB::table('category')->get();
        // $data=array();
        // $j=0;
        // for($i=0;$i<count( $categories);$i++)
        // {
        //     if($categories[$i]->cate_classify=="前端"){
        //         $data[$j]=$categories[$i];
        //         $j++;
        //     }

        // }
        
        $data=Category::where("cate_classify","前端")->Paginate(6);
        // dd($data);
        return view('admin.index.article.before')->with('data',$data);
    }
    public function after(){
        // $categories=DB::table('category')->get();
        // $data=array();
        // $j=0;
        // for($i=0;$i<count( $categories);$i++)
        // {
        //     if($categories[$i]->cate_classify=="后端"){
        //         $data[$j]=$categories[$i];
        //         $j++;
        //     }

        // }
        $data=Category::where("cate_classify","后端")->Paginate(6);
        // dd($data);
        return view('admin.index.article.after')->with('data',$data);
    }
    public function article(){
        $cate_id=10;
        // $data=\App\admin\Category::where('cate_id',$cate_id)->get();
      
        // foreach($data as $key)
        //     dd($key->article_content->art_content);
            $data=\App\admin\Category::where('cate_id', $cate_id)->get(); 
            foreach($data as $key)
            dd($key->article_content->art_content);
            
        
            
    }
}
