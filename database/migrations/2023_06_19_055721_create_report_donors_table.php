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
        Schema::create('report_donors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hospital_id')->constrained('hospitals')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('admin_report_id')->nullable()->constrained('report_admins')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('admin_id')->constrained('admins')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('donor_id')->constrained('donors')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('patient_id')->nullable()->constrained('patients')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('status', ['pending', 'completed', 'cancel'])->default('pending');
            $table->enum('type', ['emergency', 'normal'])->default('normal');
            $table->enum('report_type', ['website', 'phone'])->default('website');
            $table->enum('donor_confirm', ['done', 'undone', 'done_by_phone']);
            $table->text('remark')->nullable();
            $table->dateTime('report_date_time');
            $table->dateTime('confirm_date_time')->nullable();
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
        Schema::dropIfExists('report_donors');
    }
};
