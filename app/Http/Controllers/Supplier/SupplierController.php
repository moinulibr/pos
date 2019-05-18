<?php

namespace App\Http\Controllers\Supplier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Supplier\Supplier;
use App\Model\Supplier\Supplier_type;
use Validator;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data['type'] = Supplier_type::where('status',0)->get();
        return view('all-folder.supplier.add-supplier',$data);
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
                    'mail' => 'nullable|max:120|unique:employees,email',
                    'phone' => 'required|unique:suppliers,phone|max:15|min:11',
                    'type' => 'required',
                    'shop_name' => 'required|max:100|min:6',
                    'address' => 'required|max:255|min:2',
                    'account_name' => 'nullable|max:50',
                    'account_number' => 'nullable|max:50',
                    'bank_name' => 'nullable|max:50',
                    'brance_name' => 'nullable|max:50',
                    'photo' => 'nullable|image|mimes:jpeg,jpg,png,gif',
                    'city' => 'required|min:2|max:50',
                    'supplier_ref' => 'required'
				]); 
		
			if($validator->fails()){
			   return redirect()->back()->withErrors($validator)->withInput();
            }

            $supplier = new Supplier();

            $supplier->name = $request->name;
            $supplier->email = $request->mail;
            $supplier->phone = $request->phone;
            $supplier->type = $request->type;
            $supplier->shop_name = $request->shop_name;
            $supplier->address = $request->address;
            $supplier->account_name = $request->account_name;
            $supplier->account_number = $request->account_number;
            $supplier->bank_name = $request->bank_name;
            $supplier->brance_name = $request->brance_name;
            $supplier->city = $request->city;
            $supplier->supplier_ref = $request->supplier_ref;

            if ($request->photo) {
                $ext1 = strtolower($request->file('photo')->getClientOriginalExtension());
               if ($ext1 != "jpg" && $ext1 != "jpeg" && $ext1 != "png" && $ext1 != "gif") {
                 $ext1 = "";
               } else {
                   $supplier->photo = $ext1;
                  $supplier_insert =  $supplier->save();
                   $insertedId = $supplier->id;
                   $destinationPath = "admin/other/supplier/profile/picture "; 
                   $request->file('photo')->move($destinationPath,"supplier-profile-{$insertedId}-1.{$ext1}");
                        if ($supplier_insert) {
                            $notification=array(
                            'messege'=>'Successfully Supplier Inserted ',
                            'alert-type'=>'success'
                            );
                        return Redirect()->route('supplier.show')->with($notification);  
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
                $supplier->photo = $ext1;
              $insert =  $supplier->save();
    
                    if ($insert) {
                        $notification=array(
                        'messege'=>'Successfully Supplier Inserted ',
                        'alert-type'=>'success'
                        );
                    return Redirect()->route('supplier.show')->with($notification);  
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
        $data['type'] = Supplier_type::where('status',0)->get();
        $data['supplier'] = Supplier::where('verified',0)->where('status',0)->get();
        return view('all-folder.supplier.show-supplier',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['type'] = Supplier_type::where('status',0)->get();
        
        $data['supplier'] = Supplier::findOrFail($id);
        return view('all-folder.supplier.edit-supplier',$data);
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
                'mail' => 'nullable|max:120|unique:employees,email|id',
                'phone' => 'required|unique:suppliers,phone|max:15|min:11|id',
                'type' => 'required',
                'shop_name' => 'required|max:100|min:6',
                'address' => 'required|max:255|min:2',
                'account_name' => 'nullable|max:50',
                'account_number' => 'nullable|max:50',
                'bank_name' => 'nullable|max:50',
                'brance_name' => 'nullable|max:50',
                //'photo' => 'nullable|image|mimes:jpeg,jpg,png,gif',
                'city' => 'required|min:2|max:50',
                'supplier_ref' => 'required'
            ]); 
    

        //$supplier = new Supplier();
        $supplier = Supplier::findOrfail($id);

        $supplier->name = $request->name;
        $supplier->email = $request->mail;
        $supplier->phone = $request->phone;
        $supplier->type = $request->type;
        $supplier->shop_name = $request->shop_name;
        $supplier->address = $request->address;
        $supplier->account_name = $request->account_name;
        $supplier->account_number = $request->account_number;
        $supplier->bank_name = $request->bank_name;
        $supplier->brance_name = $request->brance_name;
        $supplier->city = $request->city;
        $supplier->supplier_ref = $request->supplier_ref;


        if ($request->photo) {
            $ext1 = strtolower($request->file('photo')->getClientOriginalExtension());
           if ($ext1 != "jpg" && $ext1 != "jpeg" && $ext1 != "png" && $ext1 != "gif") {
             $ext1 = "";
           } else {

               if(file_exists("admin/other/supplier/profile/picture/supplier-profile-{$supplier->id}-1.{$supplier->photo}")) {
                   unlink("admin/other/supplier/profile/picture/supplier-profile-{$supplier->id}-1.{$supplier->photo}");
               }
               $supplier->photo = $ext1;
               $update = $supplier->save();
               //$insertedId = $employee->id;
               
               $destinationPath = "admin/other/supplier/profile/picture "; 
               $request->file('photo')->move($destinationPath,"supplier-profile-{$supplier->id}-1.{$ext1}");
               if ($update) {
                   $notification=array(
                   'messege'=>'Successfully Supplier Updated! ',
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
           $ext1 = $supplier->photo;
           $supplier->photo = $ext1;
          $update = $supplier->save();

               if ($update) {
                   $notification=array(
                   'messege'=>'Successfully Supplier Updated! ',
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $supplier = Supplier::findOrFail($id);
      
       if(file_exists("admin/other/supplier/profile/picture/supplier-profile-{$supplier->id}-1.{$supplier->photo}")) {
        unlink("admin/other/supplier/profile/picture/supplier-profile-{$supplier->id}-1.{$supplier->photo}");
        }
            $delete = $supplier->delete();
            if ($delete) {
                $notification=array(
                'messege'=>'Successfully Supplier Deleted! ',
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



    
}
