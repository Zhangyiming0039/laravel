<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

//  implements \Illuminate\Contracts\Auth\Authenticatable
class Manager extends Model
{
    //
    protected $table='manager';
    //使用trait
    // use \Illuminate\Auth\Authenticatable;
    public $fillable=['username','password','email'];
    
}
