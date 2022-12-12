<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->string('educational_attainment')->nullable();
            $table->string('school')->nullable();
            $table->string('course')->nullable();
            $table->string('year_graduated')->nullable();
            $table->string('achievement_award')->nullable();
            $table->string('skills_talents')->nullable();
            $table->string('hobbies')->nullable();
            $table->string('elementary_school')->nullable();
            $table->string('elementary_year_graduated')->nullable();
            $table->string('elementary_award')->nullable();
            $table->string('highschool_name')->nullable();
            $table->string('highschool_year_graduated')->nullable();
            $table->string('highschool_award')->nullable();
            $table->string('seniorhighschool_name')->nullable();
            $table->string('seniorhighschool_year_graduated')->nullable();
            $table->string('seniorhighschool_course')->nullable();
            $table->string('seniorhighschool_award')->nullable();
            $table->string('college_name')->nullable();
            $table->string('college_year_graduated')->nullable();
            $table->string('college_course')->nullable();
            $table->string('college_award')->nullable();
            $table->string('vocational_name')->nullable();
            $table->string('vocational_year_graduated')->nullable();
            $table->string('vocational_course')->nullable();
            $table->string('vocational_award')->nullable();
          
            $table->unsignedBigInteger('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('education');
    }
};
