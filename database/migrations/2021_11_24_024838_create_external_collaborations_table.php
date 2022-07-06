<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExternalCollaborationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('external_collaborations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('business_collaboration_main_id')->notNullable();
            $table->foreign('business_collaboration_main_id')->references('id')->on('business_alliances');
            $table->unsignedBigInteger('business_collaboration_partner_id')->notNullable();
            $table->foreign('business_collaboration_partner_id')->references('id')->on('business_alliances');
            $table->string('relationship')->notNullable();
            $table->string('type_view_process')->notNullable();
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
        Schema::dropIfExists('external_colaborations');
    }
}
