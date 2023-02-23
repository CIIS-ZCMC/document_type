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
        Schema::create('client_cards', function (Blueprint $table) {
            $table->id();
            $table->string('GUID')->nullable();
            $table->string('card_number')->nullable();
            $table->string('card_status')->nullable();
            $table->string('card_type')->nullable();
            $table->string('printed_on')->nullable();
            $table->string('printed_by')->nullable();
            $table->string('released_by')->nullable();
            $table->string('identification')->nullable();
            $table->string('token')->nullable();
            $table->string('released_on')->nullable();
            $table->unsignedBigInteger('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->unsignedBigInteger('client_application_id')->unsigned();
            $table->foreign('client_application_id')->references('id')->on('client_applications')->onDelete('cascade');
            $table->unsignedBigInteger('client_type')->unsigned();
            $table->foreign('client_type')->references('id')->on('client_types')->onDelete('cascade');
            // $table->unsignedBigInteger('user_id')->unsigned();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('client_cards');
    }
};
