<?php

namespace App\Model\Warehouse;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $fillable = [
        'name','description','verified','status',
    ];
}
