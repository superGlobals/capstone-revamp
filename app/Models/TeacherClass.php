<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id', 'school_class_id', 'subject_id', 'school_year'
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function school_class()
    {
        return $this->belongsTo(SchoolClass::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
