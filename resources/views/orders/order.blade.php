@extends('layouts.webshop')

@section('title')
    Order
@endsection

@section('content')
    <div class="row pb-4">
        <div class="col-8 m-auto pt-4">
            <h2>Thanks for your order {{ $name }}!</h2>
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
                <h3 class="p-4 text-right">Order total: {{ $total }},-</h3>
            </div>
            <hr />
        </div>
        <div class="col-8 m-auto pt-4">
            <p>Lean back, while we handle the rest.</p>
            <p>If your order is not correct, please get in touch with us ASAP.</p>
        </div>
    </div>
@endsection
