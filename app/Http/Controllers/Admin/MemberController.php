<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Models\Admin;
use DB;

use App\Models\student_login;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportUser;
use App\Exports\ExportUser;
use App\Models\registration;

use App\Exports\Exportactivemember;

use App\Exports\Exportpastmember;
use Illuminate\Support\Facades\Mail;


class MemberController extends Controller
{
     public function member_list()
      {

         $panding_student=DB::table('registration_master')->orderBy('r_id','Desc')->where('status',0)->paginate(10);


          return view('admin.member_list', compact('panding_student'))->render();
 
      }

      public function member_detail($id){


        $member=DB::table('registration_master')->where('r_id',$id)->get();


        $data['date']=$member[0]->date;

           $data['fname']=$member[0]->fname;
           $data['lname']=$member[0]->lname;
           $data['email']=$member[0]->email;
           $data['mobile']=$member[0]->mobile;
           $data['status']=$member[0]->status;

            $status=$member[0]->status;

         $data['apply_course']=DB::table('register_member_course')->where('member_id',$id)->get();


          $course_row=DB::table('course_master')->get();

          $data['course']=$course_row;

        if($status==1){


          $login_member=DB::table('student_login')->where('student_id',$id)->get();

          $data['enrollment']=$login_member[0]->enrollment;
          $data['username']=$login_member[0]->username;
          $data['password']=$login_member[0]->password;
          }

         return view('admin.member_detail',$data);

       }

        public function exportUsers(Request $request){

        return Excel::download(new ExportUser, 'student.xlsx');
    }

   public function Exportactivemember(Request $request){

        return Excel::download(new Exportactivemember, 'Active_member.xlsx');
    }


     public function Exportpastmember(Request $request){

        return Excel::download(new Exportpastmember, 'past_member.xlsx');
    }





      public function search_student(Request $request){

        $search=$request->search_string;

        
           /* $panding_student=DB::table('registration_master')->where('fname', 'like', '%' . $text . '%')->orwhere('lname', 'like', '%' . $text . '%')->orwhere('email', 'like', '%' . $text . '%')->orwhere('mobile', 'like', '%' . $text . '%')->paginate(10); */


     $panding_student = DB::table('registration_master')->select("registration_master.*")
          ->where(function($query) use($search){
            $query->where('fname', 'like', '%' . $search . '%')
              ->orwhere('lname', 'like', '%' . $search . '%')
             ->orwhere('email', 'like', '%' . $search . '%')
             ->orwhere('mobile', 'like', '%' . $search . '%');
            })
          ->where('registration_master.status', '=', 0)->orderBy('r_id','Desc')
          ->paginate(10);
 

        if($panding_student->count() >= 1){

        return view('admin.member_search' ,compact('panding_student'))->render();  //compact data must be in variable
        }else{

        return response()->json([
                'status'=>'nothing_found',
            ]);
        }

      }



       public function active_membar(){


         $active_student_data=DB::table('student_login')->join('registration_master','registration_master.r_id','student_login.student_id')->where('is_expire',0)->select("student_login.*","registration_master.fname as fname","registration_master.lname as lname","registration_master.email as email", "registration_master.mobile as mobile")->orderBy('student_id','desc')->paginate(10); 



           return view('admin.active_membar', compact('active_student_data'))->render();


       }





       public function search_active_student(Request $request){

          $search=$request->search_string;

        $active_student_data = DB::table('student_login')->join('registration_master','registration_master.r_id','student_login.student_id')
         ->select("student_login.*","registration_master.fname as fname","registration_master.lname as lname","registration_master.email as email", "registration_master.mobile as mobile")
          ->where(function($query) use($search){
            $query->where('registration_master.fname', 'like', '%' . $search . '%')
              ->orwhere('registration_master.lname', 'like', '%' . $search . '%')
             ->orwhere('registration_master.email', 'like', '%' . $search . '%')
             ->orwhere('student_login.enrollment', 'like', '%' . $search . '%')
             ->orwhere('registration_master.mobile', 'like', '%' . $search . '%')
             ->orwhere('student_login.username', 'like', '%' . $search . '%');
            })
          ->where('student_login.is_expire', '=', 0)
          ->paginate(10);
        
      /*$active_student_data=DB::table('student_login')->join('registration_master','registration_master.r_id','student_login.student_id')->where('student_login.is_expire',0)->select("student_login.*","registration_master.fname as fname","registration_master.lname as lname","registration_master.email as email", "registration_master.mobile as mobile")->orderBy('id','Desc')->paginate(10); */
 

        if($active_student_data->count() >= 1){

        return view('admin.active_member_search' ,compact('active_student_data'))->render();  //compact data must be in variable
        }else{

        return response()->json([

                'status'=>'nothing_found',

            ]);
        }




       }

