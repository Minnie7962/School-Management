<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Semester extends Model
{
    use HasFactory;

    protected $fillable = ['semester_name', 'start_date', 'end_date', 'session_id'];

    protected $dates = [
        'start_date',
        'end_date'
    ];
    
    public function session(): BelongsTo
    {
        return $this->belongsTo(SchoolSession::class, 'session_id');
    }

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }

    public function exams(): HasMany
    {
        return $this->hasMany(Exam::class);
    }
}
