<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    public function index(){
        // Do stuff

        return view('itemList');
    }

    public function Show($type, $id) {
        // Do stuff

        return view('itemSingle');
    }
}
