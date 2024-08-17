<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/master.css') }}">
</head>

<body>
    <main class="@yield('classMain')">
        @yield('content')
    </main>
    @yield('js')
</body>

</html>
