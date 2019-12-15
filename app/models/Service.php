<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = "services";
    protected $fillable = ['c_name', 'c_price'];
}
