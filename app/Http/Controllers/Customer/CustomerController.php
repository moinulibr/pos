<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Model\Customer\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('all-folder.customer.add-customer');
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
                    'mail' => 'nullable|max:120|unique:customers,email',
                    'phone' => 'required|unique:customers,phone|max:15|min:11',
                    'shop_name' => 'required|max:100|min:6',
                    'address' => 'required|max:255|min:2',
                    'account_name' => 'nullable|max:50',
                    'account_number' => 'nullable|max:50',
                    'bank_name' => 'nullable|max:50',
                    'brance_name' => 'nullable|max:50',
                    'photo' => 'nullable|image|mimes:jpeg,jpg,png,gif',
                    'city' => 'required|min:2|max:50',
                    'customer_ref' => 'required'
				]); 
		
			if($validator->fails()){
			   return redirect()->back()->withErrors($validator)->withInput();
            }

            $customer = new Customer;

            $customer->name = $request->name;
            $customer->email = $request->mail;
            $customer->phone = $request->phone;
            $customer->shop_name = $request->shop_name;
            $customer->address = $request->address;
            $customer->account_name = $request->account_name;
            $customer->account_number = $request->account_number;
            $customer->bank_name = $request->bank_name;
            $customer->brance_name = $request->brance_name;
            $customer->city = $request->city;
            $customer->customer_ref = $request->customer_ref;

            if ($request->photo) {
                $ext1 = strtolower($request->file('photo')->getClientOriginalExtension());
               if ($ext1 != "jpg" && $ext1 != "jpeg" && $ext1 != "png" && $ext1 != "gif") {
                 $ext1 = "";
               } else {
                   $customer->photo = $ext1;
                   $customer_insert =  $customer->save();
                   $insertedId = $customer->id;
                   $destinationPath = "admin/other/customer/profile/picture "; 
                   $request->file('photo')->move($destinationPath,"customer-profile-{$insertedId}-1.{$ext1}");
                        if ($customer_insert) {
                            $notification=array(
                            'messege'=>'Successfully Customer Inserted ',
                            'alert-type'=>'success'
                            );
                        return Redirect()->route('customer.show')->with($notification);  
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
                $customer->photo = $ext1;
                $customer_in = $customer->save();
    
                    if ($customer_in) {
                        $notification=array(
                        'messege'=>'Successfully Customer Inserted ',
                        'alert-type'=>'success'
                        );
                    return Redirect()->route('customer.show')->with($notification);  
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
    public function show()
    {   
        $data['customer'] = Customer::all();
        return view('all-folder.customer.show-customer',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['customer'] = Customer::findOrFail($id);
        return view('all-folder.customer.edit-customer',$data);
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
                'mail' => 'nullable|max:120|unique:customers,email|id',
                'phone' => 'required|unique:customers,phone|max:15|min:11|id',
                'shop_name' => 'required|max:100|min:6',
                'address' => 'required|max:255|min:2',
                'account_name' => 'nullable|max:50',
                'account_number' => 'nullable|max:50',
                'bank_name' => 'nullable|max:50',
                'brance_name' => 'nullable|max:50',
                'photo' => 'required|image|mimes:jpeg,jpg,png,gif',
                'city' => 'required|min:2|max:50',
                'customer_ref' => 'required'
            ]); 
    
      
       
        $customer = Customer::findOrfail($id);

        $customer->name = $request->name;
        $customer->email = $request->mail;
        $customer->phone = $request->phone;
        $customer->shop_name = $request->shop_name;
        $customer->address = $request->address;
        $customer->account_name = $request->account_name;
        $customer->account_number = $request->account_number;
        $customer->bank_name = $request->bank_name;
        $customer->brance_name = $request->brance_name;
        $customer->city = $request->city;
        $customer->customer_ref = $request->customer_ref;


        if ($request->photo) {
            $ext1 = strtolower($request->file('photo')->getClientOriginalExtension());
           if ($ext1 != "jpg" && $ext1 != "jpeg" && $ext1 != "png" && $ext1 != "gif") {
             $ext1 = "";
           } else {

               if(file_exists("admin/other/customer/profile/picture/customer-profile-{$customer->id}-1.{$customer->photo}")) {
                   unlink("admin/other/customer/profile/picture/customer-profile-{$customer->id}-1.{$customer->photo}");
               }
               $customer->photo = $ext1;
               $customer_update =  $customer->save();
               //$insertedId = $employee->id;
               
               $destinationPath = "admin/other/customer/profile/picture "; 
               $request->file('photo')->move($destinationPath,"customer-profile-{$customer->id}-1.{$ext1}");
               if ($customer_update) {
                   $notification=array(
                   'messege'=>'Successfully Customer Updated! ',
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
           $ext1 = $customer->photo;
           $customer->photo = $ext1;
           $customer_updt = $customer->save();

               if ($customer_updt) {
                   $notification=array(
                   'messege'=>'Successfully Customer Updated! ',
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
        $customer = Customer::findOrFail($id);

        if(file_exists("admin/other/customer/profile/picture/customer-profile-{$customer->id}-1.{$customer->photo}")) {
            unlink("admin/other/customer/profile/picture/customer-profile-{$customer->id}-1.{$customer->photo}");
        }
        $delete = $customer->delete();
        if ($delete) {
            $notification=array(
            'messege'=>'Successfully Customer Deleted! ',
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
