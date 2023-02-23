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
        Schema::create('decline_benefits', function (Blueprint $table) {
             $table->id();
            $table->string('date')->nullable();
            $table->string('client_type')->nullable();
            $table->string('process_name')->nullable();
            $table->string('decline_type')->nullable();
            $table->string('decline_reason')->nullable();
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
        Schema::dropIfExists('decline_benefits');
    }
};
