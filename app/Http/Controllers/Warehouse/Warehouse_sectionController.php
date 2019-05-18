<?php

namespace App\Http\Controllers\Warehouse;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Warehouse\Warehouse;
use App\Model\Warehouse\Warehouse_section;
use Validator;
use App\Model\Category\Category;
use App\Model\Product\Product;

class Warehouse_sectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['warehouse'] = Warehouse::where('status',0)->get();
        return view('all-folder.warehousesection.add-warehouse-section',$data);
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
                    'warehouse_id' => 'required',
                    'description' => 'required|max:255|min:2',
				]); 
		
			if($validator->fails()){
			   return redirect()->back()->withErrors($validator)->withInput();
            }

            $warehouse_sec = new Warehouse_section();

            $warehouse_sec->name = $request->name;
            $warehouse_sec->warehouse_id = $request->warehouse_id;
            $warehouse_sec->description = $request->description;
            $warehouse_in = $warehouse_sec->save();

                if ($warehouse_in) {
                    $notification=array(
                    'messege'=>'Successfully Warehouse Section Inserted ',
                    'alert-type'=>'success'
                    );
                return Redirect()->route('warehouse_section.show')->with($notification);  
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
        $data['warehouse_section'] = Warehouse_section::where('status',0)->get();
        return view('all-folder.warehousesection.show-warehouse-section',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['warehouse'] = Warehouse::where('status',0)->get();
        $data['warehouse_section'] = Warehouse_section::findOrFail($id);
        return view('all-folder.warehousesection.edit-warehouse-section',$data);
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
                    'warehouse_id' => 'required',
                    'description' => 'required|max:255|min:2',
				]); 
		

            $warehouse_sec =  Warehouse_section::findOrFail($id);

            $warehouse_sec->name = $request->name;
            $warehouse_sec->warehouse_id = $request->warehouse_id;
            $warehouse_sec->description = $request->description;
            $warehouse_in = $warehouse_sec->save();

                if ($warehouse_in) {
                    $notification=array(
                    'messege'=>'Successfully Warehouse Section Updated! ',
                    'alert-type'=>'success'
                    );
                return Redirect()->route('warehouse_section.show')->with($notification);  
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
    

    public function allshowproduct_by_warehouse_warehouseSection($id ,$wid)
    {   
        //$data['product'] = Product::where('cat_id',$id)->get();

        $data['product'] = Product::with('category')->with('wareh')->with('wareh_section')->where(['status' => 0 , 'verified' => 0])->where('warehouse_section',$id)->where('warehouse',$wid)->get(); 
        return view('all-folder.product.show-product',$data);

    }


}
