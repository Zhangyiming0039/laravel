<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class ArticlelController extends Controller
{
    //
    public function before(){
        $categories=DB::table('category')->get();
        $data=array();
        
        // for($i=0;$i<count($categories);$i++)
        // {
        //     if($categories[$i]->cate_classify=="before_end"){
        //         $data+=$categories[$i];
        //     }

        // }
        dd($categories);
        // return view('admin.index.article.before')->with('data',$data);
    }
}
