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
            $table->text('option_text')->nullable();
            $table->string('vote_percentage');
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
