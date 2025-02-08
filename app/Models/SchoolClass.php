<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Section;
use App\Models\Syllabus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SchoolClass extends Model
{
    use HasFactory;

    protected $table = 'school_classes';

    protected $fillable = ['class_name', 'session_id'];

    public function session(): BelongsTo
    {
        return $this->belongsTo(SchoolSession::class, 'session_id');
    }

    public function sections(): HasMany
    {
        return $this->hasMany(Section::class, 'class_id');
    }

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }

    public function syllabi(): HasMany
    {
        return $this->hasMany(Syllabus::class);
    }
}
