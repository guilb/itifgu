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
            $table->string('name');
            $table->string('firstname');
            $table->string('email')->unique();
            $table->string('password');

            $table->string('customer_number')->unique();

            $table->string('address');
            $table->string('zipcode');
            $table->string('city');
            $table->string('country');
            $table->string('phone');


            $table->integer('parking_id')->unsigned();
            $table->foreign('parking_id')->references('id')->on('parkings')->onDelete('cascade');
            $table->enum('role', ['user', 'admin'])->default('user');
            $table->string('status');
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
        Schema::table('parkings', function(Blueprint $table) {
            $table->dropForeign('users_parking_id_foreign');
        });
        Schema::dropIfExists('users');
    }
}
