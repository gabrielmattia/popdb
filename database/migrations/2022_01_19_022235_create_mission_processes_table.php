<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mission_processes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pop_mission_id')->notNullable();
            $table->foreign('pop_mission_id')->references('id')->on('pop_missions');
            $table->unsignedBigInteger('constituent_process_id')->nullable();
            $table->foreign('constituent_process_id')->references('id')->on('constituent_processes');
            $table->unsignedBigInteger('pop_id')->nullable();
            $table->foreign('pop_id')->references('id')->on('pops');
            $table->date('entry_date')->notNullable();
            $table->date('exit_date')->nullable();
            $table->unique('pop_mission_id', 'constituent_process_id');
            $table->unique('pop_mission_id', 'pop_id');
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
