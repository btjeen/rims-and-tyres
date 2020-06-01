<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Favicon -->
        <link rel="icon" href="{{ url('favicon.ico') }}">

        <!-- Meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/less" href="{{ url('/assets/styles/style.less') }}">

        <!-- Scripts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.9.0/less.min.js"></script>
        <title>Rims And Tyres - @yield('title')</title>
    </head>

    <body>

        <!-- Fixed navbar -->
        <nav id="navbar">
            <div class="container">
                <div class="row pt-3 pb-3">
                    <div id="navbar-identity" class="col-8 d-flex align-items-center">
                        <div id="navbar-identity-title" class="pr-2">
                            Rims and Tyres
                        </div>
                        <img id="navbar-identity-logo" class="pr-1 pl-1 rotate d-none d-sm-block" src="{{ url('/assets/images/rat_logo.svg') }}">
                    </div>
                    <!-- /#navbar-identity -->

                    <div id="navbar-basket" class="col-2">
                        <!-- TODO: Implement basket here -->
                    </div>
                    <!-- /#navbar-basket -->

                    <div id="navbar-menu" class="col-2 align-items-center">
                        <div id="navbar-menu-button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-toggle" aria-expanded="false" aria-controls="navbar">
                            <span class="pointer-no-highlight">☰</span>
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </div>
                        <div id="navbar-toggle" class="col-12 collapse">
                            <ul class="nav navbar-nav">
                                <li><a href="/">Home</a></li>
                                <li><a href="/items/rims">Rims</a></li>
                                <li><a href="/items/tyres">Tyres</a></li>
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
