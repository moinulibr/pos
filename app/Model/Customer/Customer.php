<?php

namespace App\Model\Customer;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name', 'email', 'phone','address','shop_name','photo','account_name','account_number','bank_name','brance_name','status','city','verified','customer_ref'
    ];

}
