<?php

namespace App\Http\Controllers\Pos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Customer\Customer;
use App\Model\Product\Product;
use Session;

class PosajaxController extends Controller
{
    public function index()
    {
        $data['customer'] = Customer::where('status',0)->get();
        $data['product'] = Product::where('status',0)->get();
        return view('all-folder.pos.add-pos-ajax',$data);
    }
    public function store(Request $request){
        echo $request->product_id;
    }
    
    public function addToCart(Request $request)
    {
        $product_id =  $request->product_id;
        $cart = [];
        $product = Product::findOrFail($product_id);
        $unit_price = $product->selling_price;
        $cart = session()->has('cart') ? session()->get('cart') : [];
            if(array_key_exists($product->id,$cart))
             {
                $cart[$product->id]['quantity']++;
                $cart[$product->id]['total_price'] = $cart[$product->id]['quantity'] * $cart[$product->id]['unit_price'];
             }
             else{
                $cart[$product->id] = [
                    'product_id' => $product->id,
                    'product_name' => $product->product_name,
                    'quantity' => 1,
                    'unit_price' => $product->selling_price,
                    'total_price' => $unit_price
                ];        
             }

        
        //echo $cart[$product->id]['quantity']; 

        session()->put('cart',$cart);

        /*
        $cart = session()->has('cart') ? session()->get('cart')  : [];
        if($cart != "")
        {echo "ase kisu";}
             $td = "";
        foreach($cart as $item){
            $td.= '<td>' .$item['product_name']. '</td>';
        }
        return response()->json([
            'for' => $td
        ]);
            */
        //session()->put('cart',[]);
    return redirect()->back();
    }

    public function yourcart()
    {
        $data['customer'] = Customer::where('status',0)->get();
        $data['product'] = Product::where('status',0)->get();
        return view('all-folder.pos.add-pos-ajax-cart',$data);
    }


}


