<?php

namespace App;
use App\Item;

class Cart
{
    public $items = null;
    public $itemsQuantity = 0;
    public $itemsPriceTotal = 0;

    public function __construct($oldCart) {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->itemsQuantity = $oldCart->itemsQuantity;
            $this->itemsPriceTotal = $oldCart->itemsPriceTotal;
        }
    }

    public function add($item, $id) {
        $storedItem = ['qty' => 0, 'price' => $item->retailprice, 'item' => $item];
        if($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item->retailprice * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->itemsQuantity++;
        $this->itemsPriceTotal += $item->retailprice;
    }
}