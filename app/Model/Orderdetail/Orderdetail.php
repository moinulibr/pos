<?php

namespace App\Model\Orderdetail;

use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    protected $fillable = [
        'order_id', 'product_id', 'quantity','unitprice','total',
    ];
}
