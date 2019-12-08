<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    protected $fillable = ['code','name','category_id','unit_id','desc','sell_price','pay_price','expire_date','quantity','alert_quantity'];
   
    
    public function getCategory(){
        return $this->belongsTo("App\models\Category", "category_id");
    }

    public function getUnit(){
        return $this->belongsTo("App\models\Unit", "unit_id");
    }
}