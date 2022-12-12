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
        Schema::create('client_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();;
            $table->string('user_id')->nullable();;
            $table->string('date_created')->nullable();;
            $table->unsignedBigInteger('client_application_id')->unsigned();
            $table->foreign('client_application_id')->references('id')->on('client_applications')->onDelete('cascade');
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
        Schema::dropIfExists('client_schedules');
    }
};
