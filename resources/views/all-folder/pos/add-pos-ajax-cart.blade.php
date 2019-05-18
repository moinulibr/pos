@extends('layouts.app')

@push('css')
     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">
     
    <!-- DataTables -->
    <link href="{{ asset('admin/links/assets/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />

   <style>
        .price_card{
        padding-bottom:0px !important;
    }
    .price_card button {
        margin-top: 1px;
        }
   </style>
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
                                    <h4 class="pull-left page-title">Welcome !</h4>
                                    <ol class="breadcrumb pull-right">
                                        <li><a href="#">Moltran</a></li>
                                        <li class="active">Dashboard</li>
                                    </ol>
                                </div>
                            </div>
                            
                            <!---------->
                            <div class="row">
                                <div class="col-sm-5" style="overflow:hidden;">
                                        <div class="row" style="margin-bottom:5px;">
                                            <div class="col-sm-12">
                                                    <a  class="btn btn-sm btn-info pull-left" href="{{ route('pos.ajax') }}">Product Purches</a>
                                                <a  class="btn btn-sm btn-info pull-right" data-toggle="modal" data-target="#con-close-modal"> Add Customer</a>
                                            </div>
                                        </div>
                                        <div class="price_card text-center" style="margin-bottom:0px;">
                                                <div class="table" style="border:1px solid gray;">
                                                    <table class="table table-response">
                                                        <thead class="bg-primary text-white">
                                                            <tr>
                                                                <th style="width:20%; color:white;font-size:12px;">P.Name</th>
                                                                <th style="width:10%; color:white;font-size:12px;">Qty</th>
                                                                <th style="width:20%; color:white;font-size:12px;">Unite Price</th>
                                                                <th style="width:20%; color:white;font-size:12px;">Sub Price</th>
                                                                <th style="width:3%; color:white;font-size:12px;">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="font-size:11px;text-align:left;">
                                                                <tr id="foreach"></tr>
                                                            @php
                                                                $cart = session()->has('cart') ? session()->get('cart')  : [];
                                                                $total = array_sum(array_column($cart,'total_price'));
                                                                $total_quantity = array_sum(array_column($cart,'quantity'));
                                                                $vat = $total * 5 / 100 ;
                                                            @endphp
                                                            @if (empty($cart))
                                                                <tr>
                                                                    <td colspan="4" style="text-align:center; color:red;">
                                                                        <span >
                                                                            No Product Added in Your Cart!
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                @else
                                                                <tr id="foreach"></tr>
                                                                
                                                                @foreach ($cart as $key => $item)
                                                                <tr>
                                                                    <td>{{ $item['product_name'] }}</td>  
                                                                    <td>
                                                                        <form action="{{ route('add.to.cart') }}" method="post">
                                                                            @csrf
                                                                            <input value="{{ $item['quantity'] }}" name="qty" id="qty-{{ $item['product_id'] }}" class="clickToGet" type="text" style="width:77%;">
                                                                            <input type="hidden" name="id" value="{{ $item['product_id'] }}" />
                                                                            <button id="qty-submit-{{ $item['product_id'] }}" style="display:none;" type="submit"><i class="fa fa-check"></i></button>
                                                                        </form>
                                                                    </td>
                                                                    <td><span class="clickToGet" id="price-{{ $item['product_id'] }}">{{ $item['unit_price'] }}</span></td>
                                                                    <td><span id="set-{{ $item['product_id'] }}">{{ $item['total_price'] }}</span></td>
                                                                    <td>
                                                                        <form action="{{ route('remove.from.cart') }}" method="POST">
                                                                            @csrf
                                                                            <input type="hidden" name="product_id" value="{{ $item['product_id'] }}">
                                                                            <button type="submit" style="margin-top:-3%;"><i class="fa fa-trash"></i></button>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            <tr>
                                                                <td colspan="5" style="text-align:center; color:red;">
                                                                    <a href="{{ route('show.cart') }}" class="btn btn-danger btn-sm pull-right" style="margin-bottom:-4%;">
                                                                            Cart Clear
                                                                    </a>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                             
                                                <div class="bg-primary" style="color:white;margin-bottom:-3.1%;">
                                                        <h5 style="color:white;padding-top:3%;">Quantity : {{ $total_quantity }} </h5>
                                                        <h5 style="color:white;">Sub-Total : {{ $total }}</h5>
                                                        <h5 style="color:white;">Vat : {{ $vat }} <small> (vat 5%)</small></h5>
                                                        <h4 id="total" style="padding-bottom:3%;color:white;">Total Price :  {{ $total + $vat }} </h4>
                                                </div>
                                            </div>
                                        </div> <!-- end Pricing_card -->
                                        @if (!empty($cart))
                                        <div class="row">
                                                <div class="from-group">
                                                     <form action="{{ route('invoice') }}" method="POST">
                                                         @csrf
                                                     <div class="col-sm-9">
     
                                                             @if (session('msg'))
                                                             <div>
                                                                 <div class="alert alert-danger alert-dismissable">
                                                                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                                     {{ session('msg') }}
                                                                 </div>
                                                             </div>
                                                             @endif
     
                                                             <select name="customer" id="customer" class="form-control">
                                                                 <option value="0" >Select One Please</option>
                                                                 @foreach($customer as $item)
                                                                 <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                 @endforeach
                                                             </select>
                                                     </div>
                                                     <label style="margin-top:2%;" for="" class="col-sm-3 pull-right"> Customer</label>
                                                </div>  
                                                 <div style="margin-right:2.4%; margin-top:3%;">
                                                     <button type="submit" class="btn btn-primary waves-effect waves-light w-md pull-right" >Create Invoice</button> 
                                                 </div>
                                                 </form>
                                             </div> 
                                        @endif
                                        
                                </div>
                                <div class="col-sm-7">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th style="width:5%;font-size:10px;">Picture</th>
                                                            <th style="width:15%;font-size:10px;">Product Name</th>
                                                            <th style="width:15%;font-size:10px;">Category Name</th>
                                                            <th style="width:5%;font-size:10px;">Selling Price</th>
                                                            <th style="width:5%;font-size:10px;">Stock</th>
                                                            <th style="width:5%;font-size:10px;">Stk ID</th>
                                                            <th style="width:5%;font-size:10px;">Add</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody style="font-size:12px;color:black;">
                                                        @foreach ($product as $item)
                                                            <tr>
                                                                <td>
                                                                    @if(file_exists("admin/other/product/picture/product-{$item->id}-1.{$item->photo}"))
                                                                        <img src="{{ asset("admin/other/product/picture/product-{$item->id}-1.{$item->photo}") }}" alt="" style="width:50px; height:35px;">
                                                                        @else
                                                                        No Picture
                                                                     @endif
                                                                </td>  
                                                                <td>{{ $item->product_name }}</td>
                                                                <td>{{ $item->category->name }}</td>                                                                                 
                                                                <td>{{ $item->selling_price }}</td>                                                                                                                                    
                                                                <td>
                                                                        stock 
                                                                </td>
                                                                <td>45k</td>
                                                                <td>
                                                                    <form action="{{ route('add.to.cart') }}" method="POST">
                                                                        @csrf
                                                                        <input name="id" id="id" class="id" type="hidden" value="{{ $item->id }}">
                                                                        <button type="submit" id="id-{{ $item->id }}" class="plus btn btn-xs btn-primary"> <i class="fa fa-plus"></i></button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

                <!---Modal Add Customer---->
                <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog"> 
                            <div class="modal-content"> 
                                <div class="modal-header"> 
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                    <h4 class="modal-title">Add New Customer</h4> 
                                </div> 
                                <div class="modal-body"> 
                                    <form method="POST" action="{{ route('customer.store') }}"  class="cmxform form-horizontal tasi-form" novalidate="novalidate"  enctype="multipart/form-data">
                                    @csrf
                                    <div class="row"> 
                                        <div class="col-md-6"> 
                                            <div class="form-group"> 
                                                <label for="field-1" class="control-label">Name</label><input value="{{ old('name') }}"  class=" form-control" id="firstname" name="name" type="text" required>
                                                    
                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong class="red">{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div> 
                                        </div> 
                                        <div class="col-md-6"> 
                                            <div class="form-group"> 
                                                <label for="field-2" class="control-label">Email <small>(optional)</small></label>
                                                 <input value="{{ old('mail') }}"  class="form-control " name="mail" type="text">
                                                    
                                                @if ($errors->has('mail'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong class="red">{{ $errors->first('mail') }}</strong>
                                                </span>
                                                @endif 
                                            </div> 
                                        </div> 
                                    </div> 
                                    <div class="row"> 
                                        <div class="col-md-12"> 
                                            <div class="form-group"> 
                                                <label for="field-3" class="control-label">Address</label>
                                                <input value="{{ old('address') }}" class=" form-control" id="address" name="address" required type="text">
                                                    
                                                        @if ($errors->has('address'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="red">{{ $errors->first('address') }}</strong>
                                                        </span>
                                                        @endif
                                            </div> 
                                        </div> 
                                    </div> 
                                    <div class="row"> 
                                        <div class="col-md-4"> 
                                            <div class="form-group"> 
                                                <label for="field-4" class="control-label">Phone</label>
                                                <input value="{{ old('phone') }}"  class=" form-control" id="phone" name="phone" type="text" required>
                                                    
                                                        @if ($errors->has('phone'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="red">{{ $errors->first('phone') }}</strong>
                                                        </span>
                                                        @endif
                                            </div> 
                                        </div> 
                                        <div class="col-md-4"> 
                                            <div class="form-group"> 
                                                <label for="field-5" class="control-label">Shop No</label>
                                                <input value="{{ old('shop_name') }}"  class=" form-control" id="shop_name" name="shop_name" type="text" required>
                                                        
                                                            @if ($errors->has('shop_name'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong class="red">{{ $errors->first('shop_name') }}</strong>
                                                            </span>
                                                            @endif
                                            </div> 
                                        </div> 
                                        <div class="col-md-4"> 
                                            <div class="form-group"> 
                                                <label for="field-6" class="control-label">Account Name</label>
                                                <input value="{{ old('account_name') }}"  class=" form-control" id="account_name" name="account_name" required type="text">
                                                    
                                                        @if ($errors->has('account_name'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="red">{{ $errors->first('account_name') }}</strong>
                                                        </span>
                                                        @endif
                                            </div> 
                                        </div> 
                                    </div> 
                                    <div class="row"> 
                                        <div class="col-md-4"> 
                                            <div class="form-group"> 
                                                <label for="field-4" class="control-label">Account Number</label>
                                                <input value="{{ old('account_number') }}"  class=" form-control" id="account_number" name="account_number" required type="text">
                                                    
                                                        @if ($errors->has('account_number'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="red">{{ $errors->first('account_number') }}</strong>
                                                        </span>
                                                        @endif
                                            </div> 
                                        </div> 
                                        <div class="col-md-4"> 
                                            <div class="form-group"> 
                                                <label for="field-5" class="control-label">Bank Name</label>
                                                <input value="{{ old('bank_name') }}" class=" form-control" id="bank_name" name="bank_name" required type="text">
                                                    
                                                        @if ($errors->has('bank_name'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="red">{{ $errors->first('bank_name') }}</strong>
                                                        </span>
                                                    @endif
                                            </div> 
                                        </div> 
                                        <div class="col-md-4"> 
                                            <div class="form-group"> 
                                                <label for="field-6" class="control-label">Branch Name</label> 
                                                <input value="{{ old('brance_name') }}" class=" form-control" id="brance_name" name="brance_name" required type="text">
                                                    
                                                        @if ($errors->has('brance_name'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="red">{{ $errors->first('brance_name') }}</strong>
                                                        </span>
                                                    @endif
                                            </div> 
                                        </div> 
                                    </div> 
                                    <div class="row"> 
                                        <div class="col-md-3"> 
                                            <div class="form-group no-margin"> 
                                                <label for="field-7" class="control-label">City</label> 
                                                <input value="{{ old('city') }}"  class=" form-control" id="city" name="city" required type="text">
                                                    
                                                        @if ($errors->has('city'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="red">{{ $errors->first('city') }}</strong>
                                                        </span>
                                                        @endif
                                            </div> 
                                        </div> 
                                        <div class="col-md-3" > 
                                            <div class="form-group no-margin"> 
                                                <label for="field-7" class="control-label">Customer Ref.</label> 
                                                <select  class=" form-control" id="customer_ref" name="customer_ref">
                                                        <option value="1">Select One</option>
                                                    </select>

                                                    @if ($errors->has('customer_ref'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong class="red">{{ $errors->first('customer_ref') }}</strong>
                                                    </span>
                                                    @endif
                                            </div> 
                                        </div>
                                        <div class="col-md-1" > </div> 
                                        <div class="col-md-5" > 
                                            <div class="form-group no-margin"> 
                                                <label for="field-7" class="control-label">Photo</label> 
                                                <img id="image" src="#" />
                                                <input  type="file"  name="photo" accept="image/*"  required onchange="readURL(this);">
                                            </div> 
                                        </div> 
                                    </div> 
                                    
                                </div> 
                                <div class="modal-footer"> 
                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
                                    <input type="submit" class="btn btn-info" value="Save changes" /> 
                                </div>
                            </form> 
                            </div> 
                        </div>
                    </div><!-- /.modal -->
                <!---Modal Add Customer---->
    
@endsection

@push('js')
<script src="{{ asset('admin/links/assets/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/links/assets/datatables/dataTables.bootstrap.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').dataTable();
    } );
</script>

            <script>
                $(document).ready(function () {
                    $(".plus").click(function (e) {
                    var product_id = $(this).attr('id').substr(3);
                    //alert(product_id);
                        $.ajax({
                        url: "{{ route('add.to.cart.ajax') }}",
                        type: 'POST',
                        data: {
                            "_token": $("meta[name='csrf-token']").attr("content"),
                            //"qty": $("#qty").val(),
                            "product_id": product_id
                        },
                        beforeSend: function () {

                        },
                        success: function (msg) {
                            //alert(msg);
                                //$('#foreach').html(msg .for);
                            }
                        });
                        e.preventDefault();
                    });
                });  
            </script>

                                    <!---calculation price--->
                                <script>
                                    $(document).ready(function(){
                                        $('.clickToGet').blur(function(){
                                            var id = $(this).attr('id').substr(4);
                                            var qty = $(this).val();
                                            var price = parseFloat($("#price-" + id).text());
                                            var sub_total = qty * price ;
                                            $('#set-' + id).text(sub_total);

                                            
                                                $("#qty-submit-" + id).show(200); 
                                            
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