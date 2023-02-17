<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Models\Admin;
use DB;

class StudentAlumni extends Controller
{
    public function student_alumni_banner(){

        $student_alumni_banner=DB::table('banner_image')->where('page_name','student_alumni')->get();

        $data['student_alumni_banner']=$student_alumni_banner;

        return view('admin.student_alumni_banner',$data);
    }




    public function student_alumni(){

        $course_master=DB::table('course_master')->get();

        $data['course_master']=$course_master;

        $student_alumni=DB::table('student_alumni')->orderBy('id','desc')->paginate(4);

        $data['student_alumni']=$student_alumni;

        $student_course_list=DB::table('student_course_list')->join('category_master','category_master.id','student_course_list.sub_category_id')->select('category_master.name as sub_category','student_course_list.studentalumni_id as studentalumni_id')->get();

        $data['student_course_list']=$student_course_list;

        return view('admin.student_alumni' ,compact('student_course_list','student_alumni','course_master'))->render();
    }




    public function filter_student_alumni(Request $request){

        $course_master=DB::table('course_master')->get();

        $data['course_master']=$course_master;

        $student_course_list=DB::table('student_course_list')->join('category_master','category_master.id','student_course_list.sub_category_id')->select('category_master.name as sub_category','student_course_list.studentalumni_id as studentalumni_id')->get();

        $data['student_course_list']=$student_course_list;

        

        $filter_data = $request->search_string;


        if($filter_data !=''){

            $student_alumni=DB::table('student_alumni')->where('category_id',$filter_data)->orderBy('id','desc')->paginate(4);

            $data['student_alumni']=$student_alumni;
        }
        else{

            $student_alumni=DB::table('student_alumni')->orderBy('id','desc')->paginate(4);

            $data['student_alumni']=$student_alumni;
        }
        

            return view('admin.student_alumni_data' ,compact('student_course_list','student_alumni','course_master'))->render();
        
    }





    public function add_student_alumni_data($id){

        $data['course_master']=DB::table('course_master')->get();

        $category_master=DB::table('category_master')->get();

        $data['category_master']=$category_master;
        
        if($id==0){

            $data['image']='';

            $data['name']='';

            $data['enrollment_no']='';

            $data['city']='';

            $data['category_id']='';

            $data['category_name']='Select Category';

            $data['sub_category_id']='Select Sub Category';

            $data['date']='';

            $data['id']=$id;
        }
        else{

            $student_alumni=DB::table('student_alumni')->where('id',$id)->get();

            $data['id']=$student_alumni[0]->id;

            $data['image']=$student_alumni[0]->image;

            $data['name']=$student_alumni[0]->name;

            $data['date']=$student_alumni[0]->date;

            $data['enrollment_no']=$student_alumni[0]->enrollment_no;

            $data['city']=$student_alumni[0]->city;

            $category_id=$student_alumni[0]->category_id;

            $category_master_s=DB::table('course_master')->where('id',$category_id)->get();

            $data['category_name']=$category_master_s[0]->name;

            $data['category_id']=$category_id;

            $data['sub_category_id']='Select Sub Category';

            $data['category_master_data']=DB::table('category_master')->join('student_course_list','student_course_list.sub_category_id','category_master.id')->select('category_master.*','student_course_list.sub_category_id as sc_sub_category_id','category_master.name as sc_sub_category','student_course_list.id as list_id')->where('student_course_list.studentalumni_id',$id)->get();

            $data['count']=count($data['category_master']);

        }

        return view('admin.add_student_alumni_data',$data);
    }


