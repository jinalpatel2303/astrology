<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Monolog\SignalHandler;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
use Session;
use App\Models\Course_fees;


class Course_payment_Controller extends Controller
{

    public function pay_for_course(Request $request){

     $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'mobile_no' => 'required',
            'price' => 'required',
           
        ]);


        if ($validator->passes()) {

         $first_name=$request->first_name;
         $last_name=$request->last_name;
         $email=$request->email;
         $mobile_no=$request->mobile_no;
         $price=$request->price;
         $selected_course=$request->selected_course;

         $mytime = Carbon::now('Asia/Kolkata');

         $count=DB::table('registration_master')->where('email',$email)->count();

         if($count==0){

                 return response()->json(['status'=>0,

                 'success'=>'Complete Your Registration ']);


           }else{


              $student=DB::table('registration_master')->where('email',$email)->get();

              $student_rid=$student[0]->r_id;

              $student_payment_data=DB::table('student_full_course_fee')->insert(['r_id'=>$student_rid,'first_name'=>$first_name,'last_name'=>$last_name,'email'=>$email,'mobile_no'=>$mobile_no,'price'=>$price,'sub_course_id'=>$selected_course,'created_at'=> $mytime,'status'=>0]);
             

              if($student_payment_data){

                 $student_payment_id=DB::table('student_full_course_fee')->max('id');


                     return response()->json([

                     'first_name'=>$first_name,
                     'last_name'=>$last_name,
                     'student_payment_id'=>$student_payment_id,
                     'student_rid'=>$student_rid,
                     'selected_course'=>$selected_course,
                     'email'=>$email,
                     'price'=>$price,
                    
                    ]);

               }


            }
      
          }else{

               return response()->json(['error'=>$validator->errors()]);

         }

    
     }

    public function pay_amount(Request $request){

            $email=$request->email;
            $selected_course=$request->selected_course;
            $student_rid=$request->student_rid;
            $student_payment_id=$request->student_payment_id;
            $payment_id=$request->payment_id;
            $amount=$request->price;


            $payment_mode='rezorpay_payment';
            $status=1;

            $time = Carbon::now('Asia/Kolkata');



         $api = new Api('rzp_test_f5Nc4nKOhOrZX0','ZxjKhRkFTgWprtDfjQHdDtxA');


      /*  $api = new Api('rzp_test_f5Nc4nKOhOrZX0','ZxjKhRkFTgWprtDfjQHdDtxA');*/

               $payment = $api->payment->fetch($payment_id);

            
            if(!empty($payment_id)) {
                 try {

                    $payment->capture(array('amount'=>$payment['amount']));

              } catch (\Exception $e) {
                   return  $e->getMessage();
                   \Session::put('error',$e->getMessage());
                  return redirect()->back();
                }
            }


            $update=DB::table('student_full_course_fee')->where('id',$student_payment_id)->update(['payment_id'=> $payment_id,'payment_mode'=>$payment_mode, 'status'=> $status, 'created_at'=> $time]);


             $student_data=DB::table('student_full_course_fee')->where('id',$student_payment_id)->get();

             $amount=$student_data[0]->price;
             $first_name=$student_data[0]->first_name;
             $last_name=$student_data[0]->last_name;

             $category=DB::table('category_master')->where('id',$selected_course)->get();

             $category_name=$category[0]->name;


            if($update){
           /*
             $meta['FROM_EMAIL']="schoolofoccultscience@gmail.com";
             $meta['email']=$email;
             $meta['subject']="payment";  
             $meta['amount']=$amount;
             $meta['payment_id']=$payment_id;
             $meta['category']=$category_name;
             $meta['first_name']=$first_name;
             $meta['last_name']=$last_name;

         
            Mail::send('email.payment_mail', $meta, function($m) use($meta){
        
               $m->from($meta['FROM_EMAIL'],'payment');
               $m->to($meta['email']);
               $m->subject($meta['subject']); 

              });
           */

             $meta['FROM_EMAIL']="schoolofoccultscience@gmail.com";
             $meta['email']="jinal.digitalinovation2021@gmail.com";
             $meta['subject']="payment";  
             $meta['amount']=$amount;
             $meta['payment_id']=$payment_id;
             $meta['category']=$category_name;
             $meta['first_name']=$first_name;
             $meta['last_name']=$last_name;
             $meta['client_email']=$email;


            Mail::send('email.admin_payment_mail', $meta, function($m) use($meta){
        
               $m->from($meta['FROM_EMAIL'],'payment');
               $m->to($meta['email']);
               $m->subject($meta['subject']); 


              });


           return response()->json([

                 'status'=>1, 
                 'student_rid'=>$student_rid, 
                 'success'=>'payment successful !']);



              }else{


                 return response()->json([

                 'status'=>0,   

                 'success'=>'Some thing went Wrong!']);

              }

     }


    public function change_student_status($id){


         $login_member=DB::table('student_login')->where('student_id',$id)->count();

         if($login_member==0){


          $member=DB::table('registration_master')->where('r_id',$id)->get();
          $fname=$member[0]->fname;
          $lname=$member[0]->lname;
          $email=$member[0]->email;
          $mobile=$member[0]->mobile;
          $date = date('Y-m-d', time());


           $last_login_member_id=DB::table('student_login')->max('id');
        
 
           $last_login_member=DB::table('student_login')->where('id',$last_login_member_id)->get();

           $last_login_member_enrollment= $last_login_member[0]->enrollment;

           $enrollment=$last_login_member_enrollment+1;

           $username=$fname.'.'.$lname;

           $password=$enrollment;


           DB::table('student_login')->insert(['student_id'=>$id, 'enrollment'=>$enrollment,'username'=>$username,'password'=>$password,'is_expire'=>0, 'start_date'=>'', 'end_date'=>'', 'date'=>$date]);

             DB::table('registration_master')->where('r_id',$id)->update(['status'=>1]);


             $meta['FROM_EMAIL']="schoolofoccultscience@gmail.com";
             $meta['email']=$email;
             $meta['subject']="your username and password";  
             $meta['username']=$username;
             $meta['password']=$password;
         
            Mail::send('email.credentials', $meta, function($m) use($meta){
        
               $m->from($meta['FROM_EMAIL'],'your username and password');
               $m->to($meta['email']);
               $m->subject($meta['subject']); 

              });


             return response()->json([
             'status'=>1,
             'success' => 'user has status updated successfully!'
              ]);


           }else{

             return response()->json([
             'status'=>0,
             'success' => 'user has already have username and password!'
              ]);

           }



       }


    public function payment_success(){


          return view('payment_success');


     }



    public function payment(){


      $data['course_master']=DB::table('course_master')->get();

        return view('half_payment',$data);


      }



    public function get_category_data($id){


        return json_encode(DB::table('category_master')->where('course_id',$id)->get()->toArray());


       }



    public function half_payment(Request $request){

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'mobile_no' => 'required',
            'price' => 'required',
            'course' => 'required',
            'category' => 'required',
           
        ]);

        if ($validator->passes()) {

         $first_name=$request->first_name;
         $last_name=$request->last_name;
         $email=$request->email;
         $mobile_no=$request->mobile_no;
         $price=$request->price;
         $category=$request->category;

         $mytime = Carbon::now('Asia/Kolkata');

         $count=DB::table('registration_master')->where('email',$email)->count();

         if($count==0){

                 return response()->json(['status'=>0,

                 'success'=>'Complete Your Registration ']);


           }else{


              $student=DB::table('registration_master')->where('email',$email)->get();

              $student_rid=$student[0]->r_id;

              $student_payment_data=DB::table('student_half_course_fee')->insert(['r_id'=>$student_rid,'first_name'=>$first_name,'last_name'=>$last_name,'email'=>$email,'mobile_no'=>$mobile_no,'price'=>$price,'category'=>$category,'created_at'=> $mytime,'status'=>0]);
             

              if($student_payment_data){

                 $student_payment_id=DB::table('student_half_course_fee')->max('id');


                     return response()->json([

                     'first_name'=>$first_name,
                     'last_name'=>$last_name,
                     'student_payment_id'=>$student_payment_id,
                     'student_rid'=>$student_rid,
                     'category'=>$category,
                     'email'=>$email,
                     'price'=>$price,
                    
                    ]);

               }


            }
      
          }else{

               return response()->json(['error'=>$validator->errors()]);

         }

 

    }

    

  
    public function pay_half_payment(Request $request){


            $email=$request->email;
            $category=$request->category;
            $student_rid=$request->student_rid;
            $student_payment_id=$request->student_payment_id;
            $payment_id=$request->payment_id;
            $amount=$request->price;


            $payment_mode='rezorpay_payment';
            $status=1;

            $time = Carbon::now('Asia/Kolkata');



         $api = new Api('rzp_test_f5Nc4nKOhOrZX0','ZxjKhRkFTgWprtDfjQHdDtxA');


               $payment = $api->payment->fetch($payment_id);

            
            if(!empty($payment_id)) {
                 try {

                    $payment->capture(array('amount'=>$payment['amount']));

              } catch (\Exception $e) {
                   return  $e->getMessage();
                   \Session::put('error',$e->getMessage());
                  return redirect()->back();
                }
            }


            $update=DB::table('student_half_course_fee')->where('id',$student_payment_id)->update(['payment_id'=> $payment_id,'payment_mode'=>$payment_mode, 'status'=> $status, 'created_at'=> $time]);


             $student_data=DB::table('student_half_course_fee')->where('id',$student_payment_id)->get();

             $amount=$student_data[0]->price;
             $first_name=$student_data[0]->first_name;
             $last_name=$student_data[0]->last_name;

             $category=DB::table('category_master')->where('id',$category)->get();

             $category_name=$category[0]->name;


            if($update){
           /*
             $meta['FROM_EMAIL']="schoolofoccultscience@gmail.com";
             $meta['email']=$email;
             $meta['subject']="payment";  
             $meta['amount']=$amount;
             $meta['payment_id']=$payment_id;
             $meta['category']=$category_name;
             $meta['first_name']=$first_name;
             $meta['last_name']=$last_name;

         
            Mail::send('email.payment_mail', $meta, function($m) use($meta){
        
               $m->from($meta['FROM_EMAIL'],'payment');
               $m->to($meta['email']);
               $m->subject($meta['subject']); 

              });
           */

             $meta['FROM_EMAIL']="schoolofoccultscience@gmail.com";
             $meta['email']="jinal.digitalinovation2021@gmail.com";
             $meta['subject']="payment";  
             $meta['amount']=$amount;
             $meta['payment_id']=$payment_id;
             $meta['category']=$category_name;
             $meta['first_name']=$first_name;
             $meta['last_name']=$last_name;
             $meta['client_email']=$email;


            Mail::send('email.admin_payment_mail', $meta, function($m) use($meta){
        
               $m->from($meta['FROM_EMAIL'],'payment');
               $m->to($meta['email']);
               $m->subject($meta['subject']); 


              });


           return response()->json([

                 'status'=>1, 
                 'student_rid'=>$student_rid, 
                 'success'=>'payment successful !']);



              }else{


                 return response()->json([

                 'status'=>0,   

                 'success'=>'Some thing went Wrong!']);

              }





      }





        




    
}
