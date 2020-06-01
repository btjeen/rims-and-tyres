@extends('layouts.webshop')

@section('title')
    {{ $item['title'] }}
@endsection

@section('content')

    <!-- Header segment start -->
    <div class="row pt-4">
        <div class="col-12">
            <h1>{{ $item['title'] }}</h1>
        </div>
    </div>
    <!-- Header segment end -->

    <!-- Product info start -->
    <div class="row pb-4">
        <div class="col-12 col-md-8">
            <img class="single-item-image" src="{{ $item['image'] }}" alt="{{ $item['title'] }}"/>
        </div>
        <div class="col-12 col-md-4">
            <h3>Specifications</h3>
            <table class="w-100">
                <!-- Rim data layout -->
                @if($item['type'] === 'rim')
                    <tr>
                        <td>Diameter</td>
                        <td>{{ json_decode($item['extras'], true)['diameter'] }}</td>
                    </tr>
                    <tr>
                        <td>Width</td>
                        <td>{{ json_decode($item['extras'], true)['width'] }}</td>
                    </tr>
                    <tr>
                        <td>Centre bore</td>
                        <td>{{ json_decode($item['extras'], true)['cb'] }}</td>
                    </tr>
                    <tr>
                        <td>PCD</td>
                        <td>{{ json_decode($item['extras'], true)['holesAmount'].'x'.json_decode($item['extras'], true)['holesDistance'] }}</td>
                    </tr>
                    <tr>

                <!-- Tyre data layout -->
                @elseif($item['type'] === 'tyre')
                    @foreach(json_decode($item['extras']) as $extraKey => $extraValue)
                        <tr>
                            <td>{{ strtoupper($extraKey) }}</td>
                            <td>{{ $extraValue }}</td>
                        </tr>
                    @endforeach

                <!-- Reg. item data layout -->
                @else
                    @foreach(json_decode($item['extras']) as $extraKey => $extraValue)
                        <tr>
                            <td>{{ strtoupper($extraKey) }}</td>
                            <td>{{ $extraValue }}</td>
                        </tr>
                    @endforeach
                @endif
            </table>
            <hr />
            <p>{{ $item['description'] }}</p>
        </div>
    </div>
    <!-- Product info end -->

    <!-- Related items start-->
    <div class="row pb-4">
        <!-- TODO: Output related items (be it tyre, rims or ...) -->
    </div>
    <!-- Related items end -->

@endsection
