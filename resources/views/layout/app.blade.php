<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Project Title</title>
    <!-- Add your CSS styles or link to your stylesheets here -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="icon" href="{{url('dist/img/icon.png')}}" type="image/x-icon">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    <nav>
        <!-- Your navigation links go here -->
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <!-- Add your JavaScript scripts or link to your scripts here -->
</body>
</html>