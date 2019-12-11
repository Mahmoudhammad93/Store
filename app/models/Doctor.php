<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table    = "doctors";
    protected $fillable = ['name', 'phone','email','specialty','note'];
}
