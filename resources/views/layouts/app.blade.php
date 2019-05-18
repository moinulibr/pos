<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
	<link href="{{ asset('admin/links/toastr-css-js/toastr.css') }}" rel="stylesheet"/>
	<!---Toastr Css End--->
	
        <!----- Sweet alert-------->
		<!---For Producetion Mode--->
	<!--<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
	<script src="{{ asset('admin/links/sweet-alert-js/sweetalert.min.js') }}" ></script>
    <!----- Sweet alert end-------->
    
    @stack('css')

</head>
<body class="fixed-left">
   
    <div id="wrapper">
        
        <!-- Top Bar Start -->
       @include('layouts.partials.top')
        <!-- Top Bar End -->


        <!-- ========== Left Sidebar Start ========== -->
        @include('layouts.partials.left')
        <!-- Left Sidebar End --> 


        <!--==========-->
        <main class="py-4">
                @yield('content')
        </main>
         <!--==========-->
         
    </div>
        <!--wrapper end--->



<script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="{{ asset('admin/links/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/links/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/links/js/waves.js') }}"></script>
    <script src="{{ asset('admin/links/js/wow.min.js') }}"></script>
    <script src="{{ asset('admin/links/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/links/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('admin/links/assets/jquery-detectmobile/detect.js') }}"></script>
    <script src="{{ asset('admin/links/assets/fastclick/fastclick.js') }}"></script>
    <script src="{{ asset('admin/links/assets/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('admin/links/assets/jquery-blockui/jquery.blockUI.js') }}"></script>
 <!-- CUSTOM JS -->
 <script src="{{ asset('admin/links/js/jquery.app.js') }}"></script>
    
    		<!---Toastr js--->
		<!--  For Production mode-----
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js" > </script> -->
	<script src="{{ asset('admin/links/toastr-css-js/toastr.js') }}"></script>
	<!---Toastr js End--->

    
 @stack('js')

 <script>
    @if(Session::has('messege'))
    var type = "{{Session::get('alert-type','info')}}"
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('messege') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('messege') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('messege') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('messege') }}");
            break;
        }
    @endif
</script>

    
    <!-- this for test-->
    <script>
       $(document).on("click","#delete", function(e){
		e.preventDefault();
		var link = $(this).attr("href");
		swal({
		  title: "Are you sure want to Delete this?",
		  text: "Once deleted, This will be Permanently Delete!",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
			window.location.href = link;
		  } else {
			swal("Your Data  is safe!");
		  }
		});
		});	
    </script>
    
    
</body>
</html>
