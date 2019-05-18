@extends('layouts.app')

@push('css')
        
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
                    <h4 class="pull-left page-title"></h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Moltran</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>

            <!---------->

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <!-- <div class="panel-heading">
                                                <h4>Invoice</h4>
                                            </div> -->
                        <div class="panel-body">
                            <div class="clearfix">
                                <div class="pull-left">
                                    <h4 class="text-right"><img src="images/logo_dark.png" alt=""></h4>

                                </div>
                                <div class="pull-right">
                                    <h4>Order Date <br>
                                        <strong>{{ $order->order_date }}</strong>
                                    </h4>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left m-t-30">
                                            @php
                                            
                                            @endphp

                                        <address>
                                            <strong>{{ $order->customer->name }}.</strong><br>
                                            {{ $order->customer->address }} <br>
                                            {{ $order->customer->city }} <br>
                                            <abbr>Phone:</abbr> {{ $order->customer->phone }}
                                        </address>
                                    </div>
                                    <div class="pull-right m-t-30">
                                        <p><strong> Today: </strong> {{ date(' F d, Y') }} </p>
                                        <p class="m-t-10">
                                            <strong>Order Status: </strong> 
                                            @if ($order->order_status == "pending")
                                            <span class="label label-pink">Pending</span>
                                                @else
                                                <span class="label label-primary">Approved</span>
                                            @endif  
                                            </p>
                                        <p class="m-t-10"><strong>Order ID: #{{ $order->id }}</strong> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="m-h-50"></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table m-t-30">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Product Name</th>
                                                    <th>Product Code</th>
                                                    <th>Quantity</th>
                                                    <th>Unit Cost</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($order_detials as  $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ product_details($item->product_id)->product_name }}</td>
                                                    <td>{{ product_details($item->product_id)->product_code }}</td>
                                                    <td>{{ $item->quantity }}</td>
                                                    <td>{{ $item->unitprice }}</td>
                                                    <td ><strong class="total">{{ $item->quantity * $item->unitprice }}</strong></td>

                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="border-radius: 0px;">
                                <div class="col-md-4">
                                        <hr/>
                                    <p class="text-left" style="margin-left:10%"><strong>Payment By : </strong>
                                            @if ($order->payment_status == 1)
                                            <strong>Handcash</strong>
                                            @elseif($order->payment_status == 2)
                                                <strong>Due</strong>
                                            @else
                                                <strong>Cheque</strong>
                                        @endif
                                       </p>
                                       
                                    <p class="text-left" style="margin-left:25%"><strong>Pay : 
                                        @if ($order->pay != "")
                                            {{ $order->pay }} Tk.
                                            @else 

                                        @endif
                                    </strong></p>
                                    <p class="text-left" style="margin-left:25%"><strong>Due :
                                            @if ($order->due  != "")
                                            {{ $order->due }} Tk.
                                                @else 
                                                
                                            @endif
                                    </strong></p>
                                   
                                </div>
                                <div class="col-md-6"></div>
                                <div class="col-md-2">
                                    <p class="text-left" style="margin-left:-10%"><b>Sub-total : {{ $total }} .00</b> </p>
                                    <p class="text-left" style="margin-left:10%">Discout: 00.00</p>
                                    <p class="text-left" style="margin-left:20%">VAT : {{ $total *5 /100 }} .00 </p>
                                    <hr>
                                    <h3 class="text-left"><strong id="total_price">BDT {{ $total + $total *5 /100 }}</strong></h3>
                                </div>
                            </div>
                            <hr>
                            <div class="hidden-print">
                                <div class="pull-right" style="margin-right:5%;">
                                    {{-- -
                                    <a href="" class="btnPrint btn btn-inverse waves-effect waves-light"><i
                                            class="fa fa-print"></i></a>
                                    <a href="" class="btn btn-inverse waves-effect waves-light"><i
                                            class="fa fa-file"></i></a>
                                        --}}

                                        @if ($order->order_status == "pending")
                                        <a  data-toggle="modal" data-target="#con-close-modal"
                                        class="btn btn-primary waves-effect waves-light">Submit</a>
                                            @else
                                            <span class="label label-primary">Approved</span>
                                        @endif
                                </div>
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
<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title text-green" >Invoice Of - <span style="color:orange;"></span>
                     <span  class="pull-right" style="margin-right:2%;">BDT <strong style="color:brown;" id="total_cash">k</strong><span style="color:brown;">.00</span> </span> </h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('invoice.store') }}" class="cmxform form-horizontal tasi-form">
                    @csrf
                    <div class="row">
                            @if (session('msg'))
                            <div>
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    {{ session('msg') }}
                                </div>
                            </div>
                            @endif
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-3" class="control-label">Payment</label>
                                <select name="payment" id="payment" class=" form-control" required>
                                    <option value="1">Handcash</option>
                                    <option value="2">Due</option>
                                    <option value="3">Cheque</option>
                                </select>

                                @if ($errors->has('payment'))
                                <span class="invalid-feedback" role="alert">
                                    <strong class="red">{{ $errors->first('payment') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div><div class="col-md-1"></div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="field-5" class="control-label">Pay</label>
                                <input value="{{ old('pay') }}" class=" form-control" id="pay"
                                    name="pay" type="text" >
                                
                                    <strong id="pay_error_text"></strong>
                                
                                @if ($errors->has('pay'))
                                <span class="invalid-feedback" role="alert">
                                    <strong class="red">{{ $errors->first('pay') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div> <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="field-6" class="control-label">Due</label>
                                <input value="{{ old('due') }}" class=" form-control" id="due"
                                    name="due"  type="text">

                                @if ($errors->has('due'))
                                <span class="invalid-feedback" role="alert">
                                    <strong class="red">{{ $errors->first('due') }}</strong>
                                </span>
                                @endif
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<!-- print option -->
<script type="text/javascript" src="{{ asset('admin/links/js-print/js/jquery.printPage.js')}}"></script>
 <!--Print-option-->
 <script type="text/javascript">
    $(document).ready(function(){
        $('.btnPrint').printPage();
    });
</script>



<!---calculation price--->
<script>
    $(document).ready(function () {

        $('#payment').on('change',function(){
            var payment =  $('#payment').val();
            if(payment == 2){
                var  total_cash = $('#total_cash').text();
                $('#pay').val("00.00");
                $('#due').val(total_cash);
                $('#due').css({
                    'color':'red'
                });
            }else{
                $('#due').val("");
                $('#pay').val("");
            }
        });
      //var payment =  $('#payment :selected').val();
        
        $('#pay').blur(function(){
          var  total_cash = $('#total_cash').text();
          var  pay = $('#pay').val();
          var due = total_cash - pay ;
          $('#due').val(due);
            if(pay > total_cash){
                $('#pay').css({
                    'background-color':'red'
                });
                $('#pay_error_text').text('Please enter correct value');
            }
         
        });



        /*
        var id[] = $('.total').attr('id').substr(6);
        //var qty = $(this).val();
        var price = parseFloat($("#total-" + id[]).text());
        var total_price += price;
        $('#total_price').text(total_price);
        */
        //$("#qty-submit-" + id).show(200);  total_cash
       
    });

</script>


@endpush
