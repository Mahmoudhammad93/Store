<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class permissions extends Model
{
    protected $table = "permissions";
    protected $fillable = ['group_id','menu','view','add','edit','delete','search','print'];
}
