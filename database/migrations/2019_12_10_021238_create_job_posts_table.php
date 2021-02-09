<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employer_id');
            $table->unsignedBigInteger('currency_id');
            $table->longText('description');
            $table->string('title');
            $table->string('employment_type');
            $table->string('position_level');
            $table->string('job_specialization');
            $table->string('job_location');
            $table->integer('salary_range_minimum')->nullable();
            $table->integer('salary_range_maximum');
            $table->string('education_level');
            $table->string('years_experience');
            $table->string('skill');
            $table->string('recruitment_period');
            // $table->timestamps();
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_posts');
    }
}
