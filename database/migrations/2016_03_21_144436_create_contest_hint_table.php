<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContestHintTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contest_hint', function (Blueprint $table) {
            $table->integer('contest_id')->unsigned();
            $table->integer('hint_id')->unsigned();
            $table->boolean('enabled');
            $table->foreign('contest_id')->references('id')->on('contests');
            $table->foreign('hint_id')->references('id')->on('hints');
            $table->primary(array('contest_id', 'hint_id'));
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
        Schema::drop('contest_hint');
    }
}
