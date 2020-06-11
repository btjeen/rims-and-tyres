<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Http\Controllers\Controller;
use \App\Item;
use \App\Order;
use Illuminate\Http\Request;
use Session;

class OrderController extends Controller
{
    public function index() {
        if (!Session::has('cart')) {
            return view('orders.basket', ['items' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('orders.basket', ['items' => $cart->items, 'totalPrice' => $cart->itemsPriceTotal]);
    }

    public function addToBasket(Request $request) {
        // Add item and redirect to basket
        $itemId = $request->itemId;
        $item = Item::find($itemId);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = New Cart($oldCart);
        $cart->add($item, $item->id);

        $request->session()->put('cart', $cart);
        return redirect(route('orders.index'));
    }

    public function checkout(Request $request) {
        if (!Session::has('cart')) {
            return view('orders.basket', ['items' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->itemsPriceTotal;
        $name = $request->name;
        $address = $request->address;

        $order = new Order();
        $order->cart = json_encode($cart);
        $order->total = $total;
        $order->name = $name;
        $order->address = $address;

        $order->save();

        return view('orders.order', ['items' => $cart->items, 'total' => $total, 'name' => $name]);
    }
}
