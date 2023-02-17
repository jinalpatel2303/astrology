<?php

namespace App\Http\Controllers\Student;

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

class Studentcontroller extends Controller
{
    public function home($id){

        $student_data=DB::table('student_login')->where('id',$id)->get();

        $student_id=$student_data[0]->student_id;

        $registration_data=DB::table('registration_master')->where('r_id',$student_id)->get();

        $data['fname']=$registration_data[0]->fname;

        $data['lname']=$registration_data[0]->lname;
        
        
        $notes=DB::table('student_notes_assign')->where('student_id',$student_id)->get();

        $data['notes']=count($notes);

        $videos=DB::table('student_video_assign')->where('student_id',$student_id)->get();

        $data['videos']=count($videos);

        return view('student.home',$data);
    }




    public function notes_videos(Request $request,$id)
    {

         $student=DB::table('student_login')->where('id',$id)->get();

         $student_id=$student[0]->student_id;

        $registration_data=DB::table('registration_master')->where('r_id',$student_id)->get();

         $fname=$registration_data[0]->fname;

         $lname=$registration_data[0]->lname;
   
          $course=DB::table('member_course_category')->join('course_master' ,'course_master.id','member_course_category.member_course_id')->join('category_master','category_master.id','member_course_category.cat_id')->where('member_id',$student_id)->select('member_course_category.*','course_master.name','course_master.name as cname','category_master.name','category_master.name as sname','category_master.id as category_id')->paginate(5);
     /*     
          echo"<pre>";
          
          print_r($course);
          
          exit;
*/
          
          
          return view('student.notes_videos', compact('course','fname','lname'))->render();
         
    }


    //search product
        public function search_notes_videos(Request $request,$id){

            $student=DB::table('student_login')->where('id',$id)->get();

            $student_id=$student[0]->student_id;
            
            $registration_data=DB::table('registration_master')->where('r_id',$student_id)->get();

         $fname=$registration_data[0]->fname;

         $lname=$registration_data[0]->lname;
        
            $course=DB::table('member_course_category')->join('course_master' ,'course_master.id','member_course_category.member_course_id')->join('category_master','category_master.id','member_course_category.cat_id')->where('member_id',$student_id)->orwhere('course_master.name', 'like', '%'.$request->search_string.'%')->orwhere('category_master.name', 'like', '%'.$request->search_string.'%')->select('member_course_category.*','course_master.name','course_master.name as cname','category_master.name','category_master.name as sname')->paginate(10);




            if($course->count() >= 1){

                return view('search_ajax' ,compact('course','fname','lname'))->render();  //compact data must be in variable
            }else{

            return response()->json([
                    'status'=>'nothing_found',
                ]);
            }
    }










    public function notes(Request $request,$id)
    {
          $member_course_category_id=$id;
         
         $course_category=DB::table('member_course_category')->where('id',$member_course_category_id)->get();
         
         $category_id=$course_category[0]->cat_id;
                  
          $member_id=$course_category[0]->member_id;
           
        $registration_data=DB::table('registration_master')->where('r_id',$member_id)->get();

         $fname=$registration_data[0]->fname;

         $lname=$registration_data[0]->lname;
         

          $course=DB::table('student_notes_assign')->join('notes_master' ,'notes_master.id','student_notes_assign.notes_id')->where('student_id',$member_id)->where('mem_cat_id', $member_course_category_id)->select('student_notes_assign.*','notes_master.notes_title','notes_master.notes_title as notes_title','notes_master.upload','notes_master.upload as upload')->paginate(5);

          
        
          return view('student.notes', compact('course','fname','lname','member_course_category_id'))->render();
         
    }


