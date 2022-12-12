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
        Schema::create('declined_benefit_logs', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('user_id')->nullable();
            $table->string('process_name')->nullable();
            $table->string('decline_type')->nullable();
            $table->string('decline_reason')->nullable();
            $table->unsignedBigInteger('decline_benefit_id')->unsigned();
            $table->foreign('decline_benefit_id')->references('id')->on('decline_benefits')->onDelete('cascade');
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
        Schema::dropIfExists('declined_benefit_logs');
    }
};
