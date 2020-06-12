@extends('layouts.webshop')

@section('title')
    Order
@endsection

@section('content')

    @if(Session::has('cart'))
        <div class="row pb-4">
            <div class="col-12 col-md-8 m-auto pt-4">
                <h2>Your basket</h2>
                <table id="basket-table" class="w-100">
                    <thead>
                    <td class="p-2 pl-4">Amount</td>
                    <td class="p-2">Title</td>
                    <td class="p-2 pr-4 text-right">Price</td>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td class="p-2 pl-4">{{ $item['qty'] }}</td>
                            <td class="p-2">{{ $item['item']['title'] }}</td>
                            <td class="p-2 pr-4 text-right">{{ $item['price'] }},-</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="order-total">
                    <h3 class="p-4 text-right">Order total: {{ $totalPrice }},-</h3>
                </div>
                <hr />
            </div>
        </div>

        <form action="{{ route('orders.checkout') }}" method="POST">
            @csrf
            <div class="row pb-4">
                <div class="col-12 col-md-8 m-auto pb-4">
                    <label for="name">Name:</label><br />
                    <input type="text" name="name" id="name"/><br />
                    <br />
                    <label for="address">Address:</label><br />
                    <input type="text" name="address" id="address"/><br />
                    <br />
                </div>
                <div class="col12 col-md-8 m-auto d-flex align-items-center justify-content-between">
                    <a href="{{ route('items.index') }}" class="btn-lg btn-primary">
                        < Continue shopping
                    </a>
                    <input type="submit" class="btn-lg btn-primary" value="Checkout >"/>
                </div>
            </div>
        </form>
    @else
        <div class="row pb-4">
            <div class="col-12 col-md-8 m-auto pt-4">
                <h2>There are no items in your basket</h2>
                <p>You can try buying some
                    <a href="{{ route('items.list', 'rims') }}">rims</a>
                    or some
                    <a href="{{ route('items.list', 'tyres') }}">tyres</a>
                </p>
            </div>
        </div>
    @endif

@endsection
