<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- sweet alerts -->
    <link href="{{ asset('admin/links/assets/sweet-alert/sweet-alert.min.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('admin/links/images/favicon_1.ico') }}">

    <!-- Base Css Files -->
    <link href="{{ asset('admin/links/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Font Icons -->
    <link href="{{ asset('admin/links/assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/links/assets/ionicon/css/ionicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/links/css/material-design-iconic-font.min.css') }}" rel="stylesheet">

    <!-- animate css -->
    <link href="{{ asset('admin/links/css/animate.css') }}" rel="stylesheet" />

    <!-- Waves-effect -->
    <link href="{{ asset('admin/links/css/waves-effect.css') }}" rel="stylesheet">

    <!-- Custom Files -->
    <link href="{{ asset('admin/links/css/helper.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/links/css/style.css') }}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
            <![endif]-->
    <script src="{{ asset('admin/links/js/modernizr.min.js') }}"></script>


    <!---Toastr Css--->
    <!-- -----For Production mode-----
          <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css"
            rel="stylesheet" /> -->
    <link href="{{ asset('admin/links/toastr-css-js/toastr.css') }}" rel="stylesheet" />
    <!---Toastr Css End--->

    <!----- Sweet alert-------->
    <!---For Producetion Mode--->
    <!--<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <script src="{{ asset('admin/links/sweet-alert-js/sweetalert.min.js') }}"></script>
    <!----- Sweet alert end-------->

</head>

<body>
    <div style="margin-top:200px; width:100%;"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <!-- <div class="panel-heading">
                                                            <h4>Invoice</h4>
                                                        </div> -->
                    <div class="panel-body">
                        <div class="clearfix">
                            <div class="pull-left">
                                <h4 class="text-right"><img src="images/logo_dark.png" alt="velonic"></h4>

                            </div>
                            <div class="pull-right">
                                <h4>Invoice # <br>
                                    <strong>{{ date('d-m-Y') }}{{ rand(0-999,4) }}</strong>
                                </h4>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-left m-t-30">
                                    @php
                                    $vat = $total * 5 / 100 ;
                                    $total_amount = $total + $vat ;
                                    @endphp

                                    <address>
                                        <strong>{{ $customer->name }}.</strong><br>
                                        {{ $customer->address }} <br>
                                        {{ $customer->city }} <br>
                                        <abbr>Phone:</abbr> {{ $customer->phone }}
                                    </address>
                                </div>
                                <div class="pull-right m-t-30">
                                    <p><strong>Order Date: </strong> {{ date(' F d, Y') }} </p>
                                    <p class="m-t-10"><strong>Order Status: </strong> <span
                                            class="label label-pink">Pending</span></p>
                                    <p class="m-t-10"><strong>Order ID: </strong> #{{ $customer->id }}</p>
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
                                                <th>Item</th>
                                                <th>Description</th>
                                                <th>Quantity</th>
                                                <th>Unit Cost</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cart as $key => $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item['product_name'] }}</td>
                                                <td>Lorem ipsum dolor sit amet.</td>
                                                <td>{{ $item['quantity'] }}</td>
                                                <td>{{ $item['unit_price'] }}</td>
                                                <td><strong class="total"
                                                        id="total-{{ $item['product_id'] }}">{{ $item['total_price'] }}</strong>
                                                </td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="border-radius: 0px;">
                            <div class="col-md-3 col-md-offset-9">
                                <p class="text-right"><b>Sub-total:</b> {{ $total }}.00</p>
                                <p class="text-right">Discout: 00.00</p>
                                <p class="text-right">VAT: {{ $vat }}</p>
                                <hr>
                                <h3 class="text-right"><strong id="total_price">BDT {{ $total_amount }}.00</strong></h3>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>

            </div>

        </div>
    </div>
</body>
<html>
