<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePopMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pop_missions', function (Blueprint $table) {
            $table->id();
            $table->string('status')->notNullable();
            $table->string('description')->notNullable();
            $table->unsignedBigInteger('pop_id')->notNullable();
            $table->foreign('pop_id')->references('id')->on('pops');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pop_missions');
    }
}
