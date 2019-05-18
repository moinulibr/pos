<?php

namespace App\Model\Category;

use Illuminate\Database\Eloquent\Model;
use App\Model\Product\Product;


class Category extends Model
{
    protected $fillable = [
        'name', 'status','description','verified',
    ];


    public function product()
    {
        return $this->hasMany(Product::class);
        
    }

   
}
