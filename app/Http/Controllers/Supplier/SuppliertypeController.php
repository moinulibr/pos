<?php

namespace App\Http\Controllers\Supplier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Supplier\Supplier_type;
use Validator;

class SuppliertypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('all-folder.suppliertype.add-supplier-type');
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

            $suppliertype = new Supplier_type();

            $suppliertype->name = $request->name;
            $suppliertype->description = $request->description;
            $suppliertype_in = $suppliertype->save();

                if ($suppliertype_in) {
                    $notification=array(
                    'messege'=>'Successfully Supplier Type Inserted ',
                    'alert-type'=>'success'
                    );
                return Redirect()->route('suppliertype.show')->with($notification);  
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
        $data['supplier_type'] = Supplier_type::where('status',0)->get();
        //have to lurn
        //$data['posts'] = Product::select('cat_id')->where('cat_id',$id)->count('cat_id');
        return view('all-folder.suppliertype.show-supplier-type',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['supplier_type'] = Supplier_type::findOrFail($id);
        return view('all-folder.suppliertype.edit-supplier-type',$data);
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
    
        if($validator->fails()){
           return redirect()->back()->withErrors($validator)->withInput();
        }

        $suppliertype = Supplier_type::findOrFail($id);

        $suppliertype->name = $request->name;
        $suppliertype->description = $request->description;
        $suppliertype_in = $suppliertype->save();

            if ($suppliertype_in) {
                $notification=array(
                'messege'=>'Successfully Supplier Type Updated ',
                'alert-type'=>'success'
                );
            return Redirect()->route('suppliertype.show')->with($notification);  
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
