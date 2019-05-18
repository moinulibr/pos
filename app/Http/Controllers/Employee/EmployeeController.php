<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Model\Employee\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('all-folder.employee.add-employee');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
                'phone' => 'required|unique:employees,phone|max:15|min:11',
                'nid_no' => 'required|unique:employees,nid_no|max:100|min:6',
                'address' => 'required|max:255|min:2',
                'experience' => 'required|min:2|max:50',
                'photo' => 'required|image|mimes:jpeg,jpg,png,gif',
                'salary' => 'required|min:3|max:30',
                'vacation' => 'nullable|min:1|max:30',
                'city' => 'required|min:2|max:50',
                'user_roll' => 'required'
            ]); 
    
        if($validator->fails()){
           return redirect()->back()->withErrors($validator)->withInput();
        }

        $employee = new Employee;
        $employee->name = $request->name;
        $employee->email = $request->mail;
        $employee->phone = $request->phone;
        $employee->nid_no = $request->nid_no;
        $employee->address = $request->address;
        $employee->experience = $request->experience;
        $employee->salary = $request->salary;
        $employee->vacation = $request->vacation;
        $employee->city = $request->city;
        $employee->user_roll = $request->user_roll;

        if ($request->photo) {
            $ext1 = strtolower($request->file('photo')->getClientOriginalExtension());
           if ($ext1 != "jpg" && $ext1 != "jpeg" && $ext1 != "png" && $ext1 != "gif") {
             $ext1 = "";
           } else {
               $employee->photo = $ext1;
               $employee_insert = $employee->save();
               $insertedId = $employee->id;
               $destinationPath = "admin/profile/picture "; 
               $request->file('photo')->move($destinationPath,"admin-profile-{$insertedId}-1.{$ext1}");
                    if ($employee_insert) {
                        $notification=array(
                        'messege'=>'Successfully Employee Inserted ',
                        'alert-type'=>'success'
                        );
                    return Redirect()->route('employee.show')->with($notification);  
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
            $employee->photo = $ext1;
            $employee_in = $employee->save();

                if ($employee_in) {
                    $notification=array(
                    'messege'=>'Successfully Employee Inserted ',
                    'alert-type'=>'success'
                    );
                return Redirect()->route('employee.show')->with($notification);  
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
        $data['employee'] = Employee::where('status',0)->get();
        return view('all-folder.employee.show-employee',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $data['employee'] = Employee::findOrFail($id);
         return view('all-folder.employee.edit-employee',$data);
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
                'phone' => 'required|unique:employees,phone|max:15|min:11|id',
                'nid_no' => 'required|unique:employees,nid_no|max:100|min:6|id',
                'address' => 'required|max:255|min:2',
                'experience' => 'required|min:2|max:50',
                //'photo' => 'required|image|mimes:jpeg,jpg,png,gif',
                'salary' => 'required|min:3|max:30',
                'vacation' => 'nullable|min:1|max:30',
                'city' => 'required|min:2|max:50',
                'user_roll' => 'required'
            ]); 
    

       // $employee = new Employee;

       $employee =  Employee::findOrFail($id);
        $employee->name = $request->name;
        $employee->email = $request->mail;
        $employee->phone = $request->phone;
        $employee->nid_no = $request->nid_no;
        $employee->address = $request->address;
        $employee->experience = $request->experience;
        $employee->salary = $request->salary;
        $employee->vacation = $request->vacation;
        $employee->city = $request->city;
        $employee->user_roll = $request->user_roll;
       
        if ($request->photo) {
             $ext1 = strtolower($request->file('photo')->getClientOriginalExtension());
            if ($ext1 != "jpg" && $ext1 != "jpeg" && $ext1 != "png" && $ext1 != "gif") {
              $ext1 = "";
            } else {

                if(file_exists("admin/profile/picture/admin-profile-{$employee->id}-1.{$employee->photo}")) {
                    unlink("admin/profile/picture/admin-profile-{$employee->id}-1.{$employee->photo}");
                }
                $employee->photo = $ext1;
                $employee_update = $employee->save();
                //$insertedId = $employee->id;
                
                $destinationPath = "admin/profile/picture "; 
                $request->file('photo')->move($destinationPath,"admin-profile-{$employee->id}-1.{$ext1}");
                if ($employee_update) {
                    $notification=array(
                    'messege'=>'Successfully Employee Updated! ',
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
            $ext1 = $employee->photo;
            $employee->photo = $ext1;
            $employee_updt = $employee->save();

                if ($employee_updt) {
                    $notification=array(
                    'messege'=>'Successfully Employee Updated! ',
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
        $employee = Employee::findOrFail($id);

        
        if(file_exists("admin/profile/picture/admin-profile-{$employee->id}-1.{$employee->photo}")) {
            unlink("admin/profile/picture/admin-profile-{$employee->id}-1.{$employee->photo}");
        }

        $delete = $employee->delete();
        
        if ($delete) {
            $notification=array(
            'messege'=>'Successfully Employee Deleted! ',
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
