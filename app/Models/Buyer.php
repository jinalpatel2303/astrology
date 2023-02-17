<?php
namespace App\Models;
//use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notification\notifiable;

class Buyer extends Authenticatable
{
   
    // The authentication guard for admin


    protected $table='buyers';
    protected $guard= 'buyer';

      protected $fillable = [
        'name',
        'email',
        'country_code',
        'mobile',
        'address',
        'password'
       
    ];

     protected $hidden = [
        'password',
      
    ];


    public function setPasswordAttribute($password){
        $this->attributes['password']=bcrypt($password);
    }
}
