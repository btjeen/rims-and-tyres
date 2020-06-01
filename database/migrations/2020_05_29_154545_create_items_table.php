<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->text('title')->default(NULL);
            $table->text('itemnumber')->default(NULL);
            $table->text('brand')->default(NULL);
            $table->text('model')->default(NULL);
            $table->text('color')->default(NULL);
            $table->float('costprice', 8, 2)->default(NULL);
            $table->float('retailprice', 8, 2)->default(NULL);
            $table->text('image')->default(NULL);
            $table->text('type')->default(NULL);
            $table->text('description')->default(NULL);
            $table->integer('supplier')->default(NULL)->references('id')->on('suppliers');

            $table->text('extras')->default(NULL);
                // JSON for;
                // season
                // diameter
                // width
                // centerbore
                // holesAmount
                // holesDistance

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
