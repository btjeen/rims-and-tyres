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
                <div class="row pt-3 pb-3">
                    <div id="navbar-identity" class="col-8 d-flex align-items-center">
                        <a href="{{ route('items.index') }}">
                            <div id="navbar-identity-title" class="pr-2">
                                Rims and Tyres
                            </div>
                            <img id="navbar-identity-logo" class="pr-2 pl-2 rotate d-none d-sm-block" src="{{ url('/assets/images/rat_logo.svg') }}">
                        </a>
                    </div>
                    <!-- /#navbar-identity -->



                    <div id="navbar-menu" class="col-4">
                        <div class="buttons-wrap d-flex justify-content-end align-items-center">
                            <div id="navbar-basket" class="d-inline-block position-relative">
                                <span class="basket-count">{{ Session::has('cart') ? Session::get('cart')->itemsQuantity : 0 }}</span>
                                <a href="{{ route('orders.index') }}">
                                    <img id="navbar-basket-image" src="{{ url('/assets/images/basket.svg') }}">
                                </a>
                            </div>
                            <!-- /#navbar-basket -->
                            <div id="navbar-menu-button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-toggle" aria-expanded="false" aria-controls="navbar">
                                <span class="pointer-no-highlight">☰</span>
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </div>
                            <!-- /#navbar-menu-button -->
                        </div>
                        <div id="navbar-toggle" class="col-12 collapse">
                            <ul class="nav navbar-nav">
                                <li><a href="{{ route('items.index') }}">Home</a></li>
                                <li><a href="{{ route('items.list', 'rims') }}">Rims</a></li>
                                <li><a href="{{ route('items.list', 'tyres') }}">Tyres</a></li>
                            </ul>
                        </div><!--/.navbar-toggle -->
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

    </body>
</html>
