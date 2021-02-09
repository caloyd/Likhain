<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('applicant_id');
            $table->unsignedBigInteger('employer_id');
            $table->unsignedBigInteger('job_post_id');
            $table->string('interview_date');
            $table->string('start_time');
            $table->string('interview_address');
            $table->string('recruiter_contact');
            $table->string('recruiter_name');
            $table->string('interview_notes');
            $table->string('interview_type');
            $table->string('views');
            $table->string('interview_status')->nullable();
            $table->string('interview_result')->nullable();
            $table->string('interview_applicant_decision')->nullable();
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
        Schema::dropIfExists('interviews');
    }
}
