<?php

namespace App\Http\Controllers\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Order\Order;
use App\Model\Orderdetail\Orderdetail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['orders'] = Order::where('order_status','pending')->get();
        return view('all-folder.order.show-pending',$data);
    }
    public function showPendingSingleOrder($id)
    {
        $data['order_detials'] = Orderdetail::where('order_id',$id)->get();
        $data['total'] = $data['order_detials']->sum('total');
        $data['order'] = Order::findOrFail($id); 
        return view('all-folder.order.view-single',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function approved($id)
    {
        $order = Order::findOrFail($id);;
 
        $order->order_status = "approve";
       $approved = $order->save();
        if ($approved) {
            $notification=array(
            'messege'=>'Order Approved Successfully!',
            'alert-type'=>'success'
            );
        return Redirect()->route('pending.order')->with($notification);  
        }
        else{
            $notification=array(
            'messege'=>'Order Not-approved ',
            'alert-type'=>'error'
                );
            return Redirect()->back()->with($notification);
        }
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
    public function showSuccessOrder($id = null)
    {
        $data['orders'] = Order::where('order_status','approve')->get();
        return view('all-folder.order.show-success',$data);
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
