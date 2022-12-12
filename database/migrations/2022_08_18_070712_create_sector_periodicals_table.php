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
        Schema::create('sector_periodicals', function (Blueprint $table) {
            $table->id();
            $table->string('valid_from')->nullable();
            $table->string('valid_until')->nullable();
            $table->unsignedBigInteger('sector_benefit_id')->unsigned();
            $table->foreign('sector_benefit_id')->references('id')->on('sector_benefits')->onDelete('cascade');
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
        Schema::dropIfExists('sector_periodicals');
    }
};
