<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Bulletin</title>
    <link rel="stylesheet" href="/lib/bootstrap/dist/css/bootstrap.min.css">
    @yield('styles')
    <link rel="stylesheet" href="/lib/toastr/toastr.min.css">
    <link rel="stylesheet" href="/assets/css/app.min.css">
</head>
<body style="background : {{\App\Config::where('name', '=', 'background_color')->first()->value}}">

@yield('content')


<script src="/lib/jquery/dist/jquery.min.js"></script>
<script src="/lib/bootstrap/dist/js/bootstrap.min.js"></script>
@yield('scripts')
<script src="/assets/js/app.js"></script>
@yield('post_scripts')
</body>
</html>