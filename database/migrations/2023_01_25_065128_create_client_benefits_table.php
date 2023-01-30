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
        Schema::create('client_benefits', function (Blueprint $table) {
            $table->id();
          
            $table->unsignedBigInteger('client_type_id')->unsigned();
            $table->foreign('client_type_id')->references('id')->on('client_types')->onDelete('cascade'); 
            $table->unsignedBigInteger('benefit_id')->unsigned();
            $table->foreign('benefit_id')->references('id')->on('benefits')->onDelete('cascade'); 
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
        Schema::dropIfExists('client_benefits');
    }
};
