@extends('layouts.webshop')

@section('title')
    Frontpage
@endsection

@section('content')
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
            <h2>Great prices on rims and tyres!</h2>
            <p>On our website, you can get deals like no other.</p>
            <p>Feel free to roam our selection, or see one of the great options below!</p>
        </div>
    </div>

    <!-- Recommended rims start -->
    <div class="row">
        <div class="col-12 pt-4">
            <h3>Recommended rims</h3>
        </div>
    </div>
    <div class="row pb-4">
        @foreach($recommendedRims as $item)
            @include('partials.catalogItem')
        @endforeach
    </div>
    <!-- Recommended rims end -->

    <!-- Recommended tyres start -->
    <div class="row">
        <div class="col-12 pt-4">
            <h3>Recommended tyres</h3>
        </div>
    </div>
    <div class="row pb-4">
        @foreach($recommendedRims as $item)
            @include('partials.catalogItem')
        @endforeach
    </div>
    <!-- Recommended tyres end -->

@endsection
