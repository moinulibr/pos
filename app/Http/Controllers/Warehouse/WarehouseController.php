<?php

namespace App\Http\Controllers\Warehouse;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Warehouse\Warehouse;
use Validator;
use App\Model\Category\Category;
use App\Model\Warehouse\Warehouse_section;
use App\Model\Product\Product;


class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('all-folder.warehouse.add-warehouse');
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
        $input = $request->except('_token');

		    $validator = Validator::make($input,[
                    'name' => 'required|min:2|max:50',
                    'description' => 'required|max:255|min:2',
				]); 
		
			if($validator->fails()){
			   return redirect()->back()->withErrors($validator)->withInput();
            }

            $warehouse = new Warehouse();

            $warehouse->name = $request->name;
            $warehouse->description = $request->description;
            $warehouse_in = $warehouse->save();

                if ($warehouse_in) {
                    $notification=array(
                    'messege'=>'Successfully Warehouse Inserted ',
                    'alert-type'=>'success'
                    );
                return Redirect()->route('warehouse.show')->with($notification);  
                }
                else{
                    $notification=array(
                    'messege'=>'error ',
                    'alert-type'=>'success'
                        );
                    return Redirect()->back()->with($notification);
                }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id = null)
    {
        $data['warehouse'] = Warehouse::where('status',0)->get();
        return view('all-folder.warehouse.show-warehouse',$data);
    }
    

    public function allshowproduct_by_warehouse($id)
    {   
        //$data['product'] = Product::where('cat_id',$id)->get();

        $data['product'] = Product::with('category')->with('wareh')->with('wareh_section')->where(['status' => 0 , 'verified' => 0])->where('warehouse',$id)->get(); 
        return view('all-folder.product.show-product',$data);

    }
    


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['warehouse'] = Warehouse::findOrFail($id);
        return view('all-folder.warehouse.edit-warehouse',$data);
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
        $input = $request->except('_token');

        $validator = Validator::make($input,[
                'name' => 'required|min:2|max:50',
                'description' => 'required|max:255|min:2',
            ]); 
    

        $warehouse = Warehouse::findOrFail($id);

        $warehouse->name = $request->name;
        $warehouse->description = $request->description;
        $warehouse_in = $warehouse->save();

            if ($warehouse_in) {
                $notification=array(
                'messege'=>'Successfully Warehouse Updated! ',
                'alert-type'=>'success'
                );
            return Redirect()->route('warehouse.show')->with($notification);  
            }
            else{
                $notification=array(
                'messege'=>'error ',
                'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);
            }
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
