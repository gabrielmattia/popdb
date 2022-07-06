<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllianceMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alliance_members', function (Blueprint $table) {
            $table->id();
            $table->string('cnpj')->unique()->notNullable();
            $table->string('name')->notNullable();
            $table->string('zip_code');
            $table->string('street');
            $table->integer('number');
            $table->string('neighborhood');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('site');
            $table->unsignedBigInteger('category_id')->notNullable();
            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('alliance_members');
    }
}
