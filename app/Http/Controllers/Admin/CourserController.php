<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Models\Admin;
use DB;

class CourserController extends Controller
{
    public function courser_banner(){

        $courser_banner=DB::table('banner_image')->where('page_name','courser')->get();

        $data['courser_banner']=$courser_banner;

        return view('admin.courser_banner',$data);
    }




    public function courser_about(){

        $courser_about=DB::table('courser_about')->get();

        $data['courser_about']=$courser_about;

        $courser_about_description=DB::table('courser_about_description')->get();

        $data['courser_about_description']=$courser_about_description;

        return view('admin.courser_about',$data);
    }


    public function update_courser_about_description_data($id){
        
            $courser_about_description=DB::table('courser_about_description')->where('id',$id)->get();

            $data['id']=$courser_about_description[0]->id;

            $data['image']=$courser_about_description[0]->image;

            $data['bg_image']=$courser_about_description[0]->bg_image;

            $data['sub_title']=$courser_about_description[0]->sub_title;

            $data['title']=$courser_about_description[0]->title;

            $data['description']=$courser_about_description[0]->description;   

        return view('admin.update_courser_about_description_data',$data);
    }


    public function store_update_courser_about_description_data(Request $request,$id){

        $validated=$request->validate([
            'sub_title'=>'required',
            'title'=>'required',
            'description'=>'required',
        ]);


            $sub_title=$request->input('sub_title');

            $title=$request->input('title');

            $description=$request->input('description');

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

                DB::table('courser_about_description')->where('id',$id)->update(['image'=>$imagename ]);

            }
            
            $file1=$request->file('bg_image');

            $oldbg_image=$request->input('oldbg_image');

            $bg_imagename='';

            if($file1 !=''){

                $destination_path='uploads';

                $bg_imagename=time().'_'.$file1->getClientOriginalName();

                $file1->move($destination_path,$bg_imagename);

                if($oldbg_image !=''){

                    unlink(public_path('/uploads/'.$oldbg_image));
                }

                DB::table('courser_about_description')->where('id',$id)->update(['bg_image'=>$bg_imagename ]);

            }
            
            DB::table('courser_about_description')->where('id',$id)->update(['description'=>$description ,'sub_title'=>$sub_title ,'title'=>$title ]);

