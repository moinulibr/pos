<?php

use App\Model\Product\Product;
use App\Model\Orderdetail\Orderdetail;

function count_product($id){
    return Product::where('cat_id', $id)->count();
}

function product_details($id){
   return $orderd =  Product::select('product_name','product_code')->where('id',$id)->first(); 
}

function count_product_by_warehouse($id){
    return Product::where('warehouse', $id)->count();
}

function total_product_by_warehouse_wareSection($id,$wid){
    return Product::where('warehouse', $wid)->where('warehouse_section',$id)->count();
}