<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <div class="logo">
                <a href="{{ route('home') }}">SIGADO</a>
            </div>
            <ul class="nav-links">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('shop') }}">Shop</a></li>
                <li><a href="{{ route('why-us') }}">Why Us</a></li>
                <li><a href="{{ route('testimonials') }}">Testimonial</a></li>
                <li><a href="{{ route('contact-us') }}">Contact Us</a></li>
            </ul>
            <div class="auth-buttons">
                <a href="{{ route('login') }}" class="login-btn">Login</a>
                <a href="{{ route('register') }}" class="register-btn">Register</a>
            </div>
        </div>
    </nav>

    <div class="content">
        @yield('content')
    </div>

    <footer>
        <div class="container">
            <p>&copy; 2024 SIGADO. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
