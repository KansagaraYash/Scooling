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

    // has one through relation between Student, ClassRoom and Department model.
    public function department()
    {
        return $this->hasOneThrough(Department::class, Classroom::class);
    }

    // polymorphic relation between Student and Image model.
    public function images()
    {
        return $this->morphOne(Image::class, 'imageable')->oldestOfMany();
    }
   
    public function subjects()
    {
        return $this->morphToMany(Subject::class, 'subjectable');
    }
}
