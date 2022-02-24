<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Student;
use App\Models\ClassRoom;


class Department extends Model
{
    use HasFactory;

    public function classrooms()
    {
        return $this->hasMany(ClassRoom::class, 'dept_id');
    }
}
