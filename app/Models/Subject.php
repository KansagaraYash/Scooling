<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use App\Models\Student;
use App\Models\Teacher;

class Subject extends Model
{
    use HasFactory;

    // public function subjecable()
    // {
    //     return $this->morphTo();
    // }

    public function students()
    {
        return $this->morphedByMany(Student::class, 'subjectable');
    }

    public function teachers()
    {
        return $this->morphedByMany(Teacher::class, 'subjectable');
    }
}
