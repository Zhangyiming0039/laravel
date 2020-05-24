<?php

namespace App\Http\Controllers\Best;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Category;
use App\Admin\Article_classify;
use DB;
use App\Admin\Article_content;
class IndexController extends Controller
{
    public function index(){
        
        $data=Category::orderBy("cate_time",'DESC')->Paginate(4);
        // dd($data);
        
        $lastarticles=Category::orderBy("cate_time",'DESC')->limit(4)->get();
        // dd($lastarticles);
       $classify=Article_classify::all();
        $j=0;
       foreach($classify as $v){
            $j++;
       }
    //    $before=Category::where("cate_classify","前端")->Paginate(4);
    //    $after=Category::where("cate_classify","前端")->Paginate(4);
        return view('mywelcome',compact('data','lastarticles','classify','j'));
    }
    public function article($cate_id){
        $lastarticles=Category::orderBy("cate_time",'DESC')->limit(4)->get();
        $data=Category::where('cate_id', $cate_id)->get(); 
        $value=Category::where('cate_id', $cate_id)->first();
        $classify=Article_classify::all();
        $j=0;
       foreach($classify as $v){
            $j++;
       }
       
    //    dd($value->article_content->art_content);
        return view('public-articles/article',compact('data','value','lastarticles','j','classify'));
    }
    // public function page($id){
    //     $categories=DB::table('category')->get();
    //     $pages=count($categories);//这是数据的总条数
    //     $num=$pages/4;
    //     $page=$_GET["page"]??1;
    //     dd($pages);

    // }
    public function tags($cate_classify){
        $classify=Article_classify::all();
        $j=0;
       foreach($classify as $v){
            $j++;
       }
        $lastarticles=Category::orderBy("cate_time",'DESC')->limit(4)->get();
        $data=Category::where('cate_classify', $cate_classify)->Paginate(4);

      return view('public-articles/tags',compact('data','lastarticles','j','classify'));

    }
    public function summary(){
        $classify=Article_classify::all();
        $j=0;
       foreach($classify as $v){
            $j++;
       }
        $lastarticles=Category::orderBy("cate_time",'DESC')->limit(4)->get();
        $data=Category::orderBy("cate_time",'DESC')->Paginate(5);
        return view('public-articles/summary',compact('data','classify','j','lastarticles'));
    }
}
