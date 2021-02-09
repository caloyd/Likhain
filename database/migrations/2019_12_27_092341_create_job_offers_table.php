<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_offers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('applicant_id');
            $table->unsignedBigInteger('employer_id');
            $table->unsignedBigInteger('job_post_id');
            $table->unsignedBigInteger('interview_id');
            $table->char('applicant_decision')->nullable();
            $table->string('job_offer_date');
            $table->string('job_offer_time');
            $table->string('job_offer_address');
            $table->string('contact_number');
            $table->string('contact_name');
            $table->string('job_offer_note');
            $table->string('views');
            $table->string('attachment_letter')->nullable();
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
        Schema::dropIfExists('job_offers');
    }
}
