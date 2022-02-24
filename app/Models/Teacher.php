<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ClassRoom;
use App\Models\Department;

class Teacher extends Model
{
    use HasFactory;

    /**
     * Get all of the comments for the Teacher
     */
    public function classroom()
    {
        return $this->hasOne(ClassRoom::class, 'id', 'classroom_id');
    }

    /**
     * The class rooms that belong to the Teacher
     * Pivot table relation
     */
    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class, 'classroom_teacher','teacher_id','classroom_id');
    }
}
