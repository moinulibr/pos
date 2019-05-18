<?php

namespace App\Model\Product;

use Illuminate\Database\Eloquent\Model;
use App\Model\Category\Category;

use App\Model\Supplier\Supplier;
use App\Model\Warehouse\Warehouse;
use App\Model\Warehouse\Warehouse_section;

class Product extends Model
{
    protected $fillable = [
        'product_name', 'cat_id', 'supplier_id','product_code','warehouse','warehouse_section','photo','buying_price','selling_price','buying_date','expire_date','status','verified',
    ];


    public function category(){
        return $this->belongsTo(Category::class,'cat_id');
    }

    public function wareh(){
        return $this->belongsTo(Warehouse::class,'warehouse');
    }
    public function wareh_section(){
        return $this->belongsTo(Warehouse_section::class,'warehouse_section');
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class,'supplier_id');
    }


}
