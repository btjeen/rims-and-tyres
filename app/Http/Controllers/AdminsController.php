<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Item;
use App\Supplier;
use App\RATCustom\ItemImport;

class AdminsController extends Controller
{
    public function index(){
        $tab = request('tab');

        $globals = [
           'itemCount' => Item::count(),
        ];

        $rims = [
            'itemCount' => Item::where('type', 'rim')->count(),
        ];

        $tyres = [
            'itemCount' => Item::where('type', 'tyre')->count(),
        ];

        $suppliers = [
            'rimSuppliers' => Supplier::where('rims', '1')->get(),
            'tyreSuppliers' => Supplier::where('tyres', '1')->get(),
            'accessorySuppliers' => Supplier::where('accessories', '1')->get(),
        ];

        return view('admins.adminIndex', [
            'tab' => $tab,
            'globals' => $globals,
            'rims' => $rims,
            'tyres' => $tyres,
            'suppliers' => $suppliers
        ]);
    }

    public function import() {
        $supplier = request('supplier');
        $type = request('type');
        $source = request('source');

        ItemImport::store_data($supplier, $type, $source);

        return redirect('/admin');
    }
}