       public function past_member(){


        $past_student_data=DB::table('student_login')->join('registration_master','registration_master.r_id','student_login.student_id')->where('is_expire',1)->select("student_login.*","registration_master.fname as fname","registration_master.lname as lname","registration_master.email as email", "registration_master.mobile as mobile")->orderBy('id','Desc')->paginate(10); 


           return view('admin.past_member', compact('past_student_data'))->render();


       
       }

       public function search_past_student(Request $request){
        
         $search=$request->search_string;


          $past_student_data = DB::table('student_login')->join('registration_master','registration_master.r_id','student_login.student_id')
         ->select("student_login.*","registration_master.fname as fname","registration_master.lname as lname","registration_master.email as email", "registration_master.mobile as mobile")
          ->where(function($query) use($search){
            $query->where('registration_master.fname', 'like', '%' . $search . '%')
              ->orwhere('registration_master.lname', 'like', '%' . $search . '%')
             ->orwhere('registration_master.email', 'like', '%' . $search . '%')
             ->orwhere('student_login.enrollment', 'like', '%' . $search . '%')
             ->orwhere('registration_master.mobile', 'like', '%' . $search . '%')
             ->orwhere('student_login.username', 'like', '%' . $search . '%');
            })
          ->where('student_login.is_expire', '=', 1)->orderBy('id','Desc')
          ->paginate(10);


        /*$past_student_data=DB::table('student_login')->join('registration_master','registration_master.r_id','student_login.student_id')->where('is_expire',1)->select("student_login.*","registration_master.fname as fname","registration_master.lname as lname","registration_master.email as email", "registration_master.mobile as mobile")->orderBy('id','Desc')->paginate(10); */
 

        if($past_student_data->count() >= 1){

        return view('admin.past_member_search' ,compact('past_student_data'))->render();  //compact data must be in variable
        }else{

        return response()->json([

                'status'=>'nothing_found',

            ]);
         }

       }


       public function student_category($id)
       {

    

           $student=DB::table('member_course_category')->where('member_id',$id)->get();

           $student_id=$id;


            if(count($student)!=0){

             $student_category =DB::table('member_course_category')->join('course_master','course_master.id','member_course_category.member_course_id')->join('category_master','category_master.id','member_course_category.cat_id')->join('registration_master','registration_master.r_id','member_course_category.member_id')->where('member_id',$id)->select("member_course_category.*","registration_master.fname as fname","registration_master.lname as lname","course_master.name as name","category_master.name as category_name", "registration_master.r_id as r_id")->paginate(5);

             $category_name=1;


                return view('admin.student_category', compact('student_category','category_name','student_id'))->render();

           }else{


               $student_category=DB::table('register_member_course')->join('course_master','course_master.id','register_member_course.course_id')->where('member_id',$id)->join('registration_master','registration_master.r_id','register_member_course.member_id')->paginate(5);

                $category_name=0;

             

          
                   return view('admin.student_category', compact('student_category','category_name','student_id'))->render();
               

            }



      
       }

       public function edit_panding_member($id){

         $member=DB::table('registration_master')->where('r_id',$id)->get();


         $data['fname']=$member[0]->fname;
         $data['lname']=$member[0]->lname;
         $data['email']=$member[0]->email;
         $data['mobile']=$member[0]->mobile;
          $data['id']=$member[0]->r_id;


        $login_member=DB::table('student_login')->where('student_id',$id)->count();



     if($login_member !=0){

          $data['username']=$login_member[0]->username;
          $data['password']=$login_member[0]->password;

         }else{


              $data['username']='';
              $data['password']='';


            }
    
            return view('admin.edit_panding_member',$data);
       }

