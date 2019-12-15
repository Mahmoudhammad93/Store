<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $rules = [
        'c_name' => 'required|c_name|unique:c_name',
    ];
    protected $table = "services";
    protected $fillable = ['c_name', 'c_price'];
}
