<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
     
     <!-- sweet alerts -->
     <link href="assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">
    
       <link rel="shortcut icon" href="{{ asset('admin/links/images/favicon_1.ico') }}">
    
        <title>{{ config('app.name', 'Laravel') }}</title>
    
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
        
    </head>
    <body>


        <div class="wrapper-page">
            <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-heading bg-img"> 
                    <div class="bg-overlay"></div>
                    <h3 class="text-center m-t-10 text-white"> Sign In to <strong>Moltran</strong> </h3>
                </div> 


                <div class="panel-body">
                <form class="form-horizontal m-t-20" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control input-lg @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Password">
                            
                            
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control input-lg @error('password') is-invalid @enderror" type="password" name="password"  autocomplete="current-password" required="required" placeholder="Password">
                        
                            
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="col-xs-12">
                            <div class="checkbox checkbox-primary">
                                <input  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="checkbox-signup">
                                    Remember me
                                </label>
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>

                    <div class="form-group m-t-30">
                        <div class="col-sm-7">
                                @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                                @endif
                        </div>
                        <div class="col-sm-5 text-right">
                            <!--<a href="register.html">Create an account</a>-->
                        </div>
                    </div>
                </form> 
                </div>                                 
                
            </div>
        </div>

    
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
    

	</body>
</html>