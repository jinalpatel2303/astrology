<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class Exportpastmember implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return  DB::table('student_login')->join('registration_master','registration_master.r_id','student_login.student_id')->where('is_expire',1)->select("student_login.username as username" ,"student_login.password as password","registration_master.fname as fname","registration_master.lname as lname","registration_master.email as email", "registration_master.mobile as mobile")->get(); 
    }
}
