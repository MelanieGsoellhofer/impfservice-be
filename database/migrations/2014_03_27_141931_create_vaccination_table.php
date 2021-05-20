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
        Schema::create('vaccinations', function (Blueprint $table) {
            $table->id();
            $table->date('vaccinationdate');
            $table->string('starttime');
            $table->string('endtime');
            $table->integer('maxparticipants');
            /*default null weil:  Fehlermeldung: "location_id" can not be null - im Postman */
            $table->bigInteger('location_id')->unsigned()->nullable()->default(null);
            $table->foreign('location_id')
                ->references('id')->on('locations');
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
