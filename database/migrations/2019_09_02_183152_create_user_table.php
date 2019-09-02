<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->bigIncrements('user_id', 191);
            $table->string('user_name', 191);
            $table->string('user_email', 191)->unique();
            $table->string('user_contact_number', 191)->unique();
            $table->string('user_location', 191);
            $table->integer('user_role')->default(0)->comment('0-user, 1-admin, 2-doctor');
            $table->string('password', 191);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('user_details');
    }
}
