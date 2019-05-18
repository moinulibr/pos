@extends('layouts.app')

@push('css')
    <style>.red{color:red;}</style>
@endpush

@section('content')

            <!-- ============================================================== -->
            <!-- page Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                    <!-- Start content -->
                    <div class="content">
                        <div class="container">
    
                            <!-- Page-Title -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4 class="pull-left page-title">Add Employee</h4>
                                    <ol class="breadcrumb pull-right">
                                        <li><a href="#">Moltran</a></li>
                                        <li class="active">Dashboard</li>
                                    </ol>
                                </div>
                            </div>
                            
                            <!---------->
                              <!-- Form-validation -->
                        <div class="row">
                        
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Add Employee</h3></div>
                                    <div class="panel-body">            
                                        <div class=" form">                                                                         <!--id="signupForm" novalidate="novalidate"--->          
                                            <form method="POST" action="{{ route('employee.store') }}"  class="cmxform form-horizontal tasi-form" novalidate="novalidate"  enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group ">
                                                    <label for="firstname" class="control-label col-lg-3">Name *</label>
                                                    <div class="col-lg-8">
                                                        <input value="{{ old('name') }}"  class=" form-control" id="firstname" name="name" type="text" required>
                                                    
                                                        @if ($errors->has('name'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong class="red">{{ $errors->first('name') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="email" class="control-label col-lg-3">Email <small>(optional)</small></label>
                                                    <div class="col-lg-8">
                                                        <input value="{{ old('mail') }}"  class="form-control " name="mail" type="text">
                                                    
                                                        @if ($errors->has('mail'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="red">{{ $errors->first('mail') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="firstname" class="control-label col-lg-3">Phone *</label>
                                                    <div class="col-lg-8">
                                                        <input value="{{ old('phone') }}"  class=" form-control" id="phone" name="phone" type="text" required>
                                                    
                                                        @if ($errors->has('phone'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="red">{{ $errors->first('phone') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="firstname" class="control-label col-lg-3">NID No *</label>
                                                    <div class="col-lg-8">
                                                        <input value="{{ old('nid_no') }}"  class=" form-control" id="nid_no" name="nid_no" type="text" required>
                                                    
                                                        @if ($errors->has('nid_no'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="red">{{ $errors->first('nid_no') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="firstname" class="control-label col-lg-3">Address *</label>
                                                    <div class="col-lg-8">
                                                        <input value="{{ old('address') }}" class=" form-control" id="address" name="address" required type="text">
                                                    
                                                        @if ($errors->has('address'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="red">{{ $errors->first('address') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                               
                                                <div class="form-group ">
                                                    <label for="firstname" class="control-label col-lg-3">Experience *</label>
                                                    <div class="col-lg-8">
                                                        <input value="{{ old('experience') }}"  class=" form-control" id="experience" name="experience" required type="text">
                                                    
                                                        @if ($errors->has('experience'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="red">{{ $errors->first('experience') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="firstname" class="control-label col-lg-3">Salary *</label>
                                                    <div class="col-lg-8">
                                                        <input value="{{ old('salary') }}"  class=" form-control" id="salary" name="salary" required type="text">
                                                    
                                                        @if ($errors->has('salary'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="red">{{ $errors->first('salary') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="firstname" class="control-label col-lg-3">Vacation *</label>
                                                    <div class="col-lg-8">
                                                        <input value="{{ old('vacation') }}" class=" form-control" id="vacation" name="vacation" required type="text">
                                                    
                                                        @if ($errors->has('vacation'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="red">{{ $errors->first('vacation') }}</strong>
                                                        </span>
                                                    @endif
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="firstname" class="control-label col-lg-3">City *</label>
                                                    <div class="col-lg-8">
                                                        <input value="{{ old('city') }}"  class=" form-control" id="city" name="city" required type="text">
                                                    
                                                        @if ($errors->has('city'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="red">{{ $errors->first('city') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="firstname" class="control-label col-lg-3">Designation <small>(optional)</small></label>
                                                    <div class="col-lg-8">
                                                        <select  class=" form-control" id="user_roll" name="user_roll">
                                                            <option value="1">Select One</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="firstname" style="margin-top:1%;" class="control-label col-lg-3">Photo *</label>
                                                    <div class="col-lg-8">
                                                        <img id="image" src="#" />
                                                        <input  type="file"  name="photo" accept="image/*"  required onchange="readURL(this);">
                                                    </div>
                                                </div>
                                                <!--
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-3">Lastname  *</label>
                                                    <div class="col-lg-8">
                                                        <input class=" form-control" id="lastname" name="lastname" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="username" class="control-label col-lg-3">Username *</label>
                                                    <div class="col-lg-8">
                                                        <input class="form-control " id="username" name="username" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="password" class="control-label col-lg-3">Password *</label>
                                                    <div class="col-lg-8">
                                                        <input class="form-control " id="password" name="password" type="password">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="confirm_password" class="control-label col-lg-3">Confirm Password *</label>
                                                    <div class="col-lg-8">
                                                        <input class="form-control " id="confirm_password" name="confirm_password" type="password">
                                                    </div>
                                                </div>
                                            <div class="form-group ">
                                                <label for="agree" class="control-label col-lg-3 col-sm-4">Agree to Our Policy *</label>
                                                <div class="col-lg-8 col-sm-9">
                                                    <input type="checkbox" style="width: 16px" class="checkbox form-control" id="agree" name="agree">
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="newsletter" class="control-label col-lg-3 col-sm-4">Receive the Newsletter</label>
                                                <div class="col-lg-8 col-sm-9">
                                                    <input type="checkbox" style="width: 16px" class="checkbox form-control" id="newsletter" name="newsletter">
                                                </div>
                                            </div>-->

                                                <div class="form-group">
                                                    <div class="col-lg-offset-3 col-lg-10">
                                                        <input class="btn btn-success " type="submit" value="Submit"/>
                                                        <a  class="btn btn-default waves-effect" href="{{ route('employee.show') }}">Cancel</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> <!-- .form -->

                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->
                            <div class="col-sm-1"></div>
                        </div> <!-- End row -->

                            <!---------->

                          
                        </div> <!-- container -->
                                   
                    </div> <!-- content -->
    
                    <footer class="footer text-right">
                        2015 © Moltran.
                    </footer>
    
                </div>
                <!-- ============================================================== -->
                <!-- End page content here -->
                <!-- ============================================================== -->
    
@endsection

@push('js')
   
        <!--form validation-->
        {{-- --<script type="text/javascript" src="{{ asset('admin/links/assets/jquery.validate/jquery.validate.min.js') }}"></script> --}}}
        <!--form validation init-->
      {{--<script src="{{ asset('admin/links/assets/jquery.validate/form-validation-init.js') }}"></script>--}}
                
    <!---Image js--->
    <script type="text/javascript">
            function readURL(input){
			if(input.files && input.files[0]){
			    var reader = new FileReader();
			    reader.onload = function (e){
				$('#image')
					.attr('src', e.target.result)
					.width(80)
					.height(80);
				};
				reader.readAsDataURL(input.files[0]);
			}
		 }
    </script>
     <!---Image js End--->

@endpush