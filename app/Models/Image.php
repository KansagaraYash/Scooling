<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    // polymorphic relation between student, teacher and image table
    public function imageable()
    {
        return $this->morphTo();
    }
}
