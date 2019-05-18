<?php

namespace App\Http\Controllers\Pos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Customer\Customer;
use App\Model\Product\Product;
use Session;
use App\Model\Bangladesh\Division;
use App\Model\Bangladesh\District;
use App\Model\Bangladesh\Upazila;

class PosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['customer'] = Customer::where('status',0)->get();
        $data['product'] = Product::where('status',0)->get();
        return view('all-folder.pos.add-pos',$data);
    }

    public function removeFromCart(Request $request)
    {
        $cart = session()->has('cart') ? session()->get('cart')  :[];
		unset($cart[$request->input('product_id')]);	
		session(['cart'=>$cart]);
        return redirect()->back();
    }
    public function addToCart(Request $request)
    {
        $id = $request->input('product_id');
        $cart = [];
        $id =  $request->id;
        $product =  Product::findOrFail($id);
        $unit_price = $product->selling_price;
        
        $cart = session()->has('cart') ? session()->get('cart')  : [];
        
        if(array_key_exists($product->id,$cart))
		 {
             if($request->qty != "" && $request->qty >0){
                $cart[$product->id]['quantity'] = $request->qty ;
             }
             else{
                $cart[$product->id]['quantity']++ ;
             }
            $cart[$product->id]['total_price'] = $cart[$product->id]['quantity'] * $cart[$product->id]['unit_price'];
			//$cart[$product->id]['quantity'] += 1;
		 }   
		else{
			$cart[$product->id] = [
            'product_id' => $product->id,
			'product_name' => $product->product_name,
			'quantity' =>1,
			'unit_price' => $unit_price,
			'total_price' => $unit_price
		    ];
        }
        
		session(['cart' => $cart]);
        return redirect()->back();
    }


    public function showCart()
    {
        session(['cart' => []]);
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function Bangladesh(Request $request){
        $data['divisions'] = Division::all();
        return view('all-folder.pos.bangladesh',$data); 
    }

    public function Bangladesh_div(Request $request){
   
        if($request->division_id)
        {
            $districts = District::where('division_id',$request->division_id)->get();
            $dis = '';
            foreach($districts as $district){
                $dis .= '<option value="'.$district->id.'">'.$district->name.'</option>';   
            }
            return response()->json([
                'dis' => $dis
            ]);
        }
        if($request->district_id != "")
        {
            $upazilas = Upazila::where('district_id',$request->district_id)->get();
            $upo = '';
            foreach($upazilas as $upazila){
                $dis .= '<option value="'.$upazila->id.'">'.$upazila->name.'</option>';   
            }
            return response()->json([
                'upo' => $upo
            ]);
        }
       
      
        
        //return redirect()->back();
        //return view('all-folder.pos.bangladesh',$data);  120977
    }
}
