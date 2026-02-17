<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Runs the migration and creates the table.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sku')->unique();
            $table->decimal('price', 10, 2);
            $table->boolean('available')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Cancels the migration and deletes the table.
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
