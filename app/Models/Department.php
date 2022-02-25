<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Student;
use App\Models\ClassRoom;


class Department extends Model
{
    use HasFactory;

    // has many relation between Depratrment and classroom model.
    public function classrooms()
    {
        return $this->hasMany(ClassRoom::class, 'dept_id');
    }

    // has many through retation between Department, Classroom, Student model
    public function student()
    {
        return $this->hasManyThrough(Student::class, Classroom::class, 'dept_id', 'classroom_id');
    }
}
