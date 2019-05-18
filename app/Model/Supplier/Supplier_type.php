<?php

namespace App\Model\Supplier;

use Illuminate\Database\Eloquent\Model;

class Supplier_type extends Model
{
    protected $table = "supplier_typies"; 
    protected $fillable = [
        'name', 'description','status',
    ];
}
