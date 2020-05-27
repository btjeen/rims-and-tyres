<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.header-includes')
        <title>Rims And Tyres - Frontpage</title>
    </head>
    <body>
        @include('partials.navigation')

        {{-- TODO: Implement authorization for administration purposes --}}
        {{--@if (Route::has('login'))--}}
            {{--<div class="top-right links">--}}
                {{--@auth--}}
                    {{--<a href="{{ url('/home') }}">Home</a>--}}
                {{--@else--}}
                    {{--<a href="{{ route('login') }}">Login</a>--}}

                    {{--@if (Route::has('register'))--}}
                        {{--<a href="{{ route('register') }}">Register</a>--}}
                    {{--@endif--}}
                {{--@endauth--}}
            {{--</div>--}}
        {{--@endif--}}

        <div class="page-content container">
            <!-- Banner -->
            <div class="row pb-4">
                <div class="col-12">
                    <div style="width: 100%; height: 0; padding-bottom: 40%; background: #dedede; position: relative;">
                        <p style="font-size: 5rem; width: 100%; text-align: center; position: absolute; left: 50%; top: 50%; transform: translate(-50%, -45%);">Placeholder image</p>
                    </div>
                </div>
            </div>

            <!-- Selling point -->
            <div class="row pb-4">
                <div class="col-12 pt-4">
                    <h2 class="header-line-under">Great prices on rims and tyres!</h2>
                    <p>On our website, you can get deals like no other.</p>
                    <p>Feel free to roam our selection, or see one of the great options below!</p>
                </div>
            </div>

            <!-- Recommended rims -->
            <div class="row">
                <div class="col-12 pt-4">
                    <h3 class="header-line-under">Recommended rims</h3>
                </div>
            </div>
            <div class="row pb-4">
                @foreach($recommendedRims as $rim)
                    <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch">
                        <div class="card">
                            <img class="card-img-top" src="{{ $rim['image'] }}" alt="{{ $rim['design'] }}">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $rim['design'] }}</h5>
                                <p class="card-text">Dimensions</p>
                                <a href="#" class="btn btn-primary mt-auto">Add to basket</a>
                                <a href="#" class="btn btn-primary mt-auto">Buy with tyre</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Recommended tyres -->
            <!-- Recommended code -->


        </div>

        @include('partials.footer')

        @include('partials.scripts')
    </body>
</html>
