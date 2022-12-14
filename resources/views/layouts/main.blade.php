<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>บ้านสมุนไพร</title>
    @vite('resources/css/app.css','resources/scss/app.scss', 'resources/js/app.js')
</head>
<body class="min-h-screen backgroundHome">

    @if(Session::get('authenticated_user') && Session::get('role_user') == 'Manager')
        @include('layouts.adminnav')
    @else
        @include('layouts.nav')
    @endif
    <div class="mx-auto max-w-6xl">
        @yield('content')
    </div>
</body>
</html>
