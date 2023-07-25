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
        Schema::create('report_admins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hospital_id')->constrained('hospitals')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('patient_id')->nullable()->constrained('patients')->onUpdate('cascade')->onDelete('cascade');
            $table->text('patient_name')->nullable();
            $table->foreignId('blood_type_id')->constrained('blood_types')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('admin_id')->constrained('admins')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('status', ['pending', 'completed', 'cancel'])->default('pending');
            $table->text('phone');
            $table->text('latitude');
            $table->text('longitude');
            $table->dateTime('report_date_time');
            $table->dateTime('confirm_date_time')->nullable();
            $table->dateTime('date_of_appointment')->nullable();
            $table->text('diseases')->nullable();
            $table->text('remark')->nullable();
            $table->enum('type', ['emergency', 'normal'])->default('normal');
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
        Schema::dropIfExists('report_admins');
    }
};
