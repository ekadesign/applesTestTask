<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dummy site</title>

    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ url('images/icons/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Jquery UI -->
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">

    <!-- Fonts from Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>

    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    {{--    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">--}}


</head>

<body>

@yield('content')


        <!-- Scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="{{ url('/js/bootstrap.min.js') }}"></script>
<script src="{{ url('/js/jquery-ui.js') }}"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="{{ url('/js/ie10-viewport-bug-workaround.js') }}"></script>


<script>
    var site_url = "{{ url('/') }}";
    var admin_url = "{{ url('/admin/') }}";

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': "{{ csrf_token() }}"
        }
    });

</script>


<script src="{{ url('/js/functions.js') }}"></script>


</body>
</html>