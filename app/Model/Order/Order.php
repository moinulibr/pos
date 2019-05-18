<?php

namespace App\Model\Order;

use Illuminate\Database\Eloquent\Model;
use App\Model\Customer\Customer;
use App\Model\Product\Product;
use App\Model\Orderdetail\Orderdetail;

class Order extends Model
{
    protected $fillable = [
        'customer_id', 'order_date', 'order_status','total_product','sub_total','vat','total','payment_status','pay','due',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
   
}
