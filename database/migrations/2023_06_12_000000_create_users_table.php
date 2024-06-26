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
            $table->foreignId('blood_type_id')->constrained('blood_types')->cascadeOnUpdate()->cascadeOnDelete();
            $table->enum('status', ['active', 'away']);
            $table->text('remark')->nullable();
            $table->text('disease')->nullable();
            $table->text('address');
            $table->foreignId('city_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();;
            $table->foreignId('township_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();;
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
