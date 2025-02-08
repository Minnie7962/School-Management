<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            
            // Personal Information
            $table->string('full_name_kh');
            $table->string('full_name_en');
            $table->date('date_of_birth');
            $table->string('gender');
            $table->text('address');
            $table->string('phone_number');
            $table->string('email')->nullable();
            
            // Parent/Guardian Information
            $table->string('parent_guardian_name');
            $table->string('parent_guardian_contact');
            
            // Academic Information
            $table->string('grade_level');
            $table->string('previous_school')->nullable();
            $table->string('last_grade_completed')->nullable();
            $table->text('academic_achievements')->nullable();
            
            // Health Information
            $table->text('allergies')->nullable();
            $table->text('medical_conditions')->nullable();
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_phone');
            
            // Required Documents
            $table->string('birth_certificate_path')->nullable();
            $table->string('school_report_card_path')->nullable();
            $table->string('immunization_records_path')->nullable();
            $table->string('passport_photo_path')->nullable();
            
            // Declaration
            $table->string('parent_guardian_signature')->nullable();
            $table->date('declaration_date')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_registrations');
    }
};
