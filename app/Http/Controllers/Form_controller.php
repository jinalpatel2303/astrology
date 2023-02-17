<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use Redirect;
use App\Http\Controllers\Controller;
use Illuminate\support\facades\Auth;
use App\Models\Admin;
use Illuminate\support\MessageBag;
use Illuminate\Support\Facades\Mail;
use Illuminate\support\facades\Input;
use DB;
use Hash;

use Carbon\Carbon;

class Form_controller extends Controller
{

  /*  public function __construct(){

                $this->middleware('guest:student')->except('logout');
        }
    protected function guard(){

            return Auth::guard('student');

         }
    protected $redirectTo ='/student/home';
*/
    public function contact_admin(Request $request){

        $validated=$request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone_no'=>'required',
            'subject'=>'required',
            'message'=>'required',
        ]);

        $name=$request->input('name');

        $email=$request->input('email');

        $phone_no=$request->input('phone_no');

        $subject=$request->input('subject');

        $message=$request->input('message');
        
        $mytime = Carbon::now('Asia/Kolkata');

        $contact_admin=DB::table('contact_admin')->insert(['name'=>$name,'email'=>$email,'phone_no'=>$phone_no,'subject'=>$subject,'message'=>$message,'date'=>$mytime,]);


        if($contact_admin){


            $admin_detail=DB::table('admins')->get();

            $aemail=$admin_detail[0]->email;

            $aphone_no=$admin_detail[0]->phone_no;
       
             $meta['FROM_EMAIL']="jaypatel07072001@gmail.com";
             $meta['email']="jaypatel07072001@gmail.com";
             $meta['subject']="Someone need expert help";
             $meta['name']=$name;

                 
           Mail::send('email.resetpassword_url1', $meta, function($m) use($meta){
        
               $m->from($meta['FROM_EMAIL'],'New Get Started Inquiry');
               $m->to($meta['email']);
               $m->subject($meta['subject']); 
             });




             $meta['FROM_EMAIL']="jaypatel07072001@gmail.com";
             $meta['email']="$email";
             $meta['subject']="New Get Started Inquiry"; 
             $meta['name']=$name; 
            
          
      
           Mail::send('email.resetpassword_url1', $meta, function($m) use($meta){
        
               $m->from($meta['FROM_EMAIL'],'Inquiry submitted successfully');
               $m->to($meta['email']);
               $m->subject($meta['subject']); 
             });
            

            return redirect('/contact_us')->with('error','Response Submitted successfully !!');
            
        }
    }

    public function register_user(Request $request){

        $validated=$request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
            'mobile_no'=>'required',
        ]);

        $first_name=$request->input('first_name');

        $last_name=$request->input('last_name');

        $email=$request->input('email');

        $mobile_no=$request->input('mobile_no');

        $subject1=$request->input('subject1');

        $subject2=$request->input('subject2');

        $subject3=$request->input('subject3');

        $subject4=$request->input('subject4');

        $date = date('Y-m-d', time());

        DB::table('registration_master')->insert(['fname'=>$first_name,'lname'=>$last_name,'email'=>$email,'mobile'=>$mobile_no,'status'=>0,'date'=>$date]);

        $member_id=DB::table('registration_master')->max('r_id');

        if($subject1 == 'on'){

            DB::table('register_member_course')->insert(['member_id'=>$member_id,'course_id'=>1,'date'=>$date]);
        }


        if($subject2 == 'on'){

            DB::table('register_member_course')->insert(['member_id'=>$member_id,'course_id'=>2,'date'=>$date]);
        }


        if($subject3 == 'on'){

            DB::table('register_member_course')->insert(['member_id'=>$member_id,'course_id'=>3,'date'=>$date]);
        }


        if($subject4 == 'on'){

            DB::table('register_member_course')->insert(['member_id'=>$member_id,'course_id'=>4,'date'=>$date]);
        }



        return redirect('/login')->with('error','You have registered successfully !!');
        
    }
    
    
    
    
    
    public function getinquiry(Request $request){

        
        $validator = Validator::make($request->all(), [
              'name' => 'required',
            'email' => 'required|email',
            'phone_no' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        if ($validator->passes()) {

        $name=$request->name;
         $email=$request->email;
         $phone_no=$request->phone_no;
         $subject=$request->subject;
         $message=$request->message;
         $mytime = Carbon::now('Asia/Kolkata');

         $contact_admin=DB::table('contact_admin')->insert(['name'=>$name,'email'=>$email,'phone_no'=>$phone_no,'subject'=>$subject,'message'=>$message,'date'=>$mytime,]);

       if($contact_admin){


            $admin_detail=DB::table('admins')->get();

            $aemail=$admin_detail[0]->email;

            $aphone_no=$admin_detail[0]->phone_no;
       
             $meta['FROM_EMAIL']="jaypatel07072001@gmail.com";
             $meta['email']="jaypatel07072001@gmail.com";
             $meta['subject']="Someone need expert help";
             $meta['name']=$name;

                 
           Mail::send('email.resetpassword_url1', $meta, function($m) use($meta){
        
               $m->from($meta['FROM_EMAIL'],'New Get Started Inquiry');
               $m->to($meta['email']);
               $m->subject($meta['subject']); 
             });




             $meta['FROM_EMAIL']="jaypatel07072001@gmail.com";
             $meta['email']="$email";
             $meta['subject']="New Get Started Inquiry"; 
             $meta['name']=$name; 
            
          
      
           Mail::send('email.resetpassword_url1', $meta, function($m) use($meta){
        
               $m->from($meta['FROM_EMAIL'],'Inquiry submitted successfully');
               $m->to($meta['email']);
               $m->subject($meta['subject']); 
             });
            

            return response()->json(['success'=>'Response Sent successfully.']);
            
        }
    }

        return response()->json(['error'=>$validator->errors()]);
        
    }




    
}