            return redirect('/admin/courser_about')->with('error','data updated successfully!!');
        
    }


    public function add_courser_about_data($id){
        
        if($id==0){

            $data['title']='';

            $data['id']=$id;
        }
        else{

            $courser_about=DB::table('courser_about')->where('id',$id)->get();

            $data['id']=$courser_about[0]->id;

            $data['title']=$courser_about[0]->title;
        }

        return view('admin.add_courser_about_data',$data);
    }


    public function store_add_courser_about_data(Request $request,$id){

        if($id ==0){

            $validated=$request->validate([
                'title'=>'required',
            ]);

            $title=$request->input('title');

            DB::table('courser_about')->insert(['title'=>$title , ]);

            return redirect('/admin/courser_about')->with('error','data submitted successfully!!');
        }

        else{

            $validated=$request->validate([
                'title'=>'required',
            ]);

            $title=$request->input('title');
            
            DB::table('courser_about')->where('id',$id)->update(['title'=>$title ,]);

            return redirect('/admin/courser_about')->with('error','data updated successfully!!');
        }
    }

    

    public function delete_courser_about($id){

        DB::table('courser_about')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }




    public function courser_detail(){

        $courser_detail=DB::table('courser_detail')->get();

        $data['courser_detail']=$courser_detail;

        $courser_detail_description=DB::table('courser_detail_description')->get();

        $data['courser_detail_description']=$courser_detail_description;

        return view('admin.courser_detail',$data);
    }


    public function update_courser_detail_description_data($id){
        
            $courser_detail_description=DB::table('courser_detail_description')->where('id',$id)->get();

            $data['id']=$courser_detail_description[0]->id;

            $data['image']=$courser_detail_description[0]->image;

            $data['bg_image']=$courser_detail_description[0]->bg_image;

        return view('admin.update_courser_detail_description_data',$data);
    }


    public function store_update_courser_detail_description_data(Request $request,$id){

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

                DB::table('courser_detail_description')->where('id',$id)->update(['image'=>$imagename ]);

            }
            
            $file1=$request->file('bg_image');

            $oldbg_image=$request->input('oldbg_image');

            $bg_imagename='';

            if($file1 !=''){

                $destination_path='uploads';

                $bg_imagename=time().'_'.$file1->getClientOriginalName();

                $file1->move($destination_path,$bg_imagename);

                if($oldbg_image !=''){

                    unlink(public_path('/uploads/'.$oldbg_image));
                }

                DB::table('courser_detail_description')->where('id',$id)->update(['bg_image'=>$bg_imagename ]);

            }            

            return redirect('/admin/courser_detail')->with('error','data updated successfully!!');
        
    }


    public function add_courser_detail_data($id){
        
        if($id==0){

            $data['title']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $courser_detail=DB::table('courser_detail')->where('id',$id)->get();

            $data['id']=$courser_detail[0]->id;

            $data['title']=$courser_detail[0]->title;

            $data['description']=$courser_detail[0]->description;
        }

        return view('admin.add_courser_detail_data',$data);
    }


    public function store_add_courser_detail_data(Request $request,$id){

        if($id ==0){

            $validated=$request->validate([
                'title'=>'required',
                'description'=>'required',
            ]);

            $title=$request->input('title');

            $description=$request->input('description');

            DB::table('courser_detail')->insert(['title'=>$title ,'description'=>$description , ]);

            return redirect('/admin/courser_detail')->with('error','data submitted successfully!!');
        }

        else{

            $validated=$request->validate([
                'title'=>'required',
                'description'=>'required',
            ]);

            $title=$request->input('title');

            $description=$request->input('description');
            
            DB::table('courser_detail')->where('id',$id)->update(['title'=>$title ,'description'=>$description ,]);

            return redirect('/admin/courser_detail')->with('error','data updated successfully!!');
        }
    }

    

    public function delete_courser_detail($id){

        DB::table('courser_detail')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }




    public function courser_type(){

        $courser_type=DB::table('course_master')->get();

        $data['courser_type']=$courser_type;

        return view('admin.courser_type',$data);
    }

    public function add_courser_type_data($id){
        
        if($id==0){

            $data['name']='';

            $data['id']=$id;
        }
        else{

            $courser_type=DB::table('course_master')->where('id',$id)->get();

            $data['id']=$courser_type[0]->id;

            $data['name']=$courser_type[0]->name;
        }

        return view('admin.add_courser_type_data',$data);
    }


    public function store_add_courser_type_data(Request $request,$id){

        if($id ==0){

            $validated=$request->validate([
                'name'=>'required|unique:course_master,name,'.$id,
            ]);

            $name=$request->input('name');

            $date = now();
            $formatedDate = $date->format('Y-m-d');

            DB::table('course_master')->insert(['name'=>$name , 'date'=>$formatedDate]);

            $course_id=DB::table('course_master')->max('id');

            DB::table('course_detail')->insert(['course_id'=>$course_id ,
                                                'title1'=>'Lorem ipsum dolor sit amet' ,
                                                'title2'=>'Lorem ipsum dolor sit amet' ,
                                                'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' , ]);

            DB::table('course_banner_image')->insert(['course_id'=>$course_id ,'title'=>'Lorem ipsum dolor sit amet' ,'page_name'=>$name ]);

            DB::table('course_description')->insert(['course_id'=>$course_id , 'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' , ]);

            return redirect('/admin/courser_type')->with('error','data submitted successfully!!');
        }

        else{

            $validated=$request->validate([
                'name'=>'required|unique:course_master,name,'.$id,
            ]);

            $date = now();
            $formatedDate = $date->format('Y-m-d');

            $name=$request->input('name');
            
            DB::table('course_master')->where('id',$id)->update(['name'=>$name ,'date'=>$formatedDate]);

            return redirect('/admin/courser_type')->with('error','data updated successfully!!');
        }
    }

    

    public function delete_courser_type($id){

        $course_banner_image=DB::table('course_banner_image')->where('course_id',$id)->get();

        $image1=$course_banner_image[0]->image;

        if($image1 !=''){
            unlink(public_path('/uploads/'.$image1));
        }



        $course_detail=DB::table('course_detail')->where('course_id',$id)->get();

        $image2=$course_detail[0]->image;

        if($image2 !=''){
            unlink(public_path('/uploads/'.$image2));
        }


        $image3=$course_detail[0]->inner_image;

        if($image3 !=''){
            unlink(public_path('/uploads/'.$image3));
        }

        $sub_course_detail=DB::table('sub_course_detail')->where('course_id',$id)->get();

        foreach($sub_course_detail as $sc){

            if($sc !=''){

                $image4=$sc->image;

                if($image4 =''){
                    unlink(public_path('/uploads/'.$image4));
                }
            }

        }


        $sub_course_banner_image=DB::table('sub_course_banner_image')->where('course_id',$id)->get();

        foreach($sub_course_banner_image as $sc){

            if($sc !=''){

                $image9=$sc->image;

                if($image9 =''){
                    unlink(public_path('/uploads/'.$image9));
                }
            }

        }



        $course_description=DB::table('course_description')->where('course_id',$id)->get();

        $image6=$course_description[0]->image;

        if($image6 !=''){
            unlink(public_path('/uploads/'.$image6));
        }

        $sub_course_description=DB::table('sub_course_description')->where('course_id',$id)->get();

        foreach($sub_course_description as $sc){

            if($sc !=''){

                $image7=$sc->image;

                if($image7 =''){
                    unlink(public_path('/uploads/'.$image7));
                }
            }

        }

        

        

        DB::table('course_banner_image')->where('course_id',$id)->delete();

        DB::table('course_detail')->where('course_id',$id)->delete();

        DB::table('course_description')->where('course_id',$id)->delete();

        DB::table('sub_course_description')->where('course_id',$id)->delete();

        DB::table('category_master')->where('course_id',$id)->delete();

        DB::table('sub_course_detail')->where('course_id',$id)->delete();

        DB::table('sub_course_banner_image')->where('course_id',$id)->delete();

        DB::table('sub_course_des')->where('course_id',$id)->delete();

        DB::table('course_master')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }





    public function sub_course_type(){

        $sub_course_type=DB::table('category_master')->get();

        $data['sub_course_type']=$sub_course_type;

        return view('admin.sub_course_type',$data);
    }

    public function add_sub_course_type_data($id){
        
        $data['course_id']=$id;

        $data['id']=$id;

        return view('admin.add_sub_course_type_data',$data);
    }


    public function store_add_sub_course_type_data(Request $request,$id){

            $validated=$request->validate([
                'name'=>'required|unique:category_master,name,'.$id,
                'time_period'=>'required',
            ]);

            $name=$request->input('name');

            $time_period=$request->input('time_period');

            $date = now();
            $formatedDate = $date->format('Y-m-d');

            $course_id=$request->input('course_id');

            DB::table('category_master')->insert(['name'=>$name ,'course_id'=>$course_id ,'time_period'=>$time_period , 'date'=> $formatedDate,]);

            $sub_course_id=DB::table('category_master')->max('id');

            DB::table('sub_course_banner_image')->insert(['course_id'=>$course_id,'title'=>'Lorem ipsum dolor sit amet','sub_course_id'=>$sub_course_id,'page_name'=>$name]);

            DB::table('sub_course_detail')->insert(['course_id'=>$course_id,
                                                    'sub_course_id'=>$sub_course_id,
                                                    'title1'=>'Lorem ipsum dolor sit amet' ,
                                                    'title2'=>'Lorem ipsum dolor sit amet' ,
                                                    'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' ,]);

            DB::table('sub_course_des')->insert(['course_id'=>$course_id,
                                                'sub_course_id'=>$sub_course_id,
                                                'title'=>$name,
                                                'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' ,]);

            DB::table('sub_course_description')->insert(['course_id'=>$course_id,
                                                         'sub_course_id'=>$sub_course_id,
                                                        'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' ,]);

            return redirect('/admin/view_course/'.$course_id)->with('error','data submitted successfully!!');
        
    }

    public function update_sub_course_type_data($id){
        
        $userdata=DB::table('category_master')->where('id',$id)->get();

        $data['id']=$userdata[0]->id;

        $data['name']=$userdata[0]->name;

        $data['time_period']=$userdata[0]->time_period;

        $data['course_id']=$userdata[0]->course_id;

        return view('admin.update_sub_course_type_data',$data);
    }


    public function store_update_sub_course_type_data(Request $request,$id){

        

            $validated=$request->validate([
                'name'=>'required|unique:category_master,name,'.$id,
                'time_period'=>'required',
            ]);

            $name=$request->input('name');

            $time_period=$request->input('time_period');

            $date = now();
            $formatedDate = $date->format('Y-m-d');

            $course_id=$request->input('course_id');

            DB::table('category_master')->where('id',$id)->update(['name'=>$name ,'time_period'=>$time_period , 'date'=> $formatedDate, ]);

            return redirect('/admin/view_course/'.$course_id)->with('error','data updated successfully!!');
        
    }

    

    





    public function view_course($id){

        $course_type=DB::table('course_master')->where('id',$id)->get();

        $name=$course_type[0]->name;

        $data['name']=$name;

        $data['course_detail']=DB::table('course_detail')->where('course_id',$id)->get();

        $data['course_description']=DB::table('course_description')->where('course_id',$id)->get();

        $data['id']=$id;

        $data['sub_course_type']=DB::table('category_master')->where('course_id',$id)->get();

        $data['course_banner_image']=DB::table('course_banner_image')->where('page_name',$name)->get();

        return view('admin.view_course',$data);
    }




    public function add_course_detail_data($id){
        
        $course_detail=DB::table('course_detail')->where('id',$id)->get();

        $data['id']=$course_detail[0]->id;

        $data['title1']=$course_detail[0]->title1;

        $data['title2']=$course_detail[0]->title2;

        $data['image']=$course_detail[0]->image;

        $data['course_id']=$course_detail[0]->course_id;

        $data['inner_image']=$course_detail[0]->inner_image;

        $data['description']=$course_detail[0]->description;

        return view('admin.add_course_detail_data',$data);
    }


    public function store_add_course_detail_data(Request $request,$id){

        $validated=$request->validate([
            'title1'=>'required',
            'title2'=>'required',
            'description'=>'required',
        ]);

        $title1=$request->input('title1');

        $title2=$request->input('title2');

        $description=$request->input('description');

        $course_id=$request->input('course_id');

        $file=$request->file('image');

        $oldimage=$request->input('oldimage');

        $imagename='';

        if($file !=''){

            $destination_path='uploads';

            $imagename=time().'_'.$file->getClientOriginalName();

            $file->move($destination_path , $imagename);

            if($oldimage !=''){
                unlink(public_path('/uploads/'.$oldimage));
            }

            DB::table('course_detail')->where('id',$id)->update(['image'=>$imagename,]);
        }


        $file1=$request->file('inner_image');

        $oldimage1=$request->input('oldimage1');

        $imagename1='';

        if($file1 !=''){

            $destination_path='uploads';

            $imagename1=time().'_'.$file1->getClientOriginalName();

            $file1->move($destination_path , $imagename1);

            if($oldimage1 !=''){
                unlink(public_path('/uploads/'.$oldimage1));
            }

            DB::table('course_detail')->where('id',$id)->update(['inner_image'=>$imagename1,]);
        }
            
        DB::table('course_detail')->where('id',$id)->update(['title1'=>$title1 ,'title2'=>$title2 ,'description'=>$description ,]);

        return redirect('/admin/view_course/'.$course_id)->with('error','data updated successfully!!');
        
    }



    public function add_course_banner_image_data($id){

                $course_banner_image=DB::table('course_banner_image')->where('id',$id)->get();

                $data['image']=$course_banner_image[0]->image;

                $data['title']=$course_banner_image[0]->title;

                $data['page_name']=$course_banner_image[0]->page_name;

                $data['course_id']=$course_banner_image[0]->course_id;

                $data['id']=$course_banner_image[0]->id;


           return view('admin.add_course_banner_image_data',$data);
    }

    public function store_add_course_banner_image_data(Request $request,$id){


            $title=$request->input('title');

            $page_name=$request->input('page_name');

            $course_id=$request->input('course_id');

            $file=$request->file('image');

            $oldimage=$request->input('oldimage');

            $imagename='';

            if($file !=''){

                $destination_path='uploads';

                $imagename=time().'_'.$file->getClientOriginalName();

                $file->move($destination_path , $imagename);

                if($oldimage !=''){
                    unlink(public_path('/uploads/'.$oldimage));
                }

                DB::table('course_banner_image')->where('id',$id)->update(['image'=>$imagename,]);
            }


            DB::table('course_banner_image')->where('id',$id)->update(['title'=>$title,'page_name'=>$page_name,]);

            return redirect('/admin/view_course/'.$course_id)->with('error','data updated successfully!!!');
        
    }




    public function view_sub_course($id){

        $course_type=DB::table('category_master')->where('id',$id)->get();

        $data['course_id']=$course_type[0]->course_id;

        $name=$course_type[0]->name;

        $data['name']=$name;

        $data['sub_course_detail']=DB::table('sub_course_detail')->where('sub_course_id',$id)->get();

        $data['sub_course_des']=DB::table('sub_course_des')->where('sub_course_id',$id)->get();

        $data['id']=$id;

        $data['sub_course_type']=DB::table('category_master')->where('course_id',$id)->get();

        $data['sub_course_description']=DB::table('sub_course_description')->where('sub_course_id',$id)->get();

        $data['sub_course_banner_image']=DB::table('sub_course_banner_image')->where('page_name',$name)->get();

        return view('admin.view_sub_course',$data);
    }





    public function add_sub_course_banner_image_data($id){

                $sub_course_banner_image=DB::table('sub_course_banner_image')->where('id',$id)->get();

                $data['image']=$sub_course_banner_image[0]->image;

                $data['title']=$sub_course_banner_image[0]->title;

                $data['page_name']=$sub_course_banner_image[0]->page_name;

                $data['course_id']=$sub_course_banner_image[0]->course_id;

                $data['sub_course_id']=$sub_course_banner_image[0]->sub_course_id;

                $data['id']=$sub_course_banner_image[0]->id;


           return view('admin.add_sub_course_banner_image_data',$data);
    }

    public function store_add_sub_course_banner_image_data(Request $request,$id){


            $title=$request->input('title');

            $page_name=$request->input('page_name');

            $course_id=$request->input('course_id');

            $sub_course_id=$request->input('sub_course_id');

            $file=$request->file('image');

            $oldimage=$request->input('oldimage');

            $imagename='';

            if($file !=''){

                $destination_path='uploads';

                $imagename=time().'_'.$file->getClientOriginalName();

                $file->move($destination_path , $imagename);

                if($oldimage !=''){
                    unlink(public_path('/uploads/'.$oldimage));
                }

                DB::table('sub_course_banner_image')->where('id',$id)->update(['image'=>$imagename,]);
            }


            DB::table('sub_course_banner_image')->where('id',$id)->update(['title'=>$title,'page_name'=>$page_name,]);

            return redirect('/admin/view_sub_course/'.$sub_course_id)->with('error','data updated successfully!!!');
        
    }





    public function add_sub_course_detail_data($id){
        
        $sub_course_detail=DB::table('sub_course_detail')->where('id',$id)->get();

        $data['id']=$sub_course_detail[0]->id;

        $data['title1']=$sub_course_detail[0]->title1;

        $data['title2']=$sub_course_detail[0]->title2;

        $data['image']=$sub_course_detail[0]->image;

        $data['course_id']=$sub_course_detail[0]->course_id;

        $data['sub_course_id']=$sub_course_detail[0]->sub_course_id;

        $data['description']=$sub_course_detail[0]->description;

        return view('admin.add_sub_course_detail_data',$data);
    }


    public function store_add_sub_course_detail_data(Request $request,$id){

        $validated=$request->validate([
            'title1'=>'required',
            'title2'=>'required',
            'description'=>'required',
        ]);

        $title1=$request->input('title1');

        $title2=$request->input('title2');

        $description=$request->input('description');

        $course_id=$request->input('course_id');

        $sub_course_id=$request->input('sub_course_id');

        $file=$request->file('image');

        $oldimage=$request->input('oldimage');

        $imagename='';

        if($file !=''){

            $destination_path='uploads';

            $imagename=time().'_'.$file->getClientOriginalName();

            $file->move($destination_path , $imagename);

            if($oldimage !=''){
                unlink(public_path('/uploads/'.$oldimage));
            }

            DB::table('sub_course_detail')->where('id',$id)->update(['image'=>$imagename,]);
        }
            
        DB::table('sub_course_detail')->where('id',$id)->update(['title1'=>$title1 ,'title2'=>$title2 ,'description'=>$description ,]);

        return redirect('/admin/view_sub_course/'.$sub_course_id)->with('error','data updated successfully!!');
        
    }




    public function delete_sub_course_type($id){

        $sub_course_banner_image=DB::table('sub_course_banner_image')->where('sub_course_id',$id)->get();

        $image1=$sub_course_banner_image[0]->image;

        if($image1 !=''){
            unlink(public_path('/uploads/'.$image1));
        }



        $sub_course_detail=DB::table('sub_course_detail')->where('sub_course_id',$id)->get();

        $image2=$sub_course_detail[0]->image;

        if($image2 !=''){
            unlink(public_path('/uploads/'.$image2));
        }

        $sub_course_description=DB::table('sub_course_description')->where('sub_course_id',$id)->get();

        $image3=$sub_course_description[0]->image;

        if($image3 !=''){
            unlink(public_path('/uploads/'.$image3));
        }
        

        DB::table('sub_course_banner_image')->where('sub_course_id',$id)->delete();

        DB::table('sub_course_detail')->where('sub_course_id',$id)->delete();

        DB::table('sub_course_des')->where('sub_course_id',$id)->delete();

        DB::table('sub_course_description')->where('sub_course_id',$id)->delete();

        DB::table('category_master')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }




    public function add_sub_course_des_data($id){
        
        $sub_course_des=DB::table('sub_course_des')->where('id',$id)->get();

        $data['id']=$sub_course_des[0]->id;

        $data['title']=$sub_course_des[0]->title;

        $data['course_id']=$sub_course_des[0]->course_id;

        $data['sub_course_id']=$sub_course_des[0]->sub_course_id;

        $data['description']=$sub_course_des[0]->description;

        return view('admin.add_sub_course_des_data',$data);
    }


    public function store_add_sub_course_des_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);

        $title=$request->input('title');

        $description=$request->input('description');

        $course_id=$request->input('course_id');

        $sub_course_id=$request->input('sub_course_id');        
            
        DB::table('sub_course_des')->where('id',$id)->update(['title'=>$title ,'description'=>$description ,]);

        return redirect('/admin/view_sub_course/'.$sub_course_id)->with('error','data updated successfully!!');
        
    }







    /*New      New      New      New      New      New      New      New      New      New      New      New      */ 





    public function add_course_description_data($id){
        
        $course_description=DB::table('course_description')->where('id',$id)->get();

        $data['id']=$course_description[0]->id;

        $data['image']=$course_description[0]->image;

        $data['course_id']=$course_description[0]->course_id;

        $data['description']=$course_description[0]->description;

        return view('admin.add_course_description_data',$data);
    }


    public function store_add_course_description_data(Request $request,$id){

        $validated=$request->validate([
            'description'=>'required',
        ]);

        $description=$request->input('description');

        $course_id=$request->input('course_id');

        $file=$request->file('image');

        $oldimage=$request->input('oldimage');

        $imagename='';

        if($file !=''){

            $destination_path='uploads';

            $imagename=time().'_'.$file->getClientOriginalName();

            $file->move($destination_path , $imagename);

            if($oldimage !=''){
                unlink(public_path('/uploads/'.$oldimage));
            }

            DB::table('course_description')->where('id',$id)->update(['image'=>$imagename,]);
        }
            
        DB::table('course_description')->where('id',$id)->update(['description'=>$description ,]);

        return redirect('/admin/view_course/'.$course_id)->with('error','data updated successfully!!');
        
    }




    public function add_sub_course_description_data($id){
        
        $sub_course_description=DB::table('sub_course_description')->where('id',$id)->get();

        $data['id']=$sub_course_description[0]->id;

        $data['image']=$sub_course_description[0]->image;

        $data['course_id']=$sub_course_description[0]->course_id;

        $data['sub_course_id']=$sub_course_description[0]->sub_course_id;

        $data['description']=$sub_course_description[0]->description;

        return view('admin.add_sub_course_description_data',$data);
    }


    public function store_add_sub_course_description_data(Request $request,$id){

        $validated=$request->validate([
            'description'=>'required',
        ]);

        $description=$request->input('description');

        $course_id=$request->input('course_id');

        $sub_course_id=$request->input('sub_course_id');

        $file=$request->file('image');

        $oldimage=$request->input('oldimage');

        $imagename='';

        if($file !=''){

            $destination_path='uploads';

            $imagename=time().'_'.$file->getClientOriginalName();

            $file->move($destination_path , $imagename);

            if($oldimage !=''){
                unlink(public_path('/uploads/'.$oldimage));
            }

            DB::table('sub_course_description')->where('id',$id)->update(['image'=>$imagename,]);
        }
            
        DB::table('sub_course_description')->where('id',$id)->update(['description'=>$description ,]);

        return redirect('/admin/view_sub_course/'.$sub_course_id)->with('error','data updated successfully!!');
        
    }
    
    
    
    public function change_visibility($id){

        $course=DB::table('category_master')->where('id',$id)->get();

        $active_cat=$course[0]->active_cat;

        if($active_cat == 0){

            DB::table('category_master')->where('id',$id)->update(['active_cat'=>1]);
        }
        else{

            DB::table('category_master')->where('id',$id)->update(['active_cat'=>0]);
        }

         return response()->json([
            'success'=>$active_cat,
        ]);
    }
    
    public function category_master(){

        $data['sub_course_type']=DB::table('category_master')->get();

        return view('admin.category_master',$data);
    }
    


}
