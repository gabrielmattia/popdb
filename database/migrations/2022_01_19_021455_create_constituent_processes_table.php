<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConstituentProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('constituent_processes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->notNullable();
            $table->string('description')->notNullable();
            $table->string('file_name')->unique()->notNullable();
            $table->string('file_type')->notNullable();
            $table->string('location')->notNullable();
            $table->unsignedBigInteger('alliance_member_id')->notNullable();
            $table->foreign('alliance_member_id')->references('id')->on('alliance_members');
            $table->unsignedBigInteger('user_id')->notNullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('constituent_processes');
    }
}
