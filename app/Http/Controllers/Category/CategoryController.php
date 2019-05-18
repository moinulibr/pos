<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Model\Category\Category;
use App\Model\Product\Product;
use Validator;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('all-folder.category.add-category');
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

            $category = new Category;

            $category->name = $request->name;
            $category->description = $request->description;
            $category_in = $category->save();

                if ($category_in) {
                    $notification=array(
                    'messege'=>'Successfully Category Inserted ',
                    'alert-type'=>'success'
                    );
                return Redirect()->route('category.show')->with($notification);  
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
        //$data['total_product'] = Product::select('cat_id')->where('cat_id',$id)->count('cat_id');
        /*
        return $count_product =  DB::table('products')
                        ->join('products','product.cat_id','categories.id')
                        ->select('cat_id')->where('products.cat_id','categories.id')->count('products.cat_id');
            */
        $data['category'] = Category::where('status',0)->get();
                //have to lurn
        $data['posts'] = Product::select('cat_id')->where('cat_id',$id)->count('cat_id');
        return view('all-folder.category.show-category',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$data['category'] = Category::findOrFail($id);  //->where('status',0)->
        $data['category'] = Category::where('status',0)->findOrFail($id);
        return view('all-folder.category.edit-category',$data);
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

        $category = Category::findOrFail($id);
           
        $category->name = $request->name;
        $category->description = $request->description;
        $category_in = $category->save();

            if ($category_in) {
                $notification=array(
                'messege'=>'Successfully Category Updated! ',
                'alert-type'=>'success'
                );
            return Redirect()->route('category.show')->with($notification);  
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


    public function allshow($id)
    {
        
    }
    
    public function allshowproduct($id)
    {
        //$data['product'] = Product::where('cat_id',$id)->get();

        $data['product'] = Product::with('category')->with('wareh')->with('wareh_section')->where(['status' => 0 , 'verified' => 0])->where('cat_id',$id)->get(); 
        return view('all-folder.product.show-product',$data);

    }
    

   
}
