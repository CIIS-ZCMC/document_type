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
        Schema::create('benefit_applications', function (Blueprint $table) {
            $table->id();
            $table->string('application_date');
            $table->string('application_type');
            $table->string('benefit_type');
            $table->string('application_reference_number')->nullable();        
            $table->string('application_remarks')->nullable();
            $table->string('application_status')->nullable();
            $table->string('application_process')->Nullable();
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
        Schema::dropIfExists('benefit_applications');
    }
};
