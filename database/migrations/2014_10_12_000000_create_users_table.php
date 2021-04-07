<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('User_ID');
            $table->string('Vorname');
            $table->string('Nachname');
            $table->string('Geschlecht');
            $table->integer('SVNr');
            $table->integer('TelefonNr');
            $table->boolean('Impfung_Verabreicht');
            $table->string('Rolle');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->bigInteger('impfung_id')->unsigned();
            $table->foreign('impfung_id')
                ->references('impfung_id')->on('impfungs')
                ->onDelete('cascade');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
