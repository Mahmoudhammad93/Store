<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = "groups";
    protected $fillable = ['name','desc'];

    public function permissions(){
        return $this->hasMany("App\models\permissions", "group_id");
    }

    public function SpecificPermissions($menu){
        return $this->permissions()->where('menu','=',$menu);
    }
}
