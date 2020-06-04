@extends('layouts.webshop')

@section('title')
    Rims
@endsection

@section('content')
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
    <div class="row">
        @foreach($items as $item)
            @include('partials.catalogItem')
        @endforeach
    </div>
    <!-- Recommended rims end -->
@endsection
