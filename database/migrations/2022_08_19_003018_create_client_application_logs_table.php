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
        Schema::create('client_application_logs', function (Blueprint $table) {
            $table->id();
            $table->string('process_name')->nullable();
            $table->string('date')->nullable();
            $table->string('user_id')->nullable();
        
            $table->unsignedBigInteger('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->unsignedBigInteger('client_application_id')->unsigned();
            $table->foreign('client_application_id')->references('id')->on('client_applications')->onDelete('cascade');
            // $table->unsignedBigInteger('application_user_id')->unsigned();
            // $table->foreign('application_user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('client_application_logs');
    }
};
