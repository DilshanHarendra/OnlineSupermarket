<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->string('id',20)->primary();
            $table->string('title',100);
            $table->string('images',200);
            $table->integer('category');
            $table->integer('qty');
            $table->integer('restqty');
            $table->double('price',15);
            $table->double('discount',15)->default(0);
            $table->string('discription',300);
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
        Schema::dropIfExists('products');
    }
}
