<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Web</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav>
        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
        <a href="{{ route('photos') }}" class="{{ request()->routeIs('photos') ? 'active' : '' }}">Photos</a>
        <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
    </nav>
    
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <p>Cesar Fernando Velazquez Serna</p>
    </footer>
</body>
</html>