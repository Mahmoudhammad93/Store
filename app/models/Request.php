<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $table = "sup_requests";
    protected $fillable = ['supId','phone','request'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id');
    }

    public function request()
    {
        return $this->belongsToMany(Request::class, 'supId');
    }
}
