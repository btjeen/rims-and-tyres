<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.header-includes')
    <title>Rims And Tyres - Rims</title>
</head>
<body>
@include('partials.navigation')

<div class="page-content container">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif
    <p>PAGE SPECIFIC CONTENT HERE</p>
</div>

@include('partials.footer')

@include('partials.scripts')
</body>
</html>
