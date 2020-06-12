<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
        <title>Rims And Tyres - @yield('title')</title>
    </head>

    <body>
        <!-- Fixed navbar -->
        <nav id="navbar">
            <div class="container">
                <div class="row pt-3 pb-3 d-flex align-items-center justify-content-between">
                    <div id="navbar-identity" class="d-flex align-items-center">
                        <div id="navbar-identity-title" class="pr-2">
                            Rims and Tyres
                        </div>
                        <img id="navbar-identity-logo" class="pr-1 pl-1 rotate d-none d-sm-block" src="{{ url('/assets/images/rat_logo.svg') }}" alt="logo">
                    </div>
                    <!-- /#navbar-identity -->

                    <!-- Authentication -->
                    <div id="navbar-authentication" class="d-flex align-items-center">
                        @auth
                            <span>Hello {{ Auth::user()->name }}!</span>
                                    <a class="btn" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <button type="button" class="btn">{{ __('Logout') }}</button>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                        @endauth
                    </div>

                    <div id="navbar-menu" class="d-flex justify-content-end align-items-center">
                        <a href="{{ route('items.index') }}">
                            <span class="navbar-to-website">Return to website</span>
                            <img id="navbar-home-logo" class="pr-1 pl-1 d-none d-sm-inline-block" src="{{ url('/assets/images/home.svg') }}">
                        </a>
                    </div>
                    <!-- /#navbar-menu -->
                </div>
            </div>
        </nav>


        <!-- Page primary content -->
        <div class="page-content container">
            @yield('content')
        </div>

        <footer id="footer">
            <div class="container">
                <div class="row pt-4 pb-2">
                    <div class="col-12 col-md-4">
                        <p>Rims And Tyres Concept</p>
                    </div>
                    <div class="col-12 col-md-4">
                        <p>Project by Martin Bjørn Tjeen</p>
                    </div>
                    <div class="col-12 col-md-4">
                        <p>Copyright 2020</p>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Bootstrap 4 scripts -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <script src="{{ url('/assets/js/admin.js') }}"></script>
    </body>
</html>
