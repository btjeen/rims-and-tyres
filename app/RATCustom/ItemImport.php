<?php

namespace App\RATCustom;


use Illuminate\Database\Eloquent\Model;
use App\Item;
use App\Supplier;

class ItemImport extends Model
{
    public static function validate_data($supplier, $type, $source) {
        // Validate data
    }

    public static function store_data($supplier, $type, $source) {

        // Get all item data
        $itemLines = str_getcsv(file_get_contents($source));

        if (exists(Supplier::select('id')->where('title', $supplier)->get())){
            // If the supplier already exists, get the id of it
            $supplierId = Supplier::select('id')->where('title', $supplier)->get();
        } else {
            // If the set supplier does not exist, create a new one with the given values
            $newSupplier = new Supplier();
            $newSupplier->title = $supplier;
            $newSupplier->source = $source;
            switch($type) {
                case 'rim':
                    $newSupplier->rims = 1;
                    break;
                case 'tyre':
                    $newSupplier->tyres = 1;
                    break;
                case 'accessory':
                    $newSupplier->accessories = 1;
                    break;
            }

            $supplierId = Supplier::create($newSupplier)->id;
        }


        foreach ($itemLines as $line) {
            $item = new Item();

            $item->title = ucfirst($line['Brand'].' '.$line['Model'].' '.$line['Color']);
            $item->itemnumber = $line['Itemnumber'];
            $item->brand = $line['Brand'];
            $item->model = $line['Model'];
            $item->color = $line['Color'];
            $item->costprice = $line['Costprice'];
            $item->retailprice = $line['Retail'];
            $item->image = $line['Image'];
            $item->type = $type;
            $item->description = $line['Description'];
            $item->supplier = $supplierId;
            $item->extras = json_encode([
                'season' => $line['Season'],
                'diameter' => $line['Diameter'],
                'width' => $line['Width'],
                'centerbore' => $line['CB'],
                'ET' => $line['ET'],
                'holesAmount' => $line['Holes'],
                'holesDistance' => $line['Hole distance']
                ]);

            $item->save();
        }


    }
}