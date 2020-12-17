<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('profile_pic')->nullable();
            $table->string('clinic_name')->nullable();
            $table->text('clinic_address')->nullable();
            $table->unsignedBigInteger('clinic_no')->nullable();
            $table->string('specialization')->nullable();
            // edu details
            $table->string('education_college')->nullable();
            $table->string('year_of_completion')->nullable();
            $table->string('education_degree')->nullable();
            //end edu details

            //experience details
            $table->string('hospital_name')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('destination')->nullable();
            // end exp details

            $table->string('registration_name')->nullable();
            $table->string('registration_year')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
