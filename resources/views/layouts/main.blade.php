<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="http://127.0.0.1:5173/resources/css/style.css"">
    <script src="http://127.0.0.1:5173/resources/js/jquery-3.3.1.min.js"></script>
    <title>Document</title>
</head>
<body class="background-gradient">
    <div>
        <div class="container background-gradient">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
