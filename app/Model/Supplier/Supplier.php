<?php

namespace App\Model\Supplier;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'name', 'email', 'type','phone','address','shop_name','photo','account_name','account_number','bank_name','brance_name','status','city','verified','supplier_ref'
    ];

}
