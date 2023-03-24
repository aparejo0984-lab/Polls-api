<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePollAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poll_answer', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->bigInteger('poll_id')->unsigned();
            $table->text('option_text1')->nullable();
            $table->text('option_text2')->nullable();
            $table->text('option_text3')->nullable();
            $table->text('option_text4')->nullable();
            $table->string('option_text1_vote')->nullable();
            $table->string('option_text2_vote')->nullable();
            $table->string('option_text3_vote')->nullable();
            $table->string('option_text4_vote')->nullable();
            $table->timestamps();

        });

        Schema::table('poll_answer', function($table) {
            $table->foreign('poll_id')->references('id')->on('poll');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('poll_answer');
    }
}
