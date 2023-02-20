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
        Schema::create('benefit_requirements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('benefit_id')->unsigned();
            $table->foreign('benefit_id')->references('id')->on('benefits')->onDelete('cascade');
            $table->unsignedBigInteger('requirement_id')->unsigned();
            $table->foreign('requirement_id')->references('id')->on('requirements')->onDelete('cascade');
            $table->integer('removed_status')->default(0);
            $table->dateTime('removed_date')->nullable();
            $table->string('removed_by')->nullable();
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
        Schema::dropIfExists('benefit_requirements');
    }
};
