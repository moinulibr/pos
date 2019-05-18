<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',50);
            $table->string('email',120)->nullable()->unique();
            $table->string('phone',15)->unique();
            $table->string('address',255);
            $table->integer('type')->unsigned()->default(1);
            $table->string('shop_name',50)->nullable();
            $table->string('photo',30)->default('default.png');
            $table->string('account_name',50)->nullable();
            $table->string('account_number',50)->nullable();
            $table->string('bank_name',50)->nullable();
            $table->string('brance_name',50)->nullable();
            $table->string('city',50);
            $table->boolean('status',5)->default(0);
            $table->boolean('verified',5)->default(0);
            $table->integer('supplier_ref')->unsigned();
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
        Schema::dropIfExists('suppliers');
    }
}
