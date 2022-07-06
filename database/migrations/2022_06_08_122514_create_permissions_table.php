<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string("type")->notNullable();
            $table->unsignedBigInteger('user_id')->notNullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('business_alliance_id')->notNullable();
            $table->foreign('business_alliance_id')->references('id')->on('business_alliances');
            $table->unique(['user_id', 'business_alliance_id']);
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
        Schema::dropIfExists('permission');
    }
};
