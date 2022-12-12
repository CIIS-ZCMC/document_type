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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('extension_name')->nullable();
            $table->string('street')->nullable();
            $table->string('municipality');
            $table->string('province');
            $table->string('region');
            $table->string('blood_type')->nullable();
            $table->string('nationality')->nullable();
            $table->string('religion')->nullable();
            $table->string('educational_attainment')->nullable();
            $table->string('birth_place');
            $table->string('birth_date');
            $table->string('sex');
            $table->string('civil_status');
            $table->string('contact_number');
            $table->string('landline_number')->nullable();
            $table->string('email_address');
            $table->string('skills_talents')->nullable();
            $table->string('hobbies')->nullable();
            $table->string('reason')->nullable();
            $table->string('client_type')->nullable();
            $table->string('client_status')->nullable();
            $table->unsignedBigInteger('barangay_id')->unsigned();
            $table->foreign('barangay_id')->references('id')->on('barangays')->onDelete('cascade');

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
        Schema::dropIfExists('clients');
    }
};
