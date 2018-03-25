<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wedding</title>


    <!-- Library CSS -->
    <link href="{{asset('themes/css/wedding_library.css')}}" rel="stylesheet">

    <!-- Icons CSS -->
    <link href="{{asset('themes/fonts/themify-icons.css')}}" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="{{asset('themes/css/wedding_style.css')}}" rel="stylesheet">
    <link href="{{asset('themes/css/responsive.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('themes/css/leaves.css')}}" type="text/css" media="screen">

    <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Lato:300,400,900" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">

</head>
<body class="wed_firefly_only">

  @yield('content')

<!-- JQuery -->
<script src="{{ asset('themes/js/jquery-1.12.4.min.js')}}"></script> 

<!-- Library JS -->
<script src="{{ asset('themes/js/wedding_library.js')}}"></script>
<script src="{{ asset('themes/js/library/jquery.plugin.min.js')}}"></script>
<script src="{{ asset('themes/js/jquery.countdown.min.js')}}"></script>




<!-- Theme JS -->
<script src="{{ asset('themes/js/wedding_script.js')}}"></script>


</body>
</html>