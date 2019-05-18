@extends('layouts.app')

@push('css')
    <style>
        .some{color:red;}
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
                            <form action="" class="form-group">
                                <div class="form-group">
                                    <div class="row">
                                        <label for="" class="col-sm-3">Division</label>
                                        <select name="division" id="division" class="getIdByClass col-sm-8 form-control">
                                            <option value="0">Select a Division</option>
                                            @foreach ($divisions as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="row">
                                        <label for="" class="col-sm-3">District</label>
                                        <select name="district" id="district" class="districtIdClass col-sm-8 form-control">
                                            <option value="">Select a Division First</option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <label for="" class="col-sm-3">Upozila</label>
                                        <select name="upozila" id="upazila" class="col-sm-8 form-control">
                                            <option value="">Select a District First</option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <label for="" class="col-sm-3">Union</label>
                                        <select name="union" id="union" class="col-sm-8 form-control">
                                            <option value="">Select a Union</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
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
            <script>  // getting Upazila name against of the District id  
                $(document).ready(function(){
                    $('.districtIdClass').change(function(){
                        var dic_id =  $('.districtIdClass').val();
                        
                        $.ajax({
                        url: "{{ route('bangladesh.division') }}",
                        type: 'GET',
                        data: {
                            "_token": $("meta[name='csrf-token']").attr("content"),
                            "district_id": dic_id
                        },
                        beforeSend: function () {

                        },
                        success: function (mess) {
                            $('#upazila').html(mess .upo);
                            }
                        });
                        e.preventDefault(); 
                    });
                });
            </script>

            <script>   // getting district name against of the Divisional id  
                $(document).ready(function(){
                    $('.getIdByClass').change(function(){
                        var div_id =  $('.getIdByClass').val();

                        $.ajax({
                        url: "{{ route('bangladesh.division') }}",
                        type: 'GET',
                        data: {
                            "_token": $("meta[name='csrf-token']").attr("content"),
                            "division_id": div_id
                        },
                        beforeSend: function () {

                        },
                        success: function (msg) {
                                if(msg.dis){
                                    $('#district').html(msg .dis);
                                }

                            }
                        });
                        e.preventDefault();
                    });
                });
            </script>
@endpush