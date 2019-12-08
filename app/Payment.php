<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = "payments";
    protected $fillable = ['student', 'offer', 'amount'];

    public function getStudent(){
        return $this->belongsTo("App\Student", "student");
    }
}
