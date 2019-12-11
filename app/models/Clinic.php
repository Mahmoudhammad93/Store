<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    protected $table    = "clinics";
    protected $fillable = ['c_name', 'c_services','c_doctor'];
}
