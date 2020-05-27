<!-- Fixed navbar -->
<nav id="navbar">
    <div class="container">
        <div class="row">
            <div id="navbar-identity" class="col-8 d-flex align-items-center">
                <div id="navbar-identity-title" class="pr-2">
                    Rims and Tyres
                </div>
                <img id="navbar-identity-logo" class="pr-1 pl-1 rotate" src="{{ url('/assets/images/rat_logo.svg') }}">
            </div>
            <!-- /#navbar-identity -->

            <div id="navbar-basket" class="col-2">
                <!-- TODO: Implement basket here -->
            </div>
            <!-- /#navbar-basket -->

            <div id="navbar-menu" class="col-2">
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
                        <li><a href="/rims">Rims</a></li>
                        <li><a href="/tyres">Tyres</a></li>

                        <!-- TODO: Implement admin only options-->
                        {{--<li>--}}
                        {{--<a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                        {{--Shop--}}
                        {{--</a>--}}
                        {{--<div class="dropdown-menu dropdown-menu-right">--}}
                        {{--<a class="dropdown-item" href="/rims">Rims</a>--}}
                        {{--<a class="dropdown-item" href="/tyres">Tyres</a>--}}
                        {{--</div>--}}
                        {{--</li>--}}

                    </ul>
                </div><!--/.navbar-toggle -->

            </div>
            <!-- /#navbar-menu -->
        </div>
    </div>
</nav>
