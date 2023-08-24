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
            $table->id();
            $table->string('name');
            $table->string('description',1024)->nullable();
            $table->decimal('price', 8,2);
            $table->decimal('salePrice', 8,2)->nullable();
            $table->integer('quantity');
            $table->string('category');
            $table->string('type');
            $table->string('image');
            $table->string('additionalImage1')->nullable();
            $table->string('additionalImage2')->nullable();
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
