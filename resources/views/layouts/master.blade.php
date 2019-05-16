<!doctype html>
<html lang='en'>
<head>
    <title>@yield('title')</title>
    <meta charset='utf-8'>

    <link href='/css/trips.css' rel='stylesheet'>

    @yield('head')
</head>
<body>

@if(session('alert'))
    <div class='alert'>{{ session('alert') }}</div>
@endif

<header>
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text|Open+Sans+Condensed:300" rel="stylesheet">
    <h1>Travel Journal</h1>
</header>

<section>
    @yield('content')
</section>

<footer>

</footer>

</body>
</html>