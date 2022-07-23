<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table='bills';
    protected $fillable = [
        'bill_no','customer_id','product','qty','price','tax','tax_amount','total','status',

    ];

    public function customers()
    {
        return $this->belongsTo('App\Models\Customers', 'customer_id', 'id');
    }
}