    //search product
        public function search_notes(Request $request,$id){

        $member_course_category_id=$id;
         
         $course_category=DB::table('member_course_category')->where('id',$member_course_category_id)->get();
         
         $category_id=$course_category[0]->cat_id;
                  
          $member_id=$course_category[0]->member_id;
           
        $registration_data=DB::table('registration_master')->where('r_id',$member_id)->get();

         $fname=$registration_data[0]->fname;

         $lname=$registration_data[0]->lname; 

         $text=$request->search_string;        

          $course=DB::table('student_notes_assign')->join('notes_master' ,'notes_master.id','student_notes_assign.notes_id')->where('student_id',$member_id)->where('notes_master.notes_title', 'like', '%' . $text . '%')->where('mem_cat_id', $member_course_category_id)->select('student_notes_assign.*','notes_master.notes_title','notes_master.notes_title as notes_title','notes_master.upload','notes_master.upload as upload')->paginate(5);


            if($course->count() >= 1){

                return view('student.search_notes' ,compact('course','fname','lname','member_course_category_id'))->render();  //compact data must be in variable
            }else{

            return response()->json([
                    'status'=>'nothing_found',
                ]);
            }
    }










    public function videos(Request $request,$id)
    {
        
        $registration_data=DB::table('registration_master')->where('r_id',$id)->get();

         $fname=$registration_data[0]->fname;

         $lname=$registration_data[0]->lname;
   
          $course=DB::table('student_video_assign')->join('video_master' ,'video_master.id','student_video_assign.video_id')->where('student_id',$id)->select('student_video_assign.*','video_master.video_title','video_master.video_title as video_title','video_master.upload','video_master.upload as upload')->paginate(5);

          
          return view('student.videos', compact('course','fname','lname'))->render();
         
    }


    //search product
        public function search_videos(Request $request,$id){

            $student=DB::table('student_login')->where('id',$id)->get();

            $student_id=$student[0]->student_id;
            
            $registration_data=DB::table('registration_master')->where('r_id',$id)->get();

         $fname=$registration_data[0]->fname;

         $lname=$registration_data[0]->lname;
        
            $course=DB::table('member_course_category')->join('course_master' ,'course_master.id','member_course_category.member_course_id')->join('category_master','category_master.id','member_course_category.cat_id')->where('member_id',$student_id)->orwhere('course_master.name', 'like', '%'.$request->search_string.'%')->orwhere('category_master.name', 'like', '%'.$request->search_string.'%')->select('member_course_category.*','course_master.name','course_master.name as cname','category_master.name','category_master.name as sname')->paginate(5);


            if($course->count() >= 1){

                return view('search_ajax' ,compact('course','fname','lname'))->render();  //compact data must be in variable
            }else{

            return response()->json([
                    'status'=>'nothing_found',
                ]);
            }
    }
    
    
    
    public function edit_profile($id){

        $student_data=DB::table('student_login')->where('id',$id)->get();

        $student_id=$student_data[0]->student_id;

        $data['enrollment']=$student_data[0]->enrollment;

        $registration_data=DB::table('registration_master')->where('r_id',$student_id)->get();

        $data['fname']=$registration_data[0]->fname;

        $data['lname']=$registration_data[0]->lname;

        $data['email']=$registration_data[0]->email;

        $data['mobile']=$registration_data[0]->mobile;

        return view('student.edit_profile',$data);
    }


    public function store_edit_profile(Request $request,$id){

        $validated=$request->validate([
            'fname'=>'required',
            'lname'=>'required',
            'email'=>'required|email',
            'mobile'=>'required',
            'enrollment'=>'required',
        ]);

        $id=$id;

        $fname=$request->input('fname');

        $lname=$request->input('lname');

        $email=$request->input('email');

        $mobile=$request->input('mobile');

        $student_data=DB::table('student_login')->where('id',$id)->get();

        $student_id=$student_data[0]->student_id;

        DB::table('registration_master')->where('r_id',$student_id)->update(['fname'=>$fname,'lname'=>$lname,'email'=>$email,'mobile'=>$mobile,]);

        return redirect('/student/home/'.$id)->with('error','Profile updated successfully!!');
    }
}
