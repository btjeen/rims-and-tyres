<div class="card w-100 p-3 mb-4">
    <form action="{{ route('admin.index') }}" method="POST" class="d-flex align-items-center justify-content-between">
        @csrf
        @method('DELETE')
        <input type="hidden" name="order" id="order" value="{{ $order->id }}"/>
        <span>{{ '#'.$order->id.' - '.$order->name }}</span>
        <input type="submit" value="Finish order" class="mr-0 btn btn-primary">
    </form>
    <hr />
    <h2>Items</h2>
    <table id="basket-table" class="w-100">
        <thead>
        <td class="p-2 pl-4">Amount</td>
        <td class="p-2">Title</td>
        <td class="p-2 pr-4 text-right">Price</td>
        </thead>
        <tbody>
        @foreach(json_decode($order->cart, true) as $cartItems)
            <tr>
                <td class="p-2 pl-4">##</td>
                <td class="p-2">Foobar</td>
                <td class="p-2 pr-4 text-right">####.##,-</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="order-total">
        <h3 class="p-4 text-right">Order total: {{ $order->total }},-</h3>
    </div>
</div>