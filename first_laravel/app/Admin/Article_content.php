<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class Article_content extends Model
{
     protected $table='article_content';
     protected $fillable =['cate_id','art_content'];
     public $timestamps = false;
}
