<?php

namespace App\Admin;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Searchable;
 

    protected $table='category';
    public $timestamps = true;
    public function article_content(){
         return $this->hasOne('App\admin\Article_content','cate_id','cate_id');
    }
    public function searchableAs()
    {
        return 'cate_id';
    }
    public function toSearchableArray()
    {
        $array = $this->toArray(); // 自定义数组... 
        return $array; 
    }
    // public function getScoutKey()
    // {
    //     return $this->cate_id;
    // }
    // public function getScoutKeyName()
    // {
    //     return 'cate_id';
    // }
}
