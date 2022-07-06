<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessAlliancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_alliances', function (Blueprint $table) {
            $table->id();
            $table->string('name')->notNullable();
            $table->date('creation_date')->notNullable();
            $table->text('business_goal')->notNullable();
            $table->unsignedBigInteger('responsable_member_id')->notNullable();
            $table->foreign('responsable_member_id')->references('id')->on('alliance_members');
            $table->unsignedBigInteger('user_id')->notNullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->boolean('is_public')->notNullable()->default(false);
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
        Schema::dropIfExists('business_alliances');
    }
}
