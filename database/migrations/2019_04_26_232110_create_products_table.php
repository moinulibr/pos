<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('product_name',50);
            $table->integer('cat_id')->unsigned();
            $table->integer('supplier_id')->unsigned();
            $table->string('product_code')->unique();
            $table->integer('warehouse')->unsigned();
            $table->integer('warehouse_section')->unsigned();
            $table->string('photo',30)->default('default.png');
            $table->string('buying_price',30);
            $table->string('selling_price',30);
            $table->string('buying_date');
            $table->string('expire_date');
            $table->boolean('status')->default(0);
            $table->boolean('verified')->default(0);
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
