<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {

            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->string('price');
            $table->string('offer');
            $table->integer('quantity')->default(1);
            $table->string('slug');
            $table->tinyInteger('feature_product')->default(0);
            $table->integer('category_id')->unsigned();
            $table->integer('brand_id')->unsigned();
            $table->tinyInteger('status')->default(0);
            $table->string('images');
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
        //
    }
}
