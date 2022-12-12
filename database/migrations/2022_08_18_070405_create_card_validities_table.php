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
        Schema::create('card_validities', function (Blueprint $table) {
            $table->id();
            $table->string('valid_from')->nullable();
            $table->string('valid_until')->nullable();
            $table->unsignedBigInteger('client_card_id')->unsigned();
            $table->foreign('client_card_id')->references('id')->on('client_cards')->onDelete('cascade');
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
        Schema::dropIfExists('card_validities');
    }
};
