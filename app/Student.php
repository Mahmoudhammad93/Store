<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "students";

    protected $fillable = ['fullname', 'email', 'mobile','branch'];

    public function getBranch(){
        return $this->belongsTo("App\Branch", "branch");
    }

}
