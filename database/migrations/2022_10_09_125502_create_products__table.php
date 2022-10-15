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
        if(!Schema::hasTable('_products')){
            Schema::create('_products', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('company_id');
                $table->string('img_path');
                $table->string('product_name');
                $table->integer('price');
                $table->integer('stock');
                $table->text('comment');
                $table->string('company_name');
                $table->timestamps();
            });
        }
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
