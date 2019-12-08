<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = "reservations";
    protected $fillable = ['patient_no','name','gender','address','phone','date_of_birth','res_expire_date','notes'];
}
