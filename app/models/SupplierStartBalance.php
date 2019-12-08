<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class SupplierStartBalance extends Model
{
    protected $table = "supplier_start_balances";
    protected $fillable = ['supplier_id','desc','date','payment_type','depet_value','total_balance'];
}
