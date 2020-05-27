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
    $recommendedRims = [
        ['id' =>'1',
            'design' => 'MAK Bremen Silver',
            'brand' => 'MAK', 'model' => 'Bremen', 'color' => 'Silver',
            'season' => 'winter', 'diameter' => '18', 'width' => '8.00',
            'cb' => '66.60', 'holes' => '5', 'holedistance' => '112',
            'image' => 'http://static.keratech.dk/./upload/Import/eurowheels/ALU/bremen_silver-bremen_silver-silver-106040b.jpg', 'retailprice' =>'1500'
        ],
        ['id' =>'2',
            'design' => 'AEZ Antigua High Gloss',
            'brand' => 'AEZ', 'model' => 'Antigua', 'color' => 'High gloss',
            'season' => 'summer', 'diameter' => '18', 'width' =>'8.00',
            'cb' => '72.60', 'holes' => '5', 'holedistance' => '120',
            'image' => 'http://static.keratech.dk/./upload/Import/alcar/ALU/AEZ Antigua High gloss.jpg', 'retailprice' =>'1649'
        ],
        ['id' =>'3',
            'design' => 'Autec Ethos Black polished',
            'brand' => 'Autec', 'model' => 'Ethos', 'color' => 'Black polished',
            'season' => 'summer', 'diameter' => '17', 'width' =>'7.5',
            'cb' => '72.50', 'holes' => '5', 'holedistance' => '120',
            'image' => 'http://static.keratech.dk/./upload/Import/rallycenteret/ALU/autecethosblack.jpg', 'retailprice' =>'1000'
        ],
        ['id' =>'4',
            'design' => 'GMP Atom Black diamond',
            'brand' => 'GMP', 'model' => 'Atom', 'color' => 'Black diamond',
            'season' => 'summer', 'diameter' => '19', 'width' =>'8.50',
            'cb' => '66.50', 'holes' => '5', 'holedistance' => '112',
            'image' => 'http://static.keratech.dk/./upload/Import/gammaAlu/ALU/GMP-ATOM-BLACK-DIAMOND.jpg', 'retailprice' =>'1400'
        ]
    ];
    $recommendedTyres = 'foobar';

    return view('frontpage', ['recommendedRims' => $recommendedRims]);
});

Route::get('/rims', function () {
    // Make DB query for getting all rims
    return view('rims');
});

Route::get('/tyres', function () {
    // Make DB query for getting all tyres
    return view('tyres');
});
