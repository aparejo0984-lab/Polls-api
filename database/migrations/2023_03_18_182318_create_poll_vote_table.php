<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePollVoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poll_vote', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->bigInteger('poll_id')->unsigned();
            $table->bigInteger('poll_answer_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('given_answer')->nullable();
            $table->timestamps();
        });

        Schema::table('poll_vote', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('poll_id')->references('id')->on('poll');
            $table->foreign('poll_answer_id')->references('id')->on('poll_answer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('poll_vote');
    }
}
