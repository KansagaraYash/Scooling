<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ClassRoom;
use App\Models\Department;

class Student extends Model
{
    use HasFactory;

    // return classroom data given by student id
    public function classroom()
    {
        return $this->belongsTo(ClassRoom::class);
    }

    public function department()
    {
        return $this->hasOneThrough(Department::class, Classroom::class);
    }

    public function classr()
    {
        return $this->hasOne(ClassRoom::class,'classroom_id');
    }
}
