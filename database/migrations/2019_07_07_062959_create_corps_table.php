<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',50);
            $table->text('address');
            $table->string('city',20);
            $table->string('post',20);
            $table->string('phone_number',20);
            $table->string('type',50);
            $table->text('profile');
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
        Schema::dropIfExists('corps');
    }
}
