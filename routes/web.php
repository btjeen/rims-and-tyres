<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // Make DB query for getting top 4 rims
    // https://keratech.dk/upload/Export/aluxperten/export-alu.csv
    $recommendedRims = [
        ['id' =>'1',
            'category' => 'rims',
            'design' => 'MAK Bremen Silver',
            'brand' => 'MAK',
            'model' => 'Bremen',
            'color' => 'Silver',
            'season' => 'winter',
            'diameter' => '18',
            'width' => '8.00',
            'retailprice' =>'1500',
            'image' => 'http://static.keratech.dk/./upload/Import/eurowheels/ALU/bremen_silver-bremen_silver-silver-106040b.jpg',

            // Type specific values
            'cb' => '66.60',
            'holes' => '5',
            'holedistance' => '112'
        ],
        ['id' =>'2',
            'category' => 'rims',
            'design' => 'AEZ Antigua High Gloss',
            'brand' => 'AEZ',
            'model' => 'Antigua',
            'color' => 'High gloss',
            'season' => 'summer',
            'diameter' => '18',
            'width' =>'8.00',
            'retailprice' =>'1649',
            'image' => 'http://static.keratech.dk/./upload/Import/alcar/ALU/AEZ Antigua High gloss.jpg',

            // Type specific values
            'cb' => '72.60',
            'holes' => '5',
            'holedistance' => '120'
        ],
        ['id' =>'3',
            'category' => 'rims',
            'design' => 'Autec Ethos Black polished',
            'brand' => 'Autec',
            'model' => 'Ethos',
            'color' => 'Black polished',
            'season' => 'summer',
            'diameter' => '17',
            'width' =>'7.5',
            'retailprice' =>'1000',
            'image' => 'http://static.keratech.dk/./upload/Import/rallycenteret/ALU/autecethosblack.jpg',

            // Type specific values
            'cb' => '72.50',
            'holes' => '5',
            'holedistance' => '120',
        ],
        ['id' =>'4',
            'category' => 'rims',
            'design' => 'GMP Atom Black diamond',
            'brand' => 'GMP',
            'model' => 'Atom',
            'color' => 'Black diamond',
            'season' => 'summer',
            'diameter' => '19',
            'width' =>'8.50',
            'retailprice' =>'1400',
            'image' => 'http://static.keratech.dk/./upload/Import/gammaAlu/ALU/GMP-ATOM-BLACK-DIAMOND.jpg',

            // Type specific values
            'cb' => '66.50',
            'holes' => '5',
            'holedistance' => '112',
        ]
    ];
    $recommendedTyres = 'foobar';

    return view('frontpage', ['recommendedRims' => $recommendedRims]);
});

Route::get('/items/{type}', 'ItemsController@Index');

Route::get('/items/show/{id}', 'ItemsController@Show');
