@extends('layouts.webshop')

@section('title')
    {{ $item['title'] }}
@endsection

@section('content')
    <div class="row pb-4">
        <div class="col-12 col-md-8">
            <div style="width: 100%; height: 0; padding-bottom: 80%; background: #dedede; position: relative;">
                <p style="font-size: 5rem; width: 100%; text-align: center; position: absolute; left: 50%; top: 50%; transform: translate(-50%, -45%);">Placeholder image</p>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <h1>{{ $item['title'] }}</h1>
            <p class="card-text">Specifications</p>
            <table class="specification-table w-100">
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
        </div>
    </div>
        THIS PAGE SHOWS THE SPECIFICATIONS OF ITEM ID {{ $item['id'] }}
@endsection
