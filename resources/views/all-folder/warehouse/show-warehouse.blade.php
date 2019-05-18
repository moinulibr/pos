@extends('layouts.app')

@push('css')
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
                                    <h4 class="pull-left page-title">All Warehouse</h4>
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
                                            <h3 class="panel-title">Datatable</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <table id="datatable" class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Warehouse Name</th>
                                                                <th>Description</th>
                                                                <th>Product</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="font-size:12px;color:black;">
                                                            @foreach ($warehouse as $item)
                                                                <tr>
                                                                    <td>{{ $item->name }}</td>
                                                                    <td>{{ $item->description }}</td>                                            
                                                                    <td>
                                                                       <a href="{{ route('total_product_by_warehouse',$item->id) }}"> Product 
                                                                        <span class="badge bg-blue" style="padding-left:4%px; padding-right:4%px;"> {{ count_product_by_warehouse($item->id) }} </span> View  </a>
                                                                    </td>
                                                                    <td>
                                                                        {{ $item->status == 1?'Jobin':'Jobout' }}
                                                                    </td>
                                                                    <td>
                                                                        <a href="{{ route('warehouse.edit',$item->id) }}" class="btn btn-xs btn-primary"> <i class="fa fa-edit"></i></a>
                                                                        {{-- <a href="{{ route('category.delete',$item->id) }}" class="btn btn-xs btn-danger" id="delete"> <i class="fa fa-trash"></i></a>
                                                                        <a href="" class="btn btn-xs btn-info"> <i class="fa fa-eye"></i></a>
                                                                         --}}
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