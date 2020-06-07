<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Item;

class AdminsController extends Controller
{
    public function index(Request $request){
        if (isset($request->tab)) {
            $tab = $request->tab;
        } else {
            $tab = 'stats';
        }

        $globals = [
           'itemCount' => Item::count(),
        ];

        $rims = [
            'itemCount' => Item::where('type', 'rim')->count(),
        ];

        $tyres = [
            'itemCount' => Item::where('type', 'tyre')->count(),
        ];

        return view('admins.adminIndex', [
            'tab' => $tab,
            'globals' => $globals,
            'rims' => $rims,
            'tyres' => $tyres
        ]);
    }
}
