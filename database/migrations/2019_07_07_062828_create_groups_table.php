<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('corp_id');
            $table->bigInteger('period_id');
            $table->bigInteger('lecturer_id')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->text('title_1')->nullable();
            $table->text('abstract_1')->nullable();
            $table->text('title_2')->nullable();
            $table->text('abstract_2')->nullable();
            $table->integer('status')->default(0);
            $table->integer('type');
            $table->text('proof_path')->nullable();            
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
        Schema::dropIfExists('groups');
    }
}
