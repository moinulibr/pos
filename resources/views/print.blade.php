<html>
<head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

        <!-- print option -->
        <script type="text/javascript" src="{{ asset('admin/links/js-print/js/jquery.printPage.js')}}"></script>
</head> 
<body>
        <a href="{{ route('invoice.print') }}" class="btnPrint"> Print</a>
       

        <h2>this is popup</h2>
        <p>Lorem ifsum</p>

         <!--Print-option-->
         <script type="text/javascript"> 
            $(document).ready(function(){
                $('.btnPrint').printPage();
            });
        </script>
</body>   
<html