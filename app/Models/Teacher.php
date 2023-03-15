<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model implements Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'middle_name', 'last_name', 'email', 'password', 'birthdate', 'gender', 'about', 'status', 'image'
    ];

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
