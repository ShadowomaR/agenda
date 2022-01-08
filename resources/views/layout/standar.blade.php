<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
            <title>Home</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">  
        <link rel="stylesheet" href="bootstrap-4.0.0-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap-4.0.0-dist/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/myapp.css">
        <script src="bootstrap-4.0.0-dist/ajax/jquery.min.js"></script>
        <script src="bootstrap-4.0.0-dist/ajax/popper.min.js"></script>
        <script src="bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
        <script src="js/myapp.js"></script>
    </head>
    <body class="antialiased bg-secondary">
        @yield("content")
    </body>
</html>