       public function store_panding_student(Request $request, $id){


         $validated=$request->validate([
            'fname'=>'required',
            'lname'=>'required',
            'email'=>'required',
            'mobile'=>'required',
        ]);


           $fname=$request->input('fname');
           $lname=$request->input('lname');
           $email=$request->input('email');
           $mobile=$request->input('mobile');

            $username=$request->input('username');
            $password=$request->input('password');


            DB::table('registration_master')->where('r_id',$id)->update(['fname'=>$fname,'lname'=>$lname,'email'=>$email,'mobile'=>$mobile]);


            DB::table('student_login')->where('student_id',$id)->update(['username'=>$username,'password'=>$password]);


            return redirect('/admin/member_list')->with('error','data updated successfully!!');

       }

       public function change_status($id){


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

       public function edit_active_member($id)
        {

          $active_member=DB::table('student_login')->where('id',$id)->get();

          $student_id=$active_member[0]->student_id;
          $data['username']=$active_member[0]->username;
          $data['password']=$active_member[0]->password;

          $active_member_detail=DB::table('registration_master')->where('r_id',$student_id)->get();

         $data['fname']=$active_member_detail[0]->fname;
         $data['lname']=$active_member_detail[0]->lname;
         $data['email']=$active_member_detail[0]->email;
         $data['mobile']=$active_member_detail[0]->mobile;
         $data['id']=$id;

         return view('admin.edit_active_member',$data);

       }

        public function store_active_student(Request $request, $id){

         $validated=$request->validate([
            'fname'=>'required',
            'lname'=>'required',
            'email'=>'required',
            'mobile'=>'required',
        ]);


           $fname=$request->input('fname');
           $lname=$request->input('lname');
           $email=$request->input('email');
           $mobile=$request->input('mobile');

            $username=$request->input('username');
            $password=$request->input('password');

            $student=DB::table('student_login')->where('id',$id)->get();

            $student_id=$student[0]->student_id;


            DB::table('registration_master')->where('r_id',$student_id)->update(['fname'=>$fname,'lname'=>$lname,'email'=>$email,'mobile'=>$mobile]);


            DB::table('student_login')->where('id',$id)->update(['username'=>$username,'password'=>$password]);


            return redirect('/admin/active_membar')->with('error','data updated successfully!!');

       }

      public function add_new_category($id)
       {
            $data['student_id']=$id;

            $student=DB::table('registration_master')->where('r_id',$id)->get();

            $data['fname']=$student[0]->fname;

            $data['lname']=$student[0]->lname;

            $data['selcted_course']=DB::table('register_member_course')->where('member_id',$id)->get();

            $data['course']=DB::table('course_master')->get();

            return view('admin.add_new_category',$data);
       }


       public function assign_new_category(Request $request,$id){

          $validated=$request->validate([
            'course'=>'required',
            'category'=>'required',
           
           ]);

                $course=$request->input('course');
                $category=$request->input('category');

             $date = date('Y-m-d', time());


            DB::table('member_course_category')->insert(['cat_id'=>$category,'member_id'=>$id,'member_course_id'=>$course,'status'=>0,'date'=>$date]);

            return redirect('admin/student_category/'.$id)->with('error','data added successfully!!');


       }

       public function assign_new_course($id){


            $data['student_id']=$id;

            $student=DB::table('registration_master')->where('r_id',$id)->get();

            $data['fname']=$student[0]->fname;

            $data['lname']=$student[0]->lname;

        /*    $data['selcted_course']=DB::table('register_member_course')->where('member_id',$id)->get();*/

            $data['course']=DB::table('course_master')->get();

            return view('admin.assign_new_course',$data);


       }

        public function store_new_course(Request $request,$id)
       {
          $validated=$request->validate([
            'course'=>'required',
            'category'=>'required',
           
           ]);

                $course=$request->input('course');
                $category=$request->input('category');

             $date = date('Y-m-d', time());


            DB::table('member_course_category')->insert(['cat_id'=>$category,'member_id'=>$id,'member_course_id'=>$course,'status'=>0,'date'=>$date]);

            return redirect('admin/student_category/'.$id)->with('error','data added successfully!!');
       }


       public function delete_course_list(Request $request){

        $ids = $request->ids;

            foreach($ids as $id){


            DB::table('member_course_category')->where('id', $id)->delete();

        
          
            }

            return response()->json(['status'=>200]);

      }

       public function view_student_notes($id)
       {

          
       $student_notes=DB::table('student_notes_assign')->join('notes_master','notes_master.id','student_notes_assign.notes_id')->where('mem_cat_id',$id)->select('student_notes_assign.*',"notes_master.cat_id as cat_id","notes_master.course_id as course_id","notes_master.notes_title as notes_title","notes_master.upload as upload")->paginate(10);




   

             return view('admin.student_notes', compact('student_notes'))->render();

          
         }

         public function add_student_notes($id){

            $student_course=DB::table('member_course_category')->where('id', $id)->get();

         

            $category_id=$student_course[0]->cat_id;

            $student_notes=DB::table('notes_master')->where('cat_id',$category_id)->get();

            $data['student_notes']=$student_notes;

           $data['member_id']=$id;


             return view('admin.add_student_notes',$data);

            

         }

         public function store_student_notes(Request $request,$id)
         {

              $validated=$request->validate([
                 'notes'=>'required',
                
           
           ]);

            $notes=$request->input('notes');

            $member_cat_id=$id;

            $student_course=DB::table('member_course_category')->where('id', $id)->get();

            $student_id=$student_course[0]->member_id;

            $date = date('Y-m-d', time());

            $start_date=$request->input('start_date');
            $end_date=$request->input('end_date');

            foreach($notes as $value){
                
                
              $count=DB::table('student_notes_assign')->where('mem_cat_id',$member_cat_id)->where('notes_id',$value)->where('student_id',$student_id)->count();
              
              if($count==0){
        
                    DB::table('student_notes_assign')->insert(['student_id'=>$student_id,'mem_cat_id'=>$member_cat_id,'notes_id'=>$value,'start_date'=>$start_date, 'end_date'=> $end_date, 'date'=>$date]);
                   
               }


            }


            return redirect('admin/view_student_notes/'.$member_cat_id);

          
            
         }

         public function delete_student_note($id){



            $student=DB::table('student_notes_assign')->where('id',$id)->delete();

            return response()->json([
             'success' => 'delete data succcesfully!'
              ]);



         }

         public function delete_all_student_note(Request $request){


             $ids = $request->ids;
            foreach($ids as $id){

            $student_notes_assign=DB::table('student_notes_assign')->where('id', $id)->delete();

        
          
            }

            return response()->json(['status'=>200]);


         }

         public function active_panding($id){

            $student_id=$id;

           
             DB::table('student_login')->where('student_id',$student_id)->delete();

             DB::table('student_notes_assign')->where('student_id', $student_id)->delete();

            DB::table('member_course_category')->where('member_id', $student_id)->delete(); 
            
             DB::table('registration_master')->where('r_id',$student_id)->update(['status' => 0]);


            return response()->json([
             'success' => 'delete data succcesfully!'
              ]);


         }

         public function delete_panding_student($id){


            DB::table('registration_master')->where('r_id',$id)->delete();

            return response()->json([
             'success' => 'delete data succcesfully!'
              ]);


         }

         public function delete_panding_all_student(Request $request){



             $ids = $request->ids;
            foreach($ids as $id){

            $student_notes_assign=DB::table('registration_master')->where('r_id', $id)->delete();

        
          
            }

            return response()->json(['status'=>200]);

         }
         
            public  function course_status($id)
         {
              $student_id=$id;


              DB::table('student_login')->where('student_id',$student_id)->update(['is_expire'=>1]);

               return response()->json([

                  'success' => 'status update succcesfully!'

                ]);

          }
          
          public function change_past_status($id){


            DB::table('student_login')->where('id',$id)->update(['is_expire'=>0]);

               return response()->json([

                  'success' => 'status update succcesfully!'

                ]);



         }










}
