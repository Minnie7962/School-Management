<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class StudentRegistration extends Model
{
    protected $fillable = [
        'user_id',
        'full_name_kh',
        'full_name_en',
        'date_of_birth',
        'gender',
        'address',
        'phone_number',
        'email',
        'parent_guardian_name',
        'parent_guardian_contact',
        'grade_level',
        'previous_school',
        'last_grade_completed',
        'academic_achievements',
        'allergies',
        'medical_conditions',
        'emergency_contact_name',
        'emergency_contact_phone',
        'birth_certificate_path',
        'school_report_card_path',
        'immunization_records_path',
        'passport_photo_path',
        'parent_guardian_signature',
        'declaration_date'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
