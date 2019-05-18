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
                                    <h4 class="pull-left page-title">Add Supplier</h4>
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
                                    <div class="panel-heading"><h3 class="panel-title">Add Supplier</h3></div>
                                    <div class="panel-body">            
                                        <div class=" form">                                                                         <!--id="signupForm" novalidate="novalidate"--->          
                                            <form method="POST" action="{{ route('supplier.update',$supplier->id) }}"  class="cmxform form-horizontal tasi-form" novalidate="novalidate"  enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group ">
                                                    <label for="firstname" class="control-label col-lg-3">Supplier Name *</label>
                                                    <div class="col-lg-8">
                                                        <input value="{{ old('name')?? $supplier->name }}"  class=" form-control" id="firstname" name="name" type="text" required>
                                                    
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
                                                        <input value="{{ old('mail')?? $supplier->email }}"  class="form-control " name="mail" type="text">
                                                    
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
                                                        <input value="{{ old('phone')?? $supplier->phone }}"  class=" form-control" id="phone" name="phone" type="text" required>
                                                    
                                                        @if ($errors->has('phone'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="red">{{ $errors->first('phone') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="firstname" class="control-label col-lg-3">Type <small></small></label>
                                                    <div class="col-lg-8">
                                                        <select  class=" form-control" id="type" name="type">
                                                            <option value="0">Please Select One</option>
                                                            @foreach ($type as $item)
                                                            <option {{ $supplier->type == $item->id ? 'selected':'' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                                            @endforeach
                                                        </select>

                                                        @if ($errors->has('type'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="red">{{ $errors->first('type') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="firstname" class="control-label col-lg-3">Address *</label>
                                                    <div class="col-lg-8">
                                                        <input value="{{ old('address')?? $supplier->address }}" class=" form-control" id="address" name="address" required type="text">
                                                    
                                                        @if ($errors->has('address'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="red">{{ $errors->first('address') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                        <label for="firstname" class="control-label col-lg-3">Shop Name *</label>
                                                        <div class="col-lg-8">
                                                            <input value="{{ old('shop_name')?? $supplier->shop_name }}"  class=" form-control" id="shop_name" name="shop_name" type="text" required>
                                                        
                                                            @if ($errors->has('shop_name'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong class="red">{{ $errors->first('shop_name') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="firstname" class="control-label col-lg-3">Accont Name *</label>
                                                    <div class="col-lg-8">
                                                        <input value="{{ old('account_name')?? $supplier->account_name }}"  class=" form-control" id="account_name" name="account_name" required type="text">
                                                    
                                                        @if ($errors->has('account_name'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="red">{{ $errors->first('account_name') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="firstname" class="control-label col-lg-3">Account Number *</label>
                                                    <div class="col-lg-8">
                                                        <input value="{{ old('account_number')?? $supplier->account_number }}"  class=" form-control" id="account_number" name="account_number" required type="text">
                                                    
                                                        @if ($errors->has('account_number'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="red">{{ $errors->first('account_number') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="firstname" class="control-label col-lg-3">Bank Name *</label>
                                                    <div class="col-lg-8">
                                                        <input value="{{ old('bank_name')?? $supplier->bank_name }}" class=" form-control" id="bank_name" name="bank_name" required type="text">
                                                    
                                                        @if ($errors->has('bank_name'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="red">{{ $errors->first('bank_name') }}</strong>
                                                        </span>
                                                    @endif
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="firstname" class="control-label col-lg-3">Branch Name*</label>
                                                    <div class="col-lg-8">
                                                        <input value="{{ old('brance_name')?? $supplier->brance_name }}" class=" form-control" id="brance_name" name="brance_name" required type="text">
                                                    
                                                        @if ($errors->has('brance_name'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="red">{{ $errors->first('brance_name') }}</strong>
                                                        </span>
                                                    @endif
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="firstname" class="control-label col-lg-3">City *</label>
                                                    <div class="col-lg-8">
                                                        <input value="{{ old('city')?? $supplier->city }}"  class=" form-control" id="city" name="city" required type="text">
                                                    
                                                        @if ($errors->has('city'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="red">{{ $errors->first('city') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="firstname" class="control-label col-lg-3">Supplier Ref. <small></small></label>
                                                    <div class="col-lg-8">
                                                        <select  class=" form-control" id="supplier_ref" name="supplier_ref">
                                                            <option {{ $supplier->supplier_ref == 1 ? 'selected':'' }}  value="1">Select One</option>
                                                        </select>

                                                        @if ($errors->has('supplier_ref'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="red">{{ $errors->first('supplier_ref') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="firstname" style="margin-top:1%;" class="control-label col-lg-3">Current Photo *</label>
                                                    <div class="col-lg-8">
                                                            @if (file_exists("admin/other/supplier/profile/picture/supplier-profile-{$supplier->id}-1.{$supplier->photo}"))
                                                            <img src="{{ asset("admin/other/supplier/profile/picture/supplier-profile-{$supplier->id}-1.{$supplier->photo}") }}" alt="imgae" style="width:60px; height:60px;"/>
                                                            @else 
                                                            <img  src="{{ asset("admin/profile/picture/default/default.png") }}"  style="width:60px; height:60px;" />

                                                            @endif
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
                                                        <input class="btn btn-success " type="submit" value="Update"/>
                                                        <a  class="btn btn-default waves-effect" href="{{ route('supplier.show') }}">Cancel</a>
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