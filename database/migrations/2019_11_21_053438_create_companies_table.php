<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('address');
            $table->string('company_email', 191)->unique();
            $table->longText('description');
            $table->string('registration_number');
            $table->string('number_of_employees');
            $table->string('contact_number');
            $table->string('postal_code');
            $table->string('website');
            $table->string('benefits');
            $table->string('dress_code');
            $table->string('language');
            $table->string('working_hours');
            $table->string('company_name');
            $table->string('industry');
            $table->string('company_logo_path')->nullable();
            $table->string('company_video_path')->nullable();
            $table->boolean('company_status')->default(1);
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
        Schema::dropIfExists('companies');
    }
}
