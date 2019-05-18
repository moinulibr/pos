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
                                    <h4 class="pull-left page-title">Update Supplier Type</h4>
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
                                    <div class="panel-heading"><h3 class="panel-title">Update Supplier Type</h3></div>
                                    <div class="panel-body">            
                                        <div class=" form">                                                                         <!--id="signupForm" novalidate="novalidate"--->          
                                            <form method="POST" action="{{ route('suppliertype.update',$supplier_type->id) }}"  class="cmxform form-horizontal tasi-form" novalidate="novalidate"  enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group ">
                                                    <label for="name" class="control-label col-lg-3">Supplier Type *</label>
                                                    <div class="col-lg-8"> 
                                                        <input value="{{ old('name') ?? $supplier_type->name }}"  class=" form-control" id="name" name="name" type="text" required>
                                                    
                                                        @if ($errors->has('name'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong class="red">{{ $errors->first('name') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="form-group ">
                                                    <label for="firstname" class="control-label col-lg-3">Description *</label>
                                                    <div class="col-lg-8"> 
                                                        <input value="{{ old('description') ?? $supplier_type->description }}" class=" form-control" id="description" name="description" required type="text">
                                                    
                                                        @if ($errors->has('description'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="red">{{ $errors->first('description') }}</strong>
                                                        </span>
                                                        @endif
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
                                                        <input class="btn btn-success " type="submit" value="Update"/>
                                                        <a  class="btn btn-default waves-effect" href="{{ route('suppliertype.show') }}">Cancel</a>
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