<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class InvoiceProducts extends Model
{
    protected $table = "invoice_product";
    protected $fillable = ['invoice_id','product_id','quantity','sell_price','pay_price','total_price','total_gain'];
   
    public function getProduct(){
        return $this->belongsTo("App\models\Product", "product_id");
    }
}
