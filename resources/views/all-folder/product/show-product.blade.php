@extends('layouts.app')

@push('css')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

 <!-- print option -->
 <script type="text/javascript" src="{{ asset('admin/links/js-print/js/jquery.printPage.js')}}"></script>

   <!-- DataTables -->
        <link href="{{ asset('admin/links/assets/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
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
                                <div class="col-sm-12">
                                    <h4 class="pull-left page-title">All Product</h4>
                                    <ol class="breadcrumb pull-right">
                                        <li><a href="#">Moltran</a></li>
                                        <li><a href="#">Tables</a></li>
                                        <li class="active">Data Table</li>
                                    </ol>
                                </div>
                            </div>
    
    
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Product Table</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <table id="datatable" class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th style="width:15%;font-size:10px;">Product Name</th>
                                                                <th style="width:15%;font-size:10px;">Category Name</th>
                                                                <th style="width:5%;font-size:10px;">Product Code</th>
                                                                <th style="width:2%;font-size:9px;">Warehouse</th>
                                                                <th style="width:2%;font-size:9px;">Warehouse Section</th>
                                                                <th style="width:5%;font-size:10px;">Buying Price</th>
                                                                <th style="width:5%;font-size:10px;">Selling Price</th>
                                                                <th style="width:5%;font-size:10px;">Picture</th>
                                                                <th style="width:5%;font-size:10px;">Status</th>
                                                                <th style="width:10%;font-size:10px;">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="font-size:12px;color:black;">
                                                            @foreach ($product as $item)
                                                                <tr>
                                                                    <td>{{ $item->product_name }}</td>
                                                                    <td>{{ $item->category->name }}</td>
                                                                    <td>{{ $item->product_code }}</td>
                                                                    <td>{{ $item->wareh->name }}</td>                                             
                                                                    <td>{{ $item->wareh_section->name }}</td>                                             
                                                                    <td>{{ $item->buying_price }}</td>                                             
                                                                    <td>{{ $item->selling_price }}</td>                                             
                                                                    <td>
                                                                        @if(file_exists("admin/other/product/picture/product-{$item->id}-1.{$item->photo}"))
                                                                           <img src="{{ asset("admin/other/product/picture/product-{$item->id}-1.{$item->photo}") }}" alt="" style="width:50px; height:35px;">
                                                                            @else
                                                                            No Picture
                                                                        @endif
                                                                    </td>                                                                                         
                                                                    <td>
                                                                            {{ $item->status == 1?'Verified':'Non-V' }}
                                                                    </td>
                                                                    <td>
                                                                        <a href="{{ route('product.edit',$item->id) }}" class="btn btn-xs btn-primary"> <i class="fa fa-edit"></i></a>
                                                                        <a href="{{ route('product.delete',$item->id) }}" class="btn btn-xs btn-danger" id="delete"> <i class="fa fa-trash"></i></a>
                                                                        <a href="{{ route('product.single.show',$item->id) }}" class="btnprn btn btn-xs btn-info"> <i class="fa fa-eye"></i></a>
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
                                
                            </div> <!-- End Row -->
    
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
<script src="{{ asset('admin/links/assets/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/links/assets/datatables/dataTables.bootstrap.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').dataTable();
    } );
</script>

       
@endpush