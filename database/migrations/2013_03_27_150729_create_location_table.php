<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impfort', function (Blueprint $table) {
            $table->id('impfort_id');
            $table->integer('plz');
            $table->string('ort');
            $table->string('adresse');
            $table->integer('hausnummer');
            $table->string('bezeichnung')->nullable();
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
        Schema::dropIfExists('impfort');
    }
}
