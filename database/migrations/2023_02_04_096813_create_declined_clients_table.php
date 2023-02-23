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
        Schema::create('declined_clients', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('client_type')->nullable();
            $table->string('process_name')->nullable();
            $table->string('decline_type')->nullable();
            $table->string('decline_reason')->nullable();
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
        Schema::dropIfExists('declined_clients');
    }
};
