<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Student;
use App\Models\Department;
use App\Models\Teacher;

class ClassRoom extends Model
{
    use HasFactory;

    // return all stundent of given classroom id
    public function student()
    {
        return $this->hasMany(Student::class, 'classroom_id');
    }

    /**
     * Get the user that owns the ClassRoom
     */
    public function department()
    {
        return $this->belongsTo(Department::class, 'dept_id');
    }

    /**
     * The roles that belong to the ClassRoom
     */
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'classroom_teacher','classroom_id','teacher_id');
    }

}
