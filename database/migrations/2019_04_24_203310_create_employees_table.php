<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->string('email',120)->nullable()->unique();
            $table->string('phone',15)->unique();
            $table->string('nid_no',100)->unique();
            $table->string('address',255);
            $table->string('experience',50);
            $table->string('photo',30)->default('default.png');
            $table->string('salary',30);
            $table->string('vacation',30)->nullable();
            $table->string('city',50);
            $table->boolean('status',5)->default(0);
            $table->integer('user_roll')->unsigned();
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
        Schema::dropIfExists('employees');
    }
}
