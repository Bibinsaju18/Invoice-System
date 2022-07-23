<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $table='customers';
    protected $fillable = [
        'customer_name','customer_address','bill_no','total_with_tax','total_without_tax','discount','grand_total','invoice_date','status',

    ];

    public function Bills()
    {
        return $this->belongsTo('App\Models\Bills', 'id', 'customer_id');
    }
}
