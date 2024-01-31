<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('titulo')</title>

    <link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('font-awesome/css/font-awesome.css') !!}" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{!! asset('css/plugins/toastr/toastr.min.css') !!}" rel="stylesheet">

    <!-- Gritter -->
    <link href="{!! asset('js/plugins/gritter/jquery.gritter.css') !!}" rel="stylesheet">

    <link href="{!! asset('css/animate.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/style.css') !!}" rel="stylesheet">

    @section('styles')
    @show

</head>

<body class="gray-bg">
@yield('content')

    <!-- Mainly scripts -->
    <script src="{!! asset('js/jquery-3.1.1.min.js') !!}"></script>
    <script src="{!! asset('js/popper.min.js') !!}"></script>
    <script src="{!! asset('js/bootstrap.js') !!}"></script>
    <script src="{!! asset('js/plugins/metisMenu/jquery.metisMenu.js') !!}"></script>
    <script src="{!! asset('js/plugins/slimscroll/jquery.slimscroll.min.js') !!}"></script>

    <!-- Peity -->
    <script src="{!! asset('js/plugins/peity/jquery.peity.min.js') !!}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{!! asset('js/inspinia.js') !!}"></script>
    <script src="{!! asset('js/plugins/pace/pace.min.js') !!}"></script>
    <script src="{!! asset('js/plugins/toastr/toastr.min.js') !!}"></script>

@section('scripts')
@show

</body>

</html>