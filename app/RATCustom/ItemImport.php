<?php

namespace App\RATCustom;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Item;
use App\Supplier;

class ItemImport extends Model
{
    public static function validate_data($supplier, $type, $source) {
        // Validate data
    }

    public static function store_data($supplierTitle, $type, $source) {

        // Update supplier if it exist, otherwise create a new one with the given values
        if (Supplier::select('id')->where('title', $supplierTitle)->exists()){
            $supplierId = Supplier::where('title', $supplierTitle)->first()->value('id');
        } else {
            $newSupplier = new Supplier();
            $newSupplier->title = $supplierTitle;
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

            $newSupplier->save();
            $supplierId = $newSupplier->id;
        }

        // Get all item data
        $itemCSV = fopen($source, "r");
        $itemKeys = fgetcsv($itemCSV, 0, ";");

        // Get indexes of possible values
        $itemnumberColumn =     array_search('Itemnumber',$itemKeys,true);
        $brandColumn =          array_search('Brand',$itemKeys,true);
        $modelColumn =          array_search('Model',$itemKeys,true);
        $colorColumn =          array_search('Color',$itemKeys,true);
        $descriptionColumn =    array_search('Description',$itemKeys,true);
        $seasonColumn =         array_search('Season',$itemKeys,true);
        $diameterColumn =       array_search('Diameter',$itemKeys,true);
        $widthColumn =          array_search('Width',$itemKeys,true);
        $holesColumn =          array_search('Holes',$itemKeys,true);
        $holesDistanceColumn =  array_search('Holes distance',$itemKeys,true);
        $etColumn =             array_search('ET',$itemKeys,true);
        $cbColumn =             array_search('CB',$itemKeys,true);
        $retailColumn =         array_search('Retail price',$itemKeys,true);
        $costColumn =           array_search('Cost price',$itemKeys,true);
        $imageColumn =          array_search('Image',$itemKeys,true);
        $stockColumn =          array_search('Stock',$itemKeys,true);

        // Remove the header row
        unset($itemCSV[0]);

        // Loop through all lines, and add items
        for($idx = 0; $line = fgetcsv($itemCSV, 0, ";"); $idx++){
            $item = new Item();

            print_r($item[$imageColumn]);
            // If image field is empty, set placeholder image
            if ($line[$imageColumn] === '') {
                $line[$imageColumn] = url('/assets/images/image_missing.jpg');
            }

            // Transfer all the information to the Item object from the CSV line
            $item->title = ucfirst($line[$brandColumn].' '.$line[$modelColumn].' '.$line[$colorColumn]);
            $item->itemnumber = $line[$itemnumberColumn];
            $item->stock = $stockColumn;
            $item->brand = $line[$brandColumn];
            $item->model = $line[$modelColumn];
            $item->color = $line[$colorColumn];
            $item->costprice = $line[$costColumn];
            $item->retailprice = $line[$retailColumn];
            $item->image = $line[$imageColumn];
            $item->type = $type;
            $item->description = $line[$descriptionColumn];
            $item->supplier = $supplierId;
            $item->extras = json_encode([
                'season' => $line[$seasonColumn],
                'diameter' => $line[$diameterColumn],
                'width' => $line[$widthColumn],
                'cb' => $line[$cbColumn],
                'et' => $line[$etColumn],
                'holesAmount' => $line[$holesColumn],
                'holesDistance' => $line[$holesDistanceColumn]
            ]);

            if (Item::where('itemnumber', $item->itemnumber)->where('supplier', $item->supplier)->exists()) {
                $existingItem = Item::where('itemnumber', $item->itemnumber)->where('supplier', $item->supplier)->first();
                $existingItem->costprice = $item->costprice;
                $existingItem->retailprice = $item->retailprice;
                $existingItem->stock = $item->stock;

                $existingItem->save();
            } else {
                $item->save();
            }
        }

        fclose($itemCSV);
    }
}