<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContestTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contest_task', function (Blueprint $table) {
            $table->integer('contest_id')->unsigned();
            $table->integer('task_id')->unsigned();
            $table->integer('points');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->foreign('contest_id')->references('id')->on('contests');
            $table->foreign('task_id')->references('id')->on('tasks');
            $table->primary(array('task_id', 'contest_id'));
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
        Schema::drop('contest_task');
    }
}
