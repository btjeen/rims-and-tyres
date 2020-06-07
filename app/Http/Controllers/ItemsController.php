<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemsController extends Controller
{
    public function index(){
        // https://keratech.dk/upload/Export/aluxperten/export-alu.csv

        $recommendedRims = Item::where('type', 'rim')->take(4)->get();
        $recommendedTyres = Item::where('type', 'tyre')->take(4)->get();

        return view('index', ['recommendedRims' => $recommendedRims, 'recommendedTyres' => $recommendedTyres]);
    }

    public function list($type){
        // https://keratech.dk/upload/Export/aluxperten/export-alu.csv

        // Get all items matching specified type
        if ($type == 'rims') {
            $items = Item::where('type', 'rim')->get();
        } elseif ($type == 'tyres') {
            $items = Item::where('type', 'tyre')->get();
        } else {
            $items = Item::all();
        }

        return view('items.list', ['items' => $items]);
    }

    public function show($id) {
        // Make query for getting single item
        $item = Item::where('id', $id)->first();

        return view('items.show', ['item' => $item]);
    }
}
