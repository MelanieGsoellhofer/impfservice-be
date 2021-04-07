<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaccinationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impfungs', function (Blueprint $table) {
            $table->id('impfung_id');
            $table->date('impfdatum');
            $table->time('startzeitpunkt');
            $table->time('endzeitpunkt');
            $table->integer('maxTN');
            $table->bigInteger('impfort_id')->unsigned();
            $table->foreign('impfort_id')
                ->references('impfort_id')->on('impfort')
                ->onDelete('cascade');
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
        Schema::dropIfExists('impfung');
    }
}
