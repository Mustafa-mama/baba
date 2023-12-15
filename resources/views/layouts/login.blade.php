<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Not Found')</title>
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/back.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;1,100;1,300&display=swap"
  rel="stylesheet">
</head>
<body>
   
    @yield('content')












    <script src="{{asset('assets/admin/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/all.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/back.js')}}"></script>
    
</body>
 
</html>