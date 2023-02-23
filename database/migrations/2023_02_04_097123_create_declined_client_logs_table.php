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
        Schema::create('declined_client_logs', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('user_id')->nullable();
            $table->string('process_name')->nullable();
            $table->string('decline_type')->nullable();
            $table->string('decline_reason')->nullable();
            $table->unsignedBigInteger('declined_client_id')->unsigned();
            $table->foreign('declined_client_id')->references('id')->on('declined_clients')->onDelete('cascade');
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
        Schema::dropIfExists('declined_client_logs');
    }
};
