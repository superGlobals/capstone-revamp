<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_number', 'class_id', 'first_name', 'middle_name', 'last_name', 'email', 'password', 'birthdate', 'gender', 'status', 'image'
    ];

    public function class()
    {
        return $this->belongsTo(StudentClass::class);
    }
}
