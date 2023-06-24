<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('user_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone');
            $table->enum('gender', ['male', 'female']);
            $table->date('dob');
            $table->string('nrc');
            $table->string('blood_type');
            $table->enum('status', ['active', 'away']);
            $table->text('remark')->nullable();
            $table->text('disease')->nullable();
            $table->text('address');
            $table->integer('city_id');
            $table->integer('township_id');
            $table->string('latitude');
            $table->string('longitude');
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
        Schema::dropIfExists('users');
    }
};
