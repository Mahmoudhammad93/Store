<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = "patients";
    protected $fillable = ['patient_no','name','gender','address','phone','date_of_birth','notes'];
}
