<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentInfo extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id',
        'board_reg_no',
        'class_id',
        'section_id',
        'academic_year'
    ];

    /**
     * Get the sections for the blog post.
     */
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'student_id');
    }
}
