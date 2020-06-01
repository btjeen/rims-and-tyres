<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemsController extends Controller
{
    public function index($type){
        // https://keratech.dk/upload/Export/aluxperten/export-alu.csv

        // Get all items matching specified type
        if ($type == 'rims') {
            $items = Item::where('type', 'rim')->get();
        } elseif ($type == 'tyres') {
            $items = Item::where('type', 'tyre')->get();
        } else {
            $items = Item::all();
        }

        return view('itemList', ['items' => $items]);
    }

    public function Show($id) {
        // Make query for getting single item
        $item = Item::where('id', $id)->first();

        return view('itemSingle', ['item' => $item]);
    }
}
