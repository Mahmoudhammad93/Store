<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    protected $table = "boxes";
    protected $fillable = ['type','value','date','desc','totl_value'];
}
