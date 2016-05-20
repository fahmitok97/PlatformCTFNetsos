<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('contest_id')->unsigned();
            $table->boolean('graded');
            $table->integer('final_position');
            $table->integer('final_points');
            $table->dateTime('final_latest_submit');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('contest_id')->references('id')->on('contests');
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
        Schema::drop('participations');
    }
}
