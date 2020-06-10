<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Supplier;
use App\RATCustom\ItemImport;

class AdminsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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

        return view('admins.dashboard', [
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

        return redirect('/admin?tab=import');
    }

    public function destroy() {
        $supplierId = request('supplier');
        $type = request('type');

        // Unset item type of supplier
        $supplier = Supplier::findOrFail($supplierId);

        switch ($supplier) {
            case $type === 'rim':
                $supplier->rims = NULL;
                break;
            case $type === 'tyre':
                $supplier->tyres = NULL;
                break;
            case $type === 'accessory':
                $supplier->accessories = NULL;
                break;
        }

        // Delete supplier if no types are present or save the changes
        if ($supplier->rims === NULL && $supplier->tyres === NULL && $supplier->accessories === NULL) {
            $supplier->delete();
        } else {
            $supplier->save();
        }

        // Delete items from the supplier of the specified type
        Item::where('supplier', $supplierId)->where('type', $type)->delete();

        return redirect('/admin?tab=delete');
    }
}
