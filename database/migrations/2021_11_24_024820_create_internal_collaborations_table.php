<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternalCollaborationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internal_collaborations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alliance_member_id')->notNullable();
            $table->foreign('alliance_member_id')->references('id')->on('alliance_members');
            $table->unsignedBigInteger('business_alliance_id')->notNullable();
            $table->foreign('business_alliance_id')->references('id')->on('business_alliances');
            $table->string('relationship')->notNullable();
            $table->date('entry_date')->notNullable();
            $table->date('exit_date')->nullable();
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
        Schema::dropIfExists('internal_collaborations');
    }
}
