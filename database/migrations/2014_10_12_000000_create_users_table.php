<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->bigInteger('user_id');
            $table->string('password');
            $table->string('show_password');
            $table->integer('users_details_id');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('users_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('account_type');
            $table->string('name');
            $table->string('middle_name');
            $table->string('surname');
            $table->string('nationality');
            $table->string('sex');
            $table->string('date_of_birth');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->integer('zip');
            $table->integer('phone_number');
            $table->string('email')->unique();
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
        Schema::dropIfExists('users');
    }
}
