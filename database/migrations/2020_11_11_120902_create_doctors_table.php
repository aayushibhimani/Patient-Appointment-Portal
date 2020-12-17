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
<<<<<<< HEAD
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('profile_pic')->nullable();
            $table->string('clinic_name')->nullable();
            $table->text('clinic_address')->nullable();
            $table->unsignedBigInteger('clinic_no')->nullable();
            $table->string('specialization')->nullable();
            $table->string('education')->nullable();
            $table->string('education_degree')->nullable();
            $table->string('registration_name')->nullable();
            $table->string('registration_year')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
=======
            $table->date('dob');
            $table->string('gender');
            $table->string('profile_pic');
            $table->string('clinic_name');
            $table->text('clinic_address');
            $table->unsignedBigInteger('clinic_no');
            $table->string('specialization');
            // edu details
            $table->string('education_college');
            $table->string('year_of_completion');
            $table->string('education_degree');
            //end edu details

            //experience details
            $table->string('hospital_name');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('destination');
            // end exp details

            $table->string('registration_name');
            $table->string('registration_year');
            $table->unsignedBigInteger('user_id');
>>>>>>> 81e84f197a29d17a63f318af3e7b374ea61ad889
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
