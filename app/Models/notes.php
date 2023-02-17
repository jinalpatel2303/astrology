<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notes extends Model
{
    use HasFactory;


        protected $table='notes_master';


      protected $fillable = [
        'cat_id',
        'course_id',
        'notes_title',
        'description',
        'upload',
        'date',
       
    ];
}
