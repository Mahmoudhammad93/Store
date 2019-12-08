<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class OtherInvoice extends Model
{
    protected $table = "other_invoices";
    protected $fillable = ['desc','value','date'];
}
