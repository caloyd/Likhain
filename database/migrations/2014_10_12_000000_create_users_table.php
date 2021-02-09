<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_type_id');
            $table->string('first_name', 45);
            $table->string('last_name', 45);
            $table->string('middle_name', 45)->nullable();
            $table->string('email', 254)->unique();
            $table->string('provider');
            $table->string('provider_id');
            $table->string('provider_avatar');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 60);
            $table->tinyInteger('is_active')->default(1);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes('deactivated_at');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
