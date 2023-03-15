<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model implements Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'student_number', 'class_id', 'first_name', 'middle_name', 'last_name', 'email', 'password', 'birthdate', 'gender', 'status', 'image'
    ];

    public function class()
    {
        return $this->belongsTo(SchoolClass::class);
    }

    protected $hidden = [
        'password', 'remember_token',
    ];
 
    public function getAuthIdentifierName()
    {
        return 'id';
    }
 
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }
 
    public function getAuthPassword()
    {
        return $this->password;
    }
 
    public function getRememberToken()
    {
        return $this->remember_token;
    }
 
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }
 
    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}
