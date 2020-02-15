<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
    <title>{{ ucfirst($front_settings->company_name)}}</title>
    <link rel="icon" href="{{ asset('favicon/favicon.ico') }}" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Label Multipurpose Startup Business Template">
    <meta name="keywords" content="Label HTML Template, Label Startup Business Template, Startup Template">
    <link href="{{ asset('label-assets/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600%7COpen+Sans:400%7CVarela+Round" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('label-assets/assets/css/animate.css') }}"> 
    <link rel="stylesheet" href="{{ asset('label-assets/assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('label-assets/assets/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('label-assets/assets/css/jquery.accordion.css') }}">
    <link rel="stylesheet" href="{{ asset('label-assets/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('label-assets/assets/css/ionicons.min.css') }}"> 
    <link href="{{ asset('label-assets/assets/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />

</head>
<body data-spy="scroll">

    @yield('content')

    <!-- Jquery and Js Plugins -->
    <script src="{{ asset('label-assets/assets/js/jquery-2.1.1.js') }}"></script>
    <script src="{{ asset('label-assets/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('label-assets/assets/js/jquery.accordion.js') }}"></script>
    <script src="{{ asset('label-assets/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('label-assets/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('label-assets/assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('label-assets/assets/js/validator.js') }}"></script>
    <script src="{{ asset('label-assets/assets/js/contact.js') }}"></script>
    <script src="{{ asset('label-assets/assets/js/custom.js') }}"></script>
</body>
</html>