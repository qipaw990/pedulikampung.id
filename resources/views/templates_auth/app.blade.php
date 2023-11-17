<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('templates_backend/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('templates_backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('templates_backend/dist/css/adminlte.min.css')}}">
</head>

<body class="hold-transition login-page">

    @yield('content')


    <script src="{{asset('templates_backend/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('templates_backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('templates_backend/dist/js/adminlte.min.js')}}"></script>
</body>

</html>