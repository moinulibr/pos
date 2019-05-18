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
                                    <h4 class="pull-left page-title">Add Product</h4>
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
                                    <div class="panel-heading"><h3 class="panel-title">Add Product</h3></div>
                                    <div class="panel-body">            
                                        <div class=" form">                                                                         <!--id="signupForm" novalidate="novalidate"--->          
                                            <form method="POST" action="{{ route('product.store') }}"  class="cmxform form-horizontal tasi-form" novalidate="novalidate"  enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group ">
                                                    <label for="firstname" class="control-label col-lg-3">Product Name *</label>
                                                    <div class="col-lg-8">
                                                        <input value="{{ old('product_name') }}"  class=" form-control" id="product_name" name="product_name" type="text" required>
                                                    
                                                        @if ($errors->has('product_name'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong class="red">{{ $errors->first('product_name') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="product_code" class="control-label col-lg-3">Product Code *<small></small></label>
                                                    <div class="col-lg-8">
                                                        <input value="{{ old('product_code') }}"  class="form-control " name="product_code" type="text">
                                                    
                                                        @if ($errors->has('product_code'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="red">{{ $errors->first('product_code') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="firstname" class="control-label col-lg-3">Categrory *<small></small></label>
                                                    <div class="col-lg-8">
                                                        <select  class=" form-control" id="category" name="category">
                                                            <option value="0">Select One</option>
                                                            @foreach ($category as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                            @endforeach
                                                        </select>

                                                        @if ($errors->has('category'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="red">{{ $errors->first('category') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="firstname" class="control-label col-lg-3">Supplier *<small></small></label>
                                                    <div class="col-lg-8">
                                                        <select  class=" form-control" id="supplier" name="supplier">
                                                            <option value="0">Select One</option>
                                                            @foreach ($supplier as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                            @endforeach
                                                        </select>

                                                        @if ($errors->has('supplier'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="red">{{ $errors->first('supplier') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="warehouse" class="control-label col-lg-3">Warehouse Name *<small></small></label>
                                                    <div class="col-lg-8">
                                                        <select  class="whClass form-control" id="warehouse" name="warehouse">
                                                            <option value="0">Select One</option>
                                                            @foreach ($warehouse as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                            @endforeach
                                                        </select>

                                                        @if ($errors->has('warehouse'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="red">{{ $errors->first('warehouse') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="warehouse_section" class="control-label col-lg-3">Warehouse Section/Route *<small></small></label>
                                                    <div class="col-lg-8">
                                                        <select  class=" form-control" id="warehouse_section" name="warehouse_section">
                                                            <option value="0">Select Warehouse First</option>
                                                        </select>

                                                        @if ($errors->has('warehouse_section'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="red">{{ $errors->first('warehouse_section') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="buying_price" class="control-label col-lg-3">Buying Price *</label>
                                                    <div class="col-lg-8">
                                                        <input value="{{ old('buying_price') }}" class=" form-control" id="buying_price" name="buying_price" required type="text">
                                                    
                                                        @if ($errors->has('buying_price'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="red">{{ $errors->first('buying_price') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="selling_price" class="control-label col-lg-3">Selling Price *</label>
                                                    <div class="col-lg-8">
                                                        <input value="{{ old('selling_price') }}"  class=" form-control" id="selling_price" name="selling_price" type="text" required>
                                                    
                                                        @if ($errors->has('selling_price'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="red">{{ $errors->first('selling_price') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="buying_date" class="control-label col-lg-3">Buying Date *</label>
                                                    <div class="col-lg-8">
                                                        <input value="{{ old('buying_date') }}"  class=" form-control" id="buying_date" name="buying_date" required type="date">
                                                    
                                                        @if ($errors->has('buying_date'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="red">{{ $errors->first('buying_date') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="expire_date" class="control-label col-lg-3">Expire Date *</label>
                                                    <div class="col-lg-8">
                                                        <input value="{{ old('expire_date') }}"  class=" form-control" id="expire_date" name="expire_date" required type="date">
                                                    
                                                        @if ($errors->has('expire_date'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="red">{{ $errors->first('expire_date') }}</strong>
                                                        </span>
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
                                                        <input class="btn btn-success " type="submit" value="Submit"/>
                                                        <a  class="btn btn-default waves-effect" href="{{ route('product.show') }}">Cancel</a>
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
      
      
      <script>
            $(document).ready(function () {
                $(".whClass").change(function (e) {
                //var product_id = $(this).attr('id').substr(3);
                var warehouse_id = $(this).val();
               
                    $.ajax({
                    url: "{{ route('warehouse_id') }}",
                    type: 'GET',
                    data: {
                        "_token": $("meta[name='csrf-token']").attr("content"),
                        //"qty": $("#qty").val(),
                        "warehouse_id": warehouse_id
                    },
                    beforeSend: function () {

                    },
                    success: function (msg) {
                            $('#warehouse_section').html(msg);
                        }
                    });
                    e.preventDefault();
                });
            });  
        </script>

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