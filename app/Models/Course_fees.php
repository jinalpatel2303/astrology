<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course_fees extends Model
{
    use HasFactory;


    protected $table='student_full_course_fee';


      protected $fillable = [
        'r_id',
        'first_name',
        'last_name',
        'email',
        'mobile_no',
        'sub_course_id',
        'price',
        'status',
        'payment_id',
        'payment_mode',
        'created_at',
       
    ];
}
