<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Category\Category;
use App\Model\Product\Product;
use App\Model\Supplier\Supplier;
use App\Model\Warehouse\Warehouse;
use App\Model\Warehouse\Warehouse_section;
use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['category'] = Category::where('status',0)->where('verified',0)->get();
        $data['supplier'] = Supplier::where('status',0)->where('verified',0)->get();
        $data['warehouse'] = Warehouse::where('status',0)->where('verified',0)->get();
        $data['warehouse_section'] = Warehouse_section::where('status',0)->where('verified',0)->get();
        return view('all-folder.product.add-product',$data);
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
    public function getWarehouse_id(Request $request)
    {
        $id = $request->warehouse_id;
        $wareSection = Warehouse_section::where('warehouse_id',$id)->get();

        $warehouse_de = "";
        foreach($wareSection as $wareSection_id){
            $warehouse_de .= '<option value="'.$wareSection_id->id.'">'.$wareSection_id->name.'</option>'; 
        }
        return $warehouse_de;
    }
    public function getWarehouse_id_selected(Request $request)
    {
        $product_id = $request->product_id;
        $pid = Product::findOrFail($product_id);
        $pidid= $pid->warehouse_section;
        $id = $request->warehouse_id;
        $wareSection = Warehouse_section::where('warehouse_id',$id)->get();
        
        $warehouse_de = "";     //selected="'.$pid->warehouse_section == $wareSection_id->id ?'selected':''.'"
        foreach($wareSection as $wareSection_id){
            //$warehouse_de .= '<option value="'.$wareSection_id->id.'" selected="'.$pid->warehouse_section == $wareSection_id->id ?"selected" : "" .'" >'.$wareSection_id->name.'</option>'; 
            //$warehouse_de .= '<option value="'.$wareSection_id->id.'" selected="'.$wareSection_id->id == $pid->warehouse_section ?"selected" : "" .'">'.$wareSection_id->name.'</option>'; 
            $warehouse_de .= '<option  value="'.$wareSection_id->id.'">' . $wareSection_id->name .'</option>'; 
        }
        return $warehouse_de;
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
                    'product_name' => 'required|min:2|max:50',
                    'product_code' => 'required|unique:products,product_code|max:50|min:1',
                    'category' => 'required',
                    'supplier' => 'required',
                    'warehouse' => 'required',
                    'buying_price' => 'required|max:30|min:2',
                    'selling_price' => 'required|max:30|min:2',
                    'buying_date' => 'required',
                    'expire_date' => 'required',
                    'photo' => 'nullable|image|mimes:jpeg,jpg,png,gif',
				]); 
		
			if($validator->fails()){
			   return redirect()->back()->withErrors($validator)->withInput();
            }

            $product = new Product();

            $product->product_name = $request->product_name;
            $product->product_code = $request->product_code;
            $product->cat_id = $request->category;
            $product->supplier_id = $request->supplier;
            $product->warehouse = $request->warehouse;
            $product->warehouse_section = $request->warehouse_section;
            $product->buying_price = $request->buying_price;
            $product->selling_price = $request->selling_price;
            $product->buying_date = $request->buying_date;
            $product->expire_date = $request->expire_date;

          
            if ($request->photo) {
                $ext1 = strtolower($request->file('photo')->getClientOriginalExtension());
               if ($ext1 != "jpg" && $ext1 != "jpeg" && $ext1 != "png" && $ext1 != "gif") {
                 $ext1 = "";
               } else {
                   $product->photo = $ext1;
                  $product_insert =  $product->save();
                 // $product->category()->attach($request->category);
                   $insertedId = $product->id;
                   $destinationPath = "admin/other/product/picture "; 
                   $request->file('photo')->move($destinationPath,"product-{$insertedId}-1.{$ext1}");
                        if ($product_insert) {
                            $notification=array(
                            'messege'=>'Successfully Product Inserted ',
                            'alert-type'=>'success'
                            );
                        return Redirect()->route('product.show')->with($notification);  
                        }
                        else{
                            $notification=array(
                            'messege'=>'error ',
                            'alert-type'=>'success'
                                );
                            return Redirect()->back()->with($notification);
                        }
                    }   
             }else {
                $ext1 = "default.png";
                $product->photo = $ext1;
              $insert =  $product->save();
              //$product->category()->attach($request->category);

                    if ($insert) {
                        $notification=array(
                        'messege'=>'Successfully Product Inserted ',
                        'alert-type'=>'success'
                        );
                    return Redirect()->route('product.show')->with($notification);  
                    }
                    else{
                        $notification=array(
                        'messege'=>'error ',
                        'alert-type'=>'success'
                            );
                        return Redirect()->back()->with($notification);
                    }
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
        /*
        $data['category'] = Category::where('status',0)->where('verified',0)->get();
        $data['supplier'] = Supplier::where('status',0)->where('verified',0)->get();
        $data['warehouse'] = Warehouse::where('status',0)->where('verified',0)->get();
        $data['warehouse_section'] = Warehouse_section::where('status',0)->where('verified',0)->get();*/
       
        
        $data['product'] = Product::with('category')->with('wareh')->with('wareh_section')->where(['status' => 0 , 'verified' => 0])->get(); 
        return view('all-folder.product.show-product',$data); 
    }
    public function showSingleProduct($id = null)
    {
        $data['category'] = Category::where('status',0)->where('verified',0)->get();
        $data['supplier'] = Supplier::where('status',0)->where('verified',0)->get();
        $data['warehouse'] = Warehouse::where('status',0)->where('verified',0)->get();
        $data['warehouse_section'] = Warehouse_section::where('status',0)->where('verified',0)->get();
       
        $data['product'] = Product::with('category')->with('wareh')->with('wareh_section')->where(['status' => 0 , 'verified' => 0,'id'=>$id])->first(); 
        return view('all-folder.product.show-single-product',$data); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['product'] = Product::with('category')->with('wareh')->with('wareh_section')->where(['status' => 0 , 'verified' => 0,'id'=>$id])->first(); 
        $data['category'] = Category::where('status',0)->where('verified',0)->get();
        $data['supplier'] = Supplier::where('status',0)->where('verified',0)->get();
        $data['warehouse'] = Warehouse::where('status',0)->where('verified',0)->get();
        
        $data['warehouse_section'] = Warehouse_section::where('status',0)->where('verified',0)->where('warehouse_id', $data['product']->warehouse)->get();
        return view('all-folder.product.edit-product',$data);
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
                    'product_name' => 'required|min:2|max:50',
                    'product_code' => 'required|unique:products,product_code|max:50|min:1|id',
                    'category' => 'required',
                    'supplier' => 'required',
                    'warehouse' => 'required',
                    'buying_price' => 'required|max:30|min:2',
                    'selling_price' => 'required|max:30|min:2',
                    'buying_date' => 'required',
                    'expire_date' => 'required',
                    //'photo' => 'nullable|image|mimes:jpeg,jpg,png,gif',
				]); 
		

            //$product = new Product();
            $product = Product::findOrFail($id);

            $product->product_name = $request->product_name;
            $product->product_code = $request->product_code;
            $product->cat_id = $request->category;
            $product->supplier_id = $request->supplier;
            $product->warehouse = $request->warehouse;
            $product->warehouse_section = $request->warehouse_section;
            $product->buying_price = $request->buying_price;
            $product->selling_price = $request->selling_price;
            $product->buying_date = $request->buying_date;
            $product->expire_date = $request->expire_date;

            if ($request->photo) {
                $ext1 = strtolower($request->file('photo')->getClientOriginalExtension());
               if ($ext1 != "jpg" && $ext1 != "jpeg" && $ext1 != "png" && $ext1 != "gif") {
                 $ext1 = "";
               } else {
                   if(file_exists("admin/other/product/picture/product-{$product->id}-1.{$product->photo}")) {
                       unlink("admin/other/product/picture/product-{$product->id}-1.{$product->photo}");
                   }
                   $product->photo = $ext1;
                   $update = $product->save();
                   //$insertedId = $employee->id;

                   $destinationPath = "admin/other/product/picture "; 
                   $request->file('photo')->move($destinationPath,"product-{$product->id}-1.{$ext1}");
                   if ($update) {
                       $notification=array(
                       'messege'=>'Successfully Product Updated! ',
                       'alert-type'=>'success'
                       );
                   return Redirect()->back()->with($notification);  
                   }
                   else{
                       $notification=array(
                       'messege'=>'error ',
                       'alert-type'=>'success'
                           );
                       return Redirect()->back()->with($notification);
                   }
                 }
             }else {
                $ext1 = $product->photo;
                $product->photo = $ext1;
              $insert =  $product->save();
    
                    if ($insert) {
                        $notification=array(
                        'messege'=>'Successfully Product Update ',
                        'alert-type'=>'success'
                        );
                    return Redirect()->route('product.show')->with($notification);  
                    }
                    else{
                        $notification=array(
                        'messege'=>'error ',
                        'alert-type'=>'success'
                            );
                        return Redirect()->back()->with($notification);
                    }
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
        $product = Product::findOrFail($id);
      
        if(file_exists("admin/other/product/picture/product-{$product->id}-1.{$product->photo}")) {
            unlink("admin/other/product/picture/product-{$product->id}-1.{$product->photo}");
        }
            $delete = $product->delete();
            if ($delete) {
                $notification=array(
                'messege'=>'Successfully Product Deleted ',
                'alert-type'=>'success'
                );
            return Redirect()->route('product.show')->with($notification);  
            }
            else{
                $notification=array(
                'messege'=>'error ',
                'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);
            }
    }




}
