<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $table = "sup_requests";
    protected $fillable = ['phone','request'];
}
