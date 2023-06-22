<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('home_club_id');
            $table->unsignedBigInteger('away_club_id');
            $table->unsignedInteger('home_score');
            $table->unsignedInteger('away_score');
            $table->timestamps();

            $table->foreign('home_club_id')->references('id')->on('clubs')->onDelete('cascade');
            $table->foreign('away_club_id')->references('id')->on('clubs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scores');
    }
}
