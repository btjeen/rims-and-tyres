<?php
/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 09/06/2020
 * Time: 23:50
 */

namespace App\RATCustom\Transformations;

use App\RATCustom\ItemImport;
use Illuminate\Database\Eloquent\Model;

class TransformKeratech extends ItemImport
{
    // 1. Get source from supplier table
    // 2. Transform data based on the type
    // 3. Use the store_data function to store the data
}