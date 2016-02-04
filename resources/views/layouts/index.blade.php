<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bienvenido</title>

    <!--STYLES SHEET-->
    <link href="{{asset('/css/style.css')}}" rel="stylesheet">



</head>

<body>
    @if(Auth::user())
        @include('layouts.partials.content')
    @endif

    @yield('auth')

<!-- jQuery -->
<script  src="{{asset('/js/jquery.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script  src="{{asset('/js/bootstrap.min.js')}}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script  src="{{asset('/js/metisMenu.min.js')}}"></script>

<!-- Morris Charts JavaScript -->
{{--<script src="{{asset('/js/raphael-min.js')}}"></script>--}}
{{--<script src="{{asset('/js/morris.min.js')}}"></script>--}}
{{--<script src="{{asset('/js/morris-data.js')}}"></script>--}}

<!-- Custom Theme JavaScript -->
<script src="{{asset('/js/sb-admin-2.js')}}"></script>

    @yield('scripts')

</body>

</html>