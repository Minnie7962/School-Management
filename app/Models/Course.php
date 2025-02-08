<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_name',
        'course_type',
        'class_id',
        'semester_id',
        'session_id'
    ];

    public function schoolClass(): BelongsTo
    {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }

    public function semester(): BelongsTo
    {
        return $this->belongsTo(Semester::class);
    }

    public function session(): BelongsTo
    {
        return $this->belongsTo(SchoolSession::class);
    }

    public function assignments(): HasMany
    {
        return $this->hasMany(Assignment::class);
    }

    public function syllabus(): HasOne
    {
        return $this->hasOne(Syllabus::class);
    }
}
