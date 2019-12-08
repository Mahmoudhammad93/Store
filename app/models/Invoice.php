<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = "invoices";
    protected $fillable = ['code','due','date','invoice_type','total_value','total_gain','supplier_id'];

    public function getSupplier(){
        return $this->belongsTo("App\models\Supplier", "supplier_id");
    }

    public function getInvoiceProducts(){
        return $this->hasMany("App\models\InvoiceProducts", "invoice_id");
    }
}
