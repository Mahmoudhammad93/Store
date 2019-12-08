<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = "suppliers";
    protected $fillable = ['name','type','address','phone','notes','image'];

    public function getType(){
        return $this->belongsTo("App\models\SupplierTypes", "type");
    }

    public function getBalance(){
        return $this->hasMany("App\models\SupplierStartBalance","supplier_id")->orderBy('id','desc');
    }
}
