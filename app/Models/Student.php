<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Student extends Authenticatable
{
    use HasFactory;

    protected $table='student_login';
    protected $guard= 'student';


       protected $fillable = [
        'student_id',
        'enrollment',
        'username',
        'password',
        'start_date',
        'end_date',
        'is_expire',
        'date',
    ];
}