    public function store_add_student_alumni_data(Request $request,$id){

        if($id ==0){

            $validated=$request->validate([
                'name'=>'required',
                'enrollment_no'=>'required',
                'category_id'=>'required',
                'sub_category_id'=>'required',
                'date'=>'required',
            ]);

            $name=$request->input('name');

            $date=$request->input('date');

            $enrollment_no=$request->input('enrollment_no');

            $city=$request->input('city');

            $category_id=$request->input('category_id');

            $file=$request->file('image');

            $imagename='';

            if($file !=''){

                $destination_path='uploads';

                $imagename=time().'_'.$file->getClientOriginalName();

                $file->move($destination_path,$imagename);

            }

            DB::table('student_alumni')->insert(['image'=>$imagename, 'city'=>$city ,'date'=>$date,'name'=>$name,'enrollment_no'=>$enrollment_no,'category_id'=>$category_id]);


            $studentalumni_id=DB::table('student_alumni')->max('id');

            $sub_category_id=$request->input('sub_category_id');

            foreach($sub_category_id as $sc){

                if($sc !=''){

                    DB::table('student_course_list')->insert(['studentalumni_id'=>$studentalumni_id , 'sub_category_id'=>$sc]);
                }
            }

            return redirect('/admin/student_alumni')->with('error','data submitted successfully!!');
        }

        else{


            $student_course_list=DB::table('student_course_list')->where('studentalumni_id',$id)->get();

            foreach($student_course_list as $sc){

                $sub_category_id=$sc->sub_category_id;

                $validated=$request->validate([
                'name'=>'required',
                'enrollment_no'=>'required',
                'category_id'=>'required',
                'sub_category_id'=>'unique:student_course_list,sub_category_id,'.$id.',studentalumni_id,sub_category_id,'.$sub_category_id,
                'date'=>'required',
            ]);


            }

            $name=$request->input('name');

            $date=$request->input('date');

            $enrollment_no=$request->input('enrollment_no');

            $city=$request->input('city');

            $category_id=$request->input('category_id');

            $file=$request->file('image');

            $oldimage=$request->input('oldimage');

            $imagename='';

            if($file !=''){

                $destination_path='uploads';

                $imagename=time().'_'.$file->getClientOriginalName();

                $file->move($destination_path,$imagename);

                if($oldimage !=''){

                    unlink(public_path('/uploads/'.$oldimage));
                }

                DB::table('student_alumni')->where('id',$id)->update(['image'=>$imagename ]);

            }


            
            DB::table('student_alumni')->where('id',$id)->update(['city'=>$city ,'date'=>$date,'name'=>$name,'enrollment_no'=>$enrollment_no,'category_id'=>$category_id]);



            $sub_category_id=$request->input('sub_category_id');

            if($sub_category_id !=''){

                    foreach($sub_category_id as $sc){

                    if($sc !=''){

                        DB::table('student_course_list')->insert(['studentalumni_id'=>$id , 'sub_category_id'=>$sc]);
                    }
                }
            }


            return redirect('/admin/student_alumni')->with('error','data updated successfully!!');
        }
    }

    

    public function delete_student_alumni($id){

        $userdata=DB::table('student_alumni')->where('id',$id)->get();

        $image=$userdata[0]->image;

        if($image !=''){

            unlink(public_path('/uploads/'.$image));
        }

        DB::table('student_course_list')->where('studentalumni_id',$id)->delete();

        DB::table('student_alumni')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }

    public function delete_student_course_list($id){

        $userdata=DB::table('student_course_list')->where('id',$id)->get();

        $sa_id=$userdata[0]->studentalumni_id;

        DB::table('student_course_list')->where('id',$id)->delete();

        return redirect('/admin/add_student_alumni_data/'.$sa_id)->with('error','data deleted successfully!!');
    }


    public function open_course(Request $request){
         
        $parent_id = $request->cat_id;
         
        $subcategories = DB::table('category_master')->where('course_id',$parent_id)->get();

        $output='';

        if($subcategories  !=''){

            $output .='<option value="" disabled>Select your category</option>';

        foreach($subcategories as $s){

           $output .='<option value="'.$s->id.'">'.$s->name.'</option>';
        }
    }

        return response($output);
    }









    
}
