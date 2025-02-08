<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasRoles, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'english_name',
        'email',
        'gender',
        'nationality',
        'phone',
        'address',
        'address2',
        'birthday',
        'role',
        'photo',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birthday' => 'date',
    ];

    public function studentInfo()
    {
        return $this->hasOne(StudentInfo::class, 'student_id');
    }

    public function studentRegistration()
    {
        return $this->hasOne(StudentRegistration::class);
    }

    public function parentInfo()
    {
        return $this->hasOne(StudentParentInfo::class, 'student_id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'student_id');
    }

    public function marks()
    {
        return $this->hasMany(Mark::class, 'student_id');
    }

    // Teacher relationships
    public function assignedCourses()
    {
        return $this->hasMany(AssignedTeacher::class, 'teacher_id')
            ->when($this->role === 'teacher', function ($query) {
                return $query->with('course');
            });
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class, 'teacher_id')
            ->when($this->role === 'teacher');
    }

    // Role-based scopes
    public function scopeStudents($query)
    {
        return $query->where('role', 'student');
    }

    public function scopeTeachers($query)
    {
        return $query->where('role', 'teacher');
    }

    public function scopeAdmins($query)
    {
        return $query->where('role', 'admin');
    }

    // Helper methods
    public function isStudent()
    {
        return $this->role === 'student';
    }

    public function isTeacher()
    {
        return $this->role === 'teacher';
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }
}
