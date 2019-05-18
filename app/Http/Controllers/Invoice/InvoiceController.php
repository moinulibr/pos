<?php

namespace App\Http\Controllers\Invoice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use App\Model\Customer\Customer;
use App\Model\Order\Order;
use App\Model\Orderdetail\Orderdetail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
       
                if($request->customer != "" && $request->customer > 0){
                        $input = $request->except('_token');
                        $validator = Validator::make($input,[
                            'customer' => 'required|min:1'
                        ]); 
                        if($validator->fails()){
                            return redirect()->back()->withErrors($validator)->withInput();
                        }
                    }
                    else{
                        $notification=array(
                        'messege'=>'Must have to select Customer Name ',
                        'alert-type'=>'error'
                            );
                        return Redirect()->back()->with('msg','You have Must to select Customer!')->with($notification);
                    }

                $data['customer'] = Customer::findOrFail($request->customer)->first();
                $data['cart'] = session()->has('cart') ? session()->get('cart')  : [];
                $data['total'] = array_sum(array_column($data['cart'],'total_price'));
                $data['total_quantity'] = array_sum(array_column($data['cart'],'quantity'));
        return view('all-folder.invoice.add-invoice',$data);
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
            /*
            $input = $request->except('_token');
            $validator = Validator::make($input,[
                'customer_id' => 'required',
                'order_date' => 'required',
                'order_status' => 'max:20',
                'total_product' => 'required',
                'sub_total' => 'required',
                'vat' => 'required',
                'total' => 'required',
                'payment_status' => 'required',
                'pay' => 'nullable',
                'due' => 'nullable',
            ]); 
            if($validator->fails()){
                return redirect()->back()->with('msg','Please Add Some Product!')->withErrors($validator)->withInput();
            }*/

            $order = new Order();
            $order->customer_id = $request->customer_id;
            $order->order_date = $request->order_date;
            $order->order_status = $request->order_status;
            $order->total_product = $request->total_product;
            $order->sub_total = $request->sub_total;
            $order->vat = $request->vat;
            $order->total = $request->sub_total + $request->vat;
            $order->payment_status = $request->payment;
            $order->pay = $request->pay;
            $order->due = $request->due;
            $order->save();
            $order_id = $order->id;

            $cart = session()->has('cart') ? session()->get('cart')  : [];
            $total = array_sum(array_column($cart,'total_price'));
            $total_quantity = array_sum(array_column($cart,'quantity'));
           
            //$orderdetail = new Orderdetail();
            $data = [];
            foreach($cart as  $product){

                $data['order_id'] = $order_id;
                $data['product_id'] = $product['product_id'];
                $data['quantity'] = $product['quantity'];
                $data['unitprice'] = $product['unit_price'];
                $data['total'] = $product['quantity'] * $product['unit_price'];
                $data['created_at'] = Carbon::now();
                $insert  =  DB::table('orderdetails')->insert($data);
                    /*
                    $orderdetail->order_id = $order_id;
                    $orderdetail->product_id = $product['product_id'];
                    $orderdetail->quantity = $product['quantity'];
                    $orderdetail->unitprice = $product['unit_price'];
                    $orderdetail->total = $total; */

                    //$orderdetail->save();
            }

            session(['cart' => []]);

            $notification=array(
                'messege'=>'Your Ordered is Successfully ',
                'alert-type'=>'success'
                    );
                return Redirect()->route('pos')->with($notification);
    }

    //--Print Option
    public function printInvoice($id)
    {
        
        $data['customer'] = Customer::findOrFail($id)->first();      
        $data['cart'] = session()->has('cart') ? session()->get('cart')  : [];
        $data['total'] = array_sum(array_column($data['cart'],'total_price'));
        $data['total_quantity'] = array_sum(array_column($data['cart'],'quantity'));
        return view('all-folder.invoice.print-invoice',$data);

    }

    //--PDF Create and Download
    public function pdfDownloadInvoice($id)
    {

        $data['customer'] = Customer::findOrFail($id)->first();      
        $data['cart'] = session()->has('cart') ? session()->get('cart')  : [];
        $data['total'] = array_sum(array_column($data['cart'],'total_price'));
        $data['total_quantity'] = array_sum(array_column($data['cart'],'quantity'));

        $pdf =  PDF::loadView('all-folder.invoice.pdf-invoice',$data);
        $pdf->stream();
        return $pdf->download('invoice.pdf');
        
         /*
        $pdf = \App::make('dompdf.wrapper');
	    $pdf->loadHTML('all-folder.invoice.pdf-invoice',$data);	//[Html Code ,which want to convert to pdf file]
	    return $pdf->stream();   //[for show pdf file]
        */
       // return view('all-folder.invoice.pdf-invoice',$data);

    }


    //for testing
    public function print(){
        return view('print');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {   /*
        $data['customer'] = Customer::findOrFail($id)->first();
        $data['cart'] = session()->has('cart') ? session()->get('cart')  : [];
        $data['total'] = array_sum(array_column($data['cart'],'total_price'));
        $data['total_quantity'] = array_sum(array_column($data['cart'],'quantity'));
        return view('all-folder.invoice.process-invoice',$data); */
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
}
