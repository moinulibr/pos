<?php

namespace App\Model\Warehouse;

use Illuminate\Database\Eloquent\Model;
use App\Model\Warehouse\Warehouse;
class Warehouse_section extends Model
{
    protected $fillable = [
        'name','warehouse_id','description','verified','status',
    ];

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

}
