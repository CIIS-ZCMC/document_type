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
        Schema::create('benefit_application_requirements', function (Blueprint $table) {
        
            $table->id();
            $table->string('name');
            $table->string('filename');
            $table->unsignedBigInteger('client_id')->unsigned();
            $table->string('folder');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->unsignedBigInteger('benefit_application_id')->unsigned();
            $table->foreign('benefit_application_id')->references('id')->on('benefit_applications')->onDelete('cascade');

           
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
        Schema::dropIfExists('benefit_application_requirements');
    }
};
