<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Models\Admin;
use DB;

class HomeController extends Controller
{
    public function home_banner(){

        $home_banner=DB::table('home_banner')->get();

        $data['home_banner']=$home_banner;

        return view('admin.home_banner',$data);
    }

    public function add_home_banner_data($id){

        if($id==0){

                $data['image']='';
                $data['title1']='';
                $data['title2']='';
                $data['title3']='';
                $data['description']='';
                $data['id']=0;

              }else{

                $home_banner=DB::table('home_banner')->where('id',$id)->get();

                $data['image']=$home_banner[0]->image;
                $data['title1']=$home_banner[0]->title1;
                $data['title2']=$home_banner[0]->title2;
                $data['title3']=$home_banner[0]->title3;
                $data['description']=$home_banner[0]->description;

                $data['id']=$home_banner[0]->id;
              } 

           return view('admin.add_home_banner_data',$data);
    }

    public function store_add_home_banner_data(Request $request,$id){


        if($id==0){

            $validated=$request->validate([
                'title1'=>'required',
                'title2'=>'required',
                'description'=>'required',
            ]);

            $title1=$request->input('title1');

            $title2=$request->input('title2');

            $title3=$request->input('title3');

            $description=$request->input('description');

            $file=$request->file('image');

            $imagename='';

            if($file){

                $destination_path='uploads';

                $imagename=time().'_'.$file->getClientOriginalName();

                $file->move($destination_path,$imagename);
            }

            DB::table('home_banner')->insert(['image'=>$imagename,'title1'=>$title1,'title2'=>$title2,'title3'=>$title3,'description'=>$description,]);

            return redirect('/admin/home_banner')->with('error','data submitted successfully!!!');
        }else{

            $validated=$request->validate([
                'title1'=>'required',
                'title2'=>'required',
                'description'=>'required',
            ]);

            $title1=$request->input('title1');

            $title2=$request->input('title2');

            $title3=$request->input('title3');

            $description=$request->input('description');

            $file=$request->file('image');

            $oldimage=$request->input('oldimage');

            $imagename='';

            if($file){

                $destination_path='uploads';

                $imagename=time().'_'.$file->getClientOriginalName();

                $file->move($destination_path,$imagename);

                if($oldimage){

                    unlink(public_path('/uploads/'.$oldimage));
                }

                DB::table('home_banner')->where('id',$id)->update(['image'=>$imagename]);
            }

            DB::table('home_banner')->where('id',$id)->update(['title1'=>$title1,'title2'=>$title2,'title3'=>$title3,'description'=>$description]);

            return redirect('/admin/home_banner')->with('error','data updated successfully!!!');
        }
    }


    public function delete_home_banner($id){

        $userdata=DB::table('home_banner')->where('id', $id)->get();

        $image=$userdata[0]->image;

        if($image){
            unlink(public_path('/uploads/'.$image));
        }

        DB::table('home_banner')->where('id', $id)->delete();

        return response()->json([
         'success' => 'Record has been deleted successfully!'
        ]);

    }






    public function home_about(){

        $home_about=DB::table('home_about')->get();

        $data['home_about']=$home_about;

        $home_about_description=DB::table('home_about_description')->get();

        $data['home_about_description']=$home_about_description;

        return view('admin.home_about',$data);
    }


    public function update_home_about_description_data($id){
        
            $home_about_description=DB::table('home_about_description')->where('id',$id)->get();

            $data['id']=$home_about_description[0]->id;

            $data['title']=$home_about_description[0]->title;

            $data['description']=$home_about_description[0]->description;        

        return view('admin.update_home_about_description_data',$data);
    }


    public function store_update_home_about_description_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);


            $title=$request->input('title');

            $description=$request->input('description');
            
            DB::table('home_about_description')->where('id',$id)->update(['description'=>$description ,'title'=>$title ]);

            return redirect('/admin/home_about')->with('error','data updated successfully!!');
        
    }


    public function add_home_about_data($id){
        
        if($id==0){

            $data['image']='';

            $data['image1']='';

            $data['title']='';

            $data['description']='';

            $data['count']='';

            $data['count_name']='';

            $data['id']=$id;
        }
        else{

            $home_about=DB::table('home_about')->where('id',$id)->get();

            $data['id']=$home_about[0]->id;

            $data['image']=$home_about[0]->image;

            $data['image1']=$home_about[0]->image1;

            $data['title']=$home_about[0]->title;

            $data['count']=$home_about[0]->count;

            $data['count_name']=$home_about[0]->count_name;

            $data['description']=$home_about[0]->description;
        }

        return view('admin.add_home_about_data',$data);
    }


    public function store_add_home_about_data(Request $request,$id){

        if($id ==0){

            $validated=$request->validate([
                'image'=>'required',
                'image1'=>'required',
                'title'=>'required',
                'count'=>'required',
                'count_name'=>'required',
                'description'=>'required',
            ]);

            $title=$request->input('title');

            $count=$request->input('count');

            $count_name=$request->input('count_name');

            $description=$request->input('description');

            $file=$request->file('image');

            $imagename='';

            if($file !=''){

                $destination_path='uploads';

                $imagename=time().'_'.$file->getClientOriginalName();

                $file->move($destination_path,$imagename);

            }

            $file1=$request->file('image1');

            $imagename1='';

            if($file1 !=''){

                $destination_path='uploads';

                $imagename1=time().'_'.$file1->getClientOriginalName();

                $file1->move($destination_path,$imagename1);

            }

            DB::table('home_about')->insert(['image'=>$imagename,'image1'=>$imagename1,'title'=>$title , 'description'=>$description ,'count'=>$count,'count_name'=>$count_name]);

            return redirect('/admin/home_about')->with('error','data submitted successfully!!');
        }

        else{

            $validated=$request->validate([
                'title'=>'required',
                'count'=>'required',
                'count_name'=>'required',
                'description'=>'required',
            ]);

            $title=$request->input('title');

            $count=$request->input('count');

            $count_name=$request->input('count_name');

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

                DB::table('home_about')->where('id',$id)->update(['image'=>$imagename ]);

            }



            $file1=$request->file('image1');

            $oldimage1=$request->input('oldimage1');

            $imagename1='';

            if($file1 !=''){

                $destination_path='uploads';

                $imagename1=time().'_'.$file1->getClientOriginalName();

                $file1->move($destination_path,$imagename1);

                if($oldimage1 !=''){

                    unlink(public_path('/uploads/'.$oldimage1));
                }

                DB::table('home_about')->where('id',$id)->update(['image1'=>$imagename1 ]);

            }
            
            DB::table('home_about')->where('id',$id)->update(['title'=>$title , 'description'=>$description ,'count'=>$count,'count_name'=>$count_name]);

            return redirect('/admin/home_about')->with('error','data updated successfully!!');
        }
    }

    

    public function delete_home_about($id){

        $userdata=DB::table('home_about')->where('id',$id)->get();

        $image=$userdata[0]->image;

        if($image !=''){

            unlink(public_path('/uploads/'.$image));
        }

        $image1=$userdata[0]->image1;

        if($image1 !=''){

            unlink(public_path('/uploads/'.$image1));
        }

        DB::table('home_about')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }







    public function home_blog(){

        $home_blog=DB::table('home_blog')->get();

        $data['home_blog']=$home_blog;

        $home_blog_description=DB::table('home_blog_description')->get();

        $data['home_blog_description']=$home_blog_description;

        return view('admin.home_blog',$data);
    }


    public function update_home_blog_description_data($id){
        
            $home_blog_description=DB::table('home_blog_description')->where('id',$id)->get();

            $data['id']=$home_blog_description[0]->id;

            $data['title']=$home_blog_description[0]->title;

            $data['description']=$home_blog_description[0]->description;        

        return view('admin.update_home_blog_description_data',$data);
    }


    public function store_update_home_blog_description_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);


            $title=$request->input('title');

            $description=$request->input('description');
            
            DB::table('home_blog_description')->where('id',$id)->update(['description'=>$description ,'title'=>$title ]);

            return redirect('/admin/home_blog')->with('error','data updated successfully!!');
        
    }


    public function add_home_blog_data($id){
        
        if($id==0){

            $data['image']='';

            $data['title']='';

            $data['description']='';

            $data['date']='';

            $data['name']='';

            $data['id']=$id;
        }
        else{

            $home_blog=DB::table('home_blog')->where('id',$id)->get();

            $data['id']=$home_blog[0]->id;

            $data['image']=$home_blog[0]->image;

            $data['title']=$home_blog[0]->title;

            $data['date']=$home_blog[0]->date;

            $data['name']=$home_blog[0]->name;

            $data['description']=$home_blog[0]->description;
        }

        return view('admin.add_home_blog_data',$data);
    }


    public function store_add_home_blog_data(Request $request,$id){

        if($id ==0){

            $validated=$request->validate([
                'image'=>'required',
                'title'=>'required',
                'date'=>'required',
                'name'=>'required',
                'description'=>'required',
            ]);

            $title=$request->input('title');

            $date=$request->input('date');

            $name=$request->input('name');

            $description=$request->input('description');

            $file=$request->file('image');

            $imagename='';

            if($file !=''){

                $destination_path='uploads';

                $imagename=time().'_'.$file->getClientOriginalName();

                $file->move($destination_path,$imagename);

            }

            
            DB::table('home_blog')->insert(['image'=>$imagename,'title'=>$title , 'description'=>$description ,'date'=>$date,'name'=>$name]);

            return redirect('/admin/home_blog')->with('error','data submitted successfully!!');
        }

        else{

            $validated=$request->validate([
                'title'=>'required',
                'date'=>'required',
                'name'=>'required',
                'description'=>'required',
            ]);

            $title=$request->input('title');

            $date=$request->input('date');

            $name=$request->input('name');

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

                DB::table('home_blog')->where('id',$id)->update(['image'=>$imagename ]);

            }

            DB::table('home_blog')->where('id',$id)->update(['title'=>$title , 'description'=>$description ,'date'=>$date,'name'=>$name]);

            return redirect('/admin/home_blog')->with('error','data updated successfully!!');
        }
    }

    

    public function delete_home_blog($id){

        $userdata=DB::table('home_blog')->where('id',$id)->get();

        $image=$userdata[0]->image;

        if($image !=''){

            unlink(public_path('/uploads/'.$image));
        }

        DB::table('home_blog')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }








    public function home_faq(){

        $home_faq=DB::table('home_faq')->get();

        $data['home_faq']=$home_faq;

        $home_faq_description=DB::table('home_faq_description')->get();

        $data['home_faq_description']=$home_faq_description;

        return view('admin.home_faq',$data);
    }


    public function update_home_faq_description_data($id){
        
            $home_faq_description=DB::table('home_faq_description')->where('id',$id)->get();

            $data['id']=$home_faq_description[0]->id;

            $data['image']=$home_faq_description[0]->image;

            $data['bg_image']=$home_faq_description[0]->bg_image;        

        return view('admin.update_home_faq_description_data',$data);
    }


    public function store_update_home_faq_description_data(Request $request,$id){

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

                DB::table('home_faq_description')->where('id',$id)->update(['image'=>$imagename ]);

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

                DB::table('home_faq_description')->where('id',$id)->update(['bg_image'=>$bg_imagename ]);

            }

            return redirect('/admin/home_faq')->with('error','data updated successfully!!');
        
    }


    public function add_home_faq_data($id){
        
        if($id==0){

            $data['question']='';

            $data['answer']='';
            
            $data['link']='';

            $data['id']=$id;
        }
        else{

            $home_faq=DB::table('home_faq')->where('id',$id)->get();

            $data['id']=$home_faq[0]->id;

            $data['question']=$home_faq[0]->question;

            $data['answer']=$home_faq[0]->answer;
            
            $data['link']=$home_faq[0]->link;
        }

        return view('admin.add_home_faq_data',$data);
    }


    public function store_add_home_faq_data(Request $request,$id){

        if($id ==0){

            $validated=$request->validate([
                'question'=>'required',
                'answer'=>'required',
                'link'=>'required',
            ]);

            $question=$request->input('question');

            $answer=$request->input('answer');
            
            $link=$request->input('link');
            
            DB::table('home_faq')->insert(['question'=>$question , 'answer'=>$answer ,'link'=>$link ,]);

            return redirect('/admin/home_faq')->with('error','data submitted successfully!!');
        }

        else{

            $validated=$request->validate([
                'question'=>'required',
                'answer'=>'required',
                'link'=>'required',
            ]);

            $question=$request->input('question');

            $answer=$request->input('answer');
            
            $link=$request->input('link');

            DB::table('home_faq')->where('id',$id)->update(['question'=>$question , 'answer'=>$answer ,'link'=>$link ,]);

            return redirect('/admin/home_faq')->with('error','data updated successfully!!');
        }
    }

    

    public function delete_home_faq($id){

        DB::table('home_faq')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }




    public function home_demo(){

        $home_demo=DB::table('home_demo')->get();

        $data['home_demo']=$home_demo;

        return view('admin.home_demo',$data);
    }

    public function add_home_demo_data($id){
        
        if($id==0){

            $data['image']='';

            $data['title1']='';

            $data['title2']='';

            $data['title3']='';

            $data['id']=$id;
        }
        else{

            $home_demo=DB::table('home_demo')->where('id',$id)->get();

            $data['id']=$home_demo[0]->id;

            $data['image']=$home_demo[0]->image;

            $data['title1']=$home_demo[0]->title1;

            $data['title3']=$home_demo[0]->title3;

            $data['title2']=$home_demo[0]->title2;
        }

        return view('admin.add_home_demo_data',$data);
    }


    public function store_add_home_demo_data(Request $request,$id){

        if($id ==0){

            $validated=$request->validate([
                'image'=>'required',
                'title1'=>'required',
                'title3'=>'required',
                'title2'=>'required',
            ]);

            $title1=$request->input('title1');

            $title3=$request->input('title3');

            $title2=$request->input('title2');

            $file=$request->file('image');

            $imagename='';

            if($file !=''){

                $destination_path='uploads';

                $imagename=time().'_'.$file->getClientOriginalName();

                $file->move($destination_path,$imagename);

            }

            
            DB::table('home_demo')->insert(['image'=>$imagename,'title1'=>$title1 , 'title2'=>$title2 ,'title3'=>$title3]);

            return redirect('/admin/home_demo')->with('error','data submitted successfully!!');
        }

        else{

            $validated=$request->validate([
                'title1'=>'required',
                'title3'=>'required',
                'title2'=>'required',
            ]);

            $title1=$request->input('title1');

            $title3=$request->input('title3');

            $title2=$request->input('title2');

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

                DB::table('home_demo')->where('id',$id)->update(['image'=>$imagename ]);

            }

            DB::table('home_demo')->where('id',$id)->update(['title1'=>$title1 , 'title2'=>$title2 ,'title3'=>$title3,]);

            return redirect('/admin/home_demo')->with('error','data updated successfully!!');
        }
    }







    public function home_testimonial(){

        $home_testimonial=DB::table('home_testimonial')->get();

        $data['home_testimonial']=$home_testimonial;

        $home_testimonial_description=DB::table('home_testimonial_description')->get();

        $data['home_testimonial_description']=$home_testimonial_description;

        return view('admin.home_testimonial',$data);
    }


    public function update_home_testimonial_description_data($id){
        
            $home_testimonial_description=DB::table('home_testimonial_description')->where('id',$id)->get();

            $data['id']=$home_testimonial_description[0]->id;

            $data['title']=$home_testimonial_description[0]->title;

            $data['description']=$home_testimonial_description[0]->description;        

        return view('admin.update_home_testimonial_description_data',$data);
    }


    public function store_update_home_testimonial_description_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);


            $title=$request->input('title');

            $description=$request->input('description');
            
            DB::table('home_testimonial_description')->where('id',$id)->update(['description'=>$description ,'title'=>$title ]);

            return redirect('/admin/home_testimonial')->with('error','data updated successfully!!');
        
    }


    public function add_home_testimonial_data($id){
        
        if($id==0){

            $data['image']='';

            $data['address']='';

            $data['description']='';

            $data['name']='';

            $data['id']=$id;
        }
        else{

            $home_testimonial=DB::table('home_testimonial')->where('id',$id)->get();

            $data['id']=$home_testimonial[0]->id;

            $data['image']=$home_testimonial[0]->image;

            $data['address']=$home_testimonial[0]->address;

            $data['name']=$home_testimonial[0]->name;

            $data['description']=$home_testimonial[0]->description;
        }

        return view('admin.add_home_testimonial_data',$data);
    }


    public function store_add_home_testimonial_data(Request $request,$id){

        if($id ==0){

            $validated=$request->validate([
                'address'=>'required',
                'name'=>'required',
                'description'=>'required',
            ]);

            $address=$request->input('address');

            $name=$request->input('name');

            $description=$request->input('description');

            $file=$request->file('image');

            $imagename='';

            if($file !=''){

                $destination_path='uploads';

                $imagename=time().'_'.$file->getClientOriginalName();

                $file->move($destination_path,$imagename);

            }

            
            DB::table('home_testimonial')->insert(['image'=>$imagename,'address'=>$address , 'description'=>$description ,'name'=>$name]);

            return redirect('/admin/home_testimonial')->with('error','data submitted successfully!!');
        }

        else{

            $validated=$request->validate([
                'address'=>'required',
                'name'=>'required',
                'description'=>'required',
            ]);

            $address=$request->input('address');

            $name=$request->input('name');

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

                DB::table('home_testimonial')->where('id',$id)->update(['image'=>$imagename ]);

            }

            DB::table('home_testimonial')->where('id',$id)->update(['address'=>$address , 'description'=>$description ,'name'=>$name]);

            return redirect('/admin/home_testimonial')->with('error','data updated successfully!!');
        }
    }

    

    public function delete_home_testimonial($id){

        $userdata=DB::table('home_testimonial')->where('id',$id)->get();

        $image=$userdata[0]->image;

        if($image !=''){

            unlink(public_path('/uploads/'.$image));
        }

        DB::table('home_testimonial')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }
    
    
    
    





    public function contact_admin_data(){

        $data['contact_admin_data']=DB::table('contact_admin')->get();

        return view('admin.contact_admin_data' , $data);
    }

    public function delete_contact_admin_data($id){

        DB::table('contact_admin')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }
    
    public function view_contact_admin_data($id){

        $data['contact_admin_data']=DB::table('contact_admin')->where('id',$id)->get();

        return view('admin.view_contact_admin_data' , $data);
    }
    
    
    
    
    
    
    
    
    /*New     New     New     New     New     New     New     New     New     New     */


    public function home_advertise(){

        $home_advertise=DB::table('home_advertise')->get();

        $data['home_advertise']=$home_advertise;

        return view('admin.home_advertise',$data);
    }


    public function add_home_advertise_data($id){
        
        if($id==0){

            $data['advertise']='';

            $data['id']=$id;
        }
        else{

            $home_advertise=DB::table('home_advertise')->where('id',$id)->get();

            $data['id']=$home_advertise[0]->id;

            $data['advertise']=$home_advertise[0]->advertise;

        }

        return view('admin.add_home_advertise_data',$data);
    }


    public function store_add_home_advertise_data(Request $request,$id){

        if($id ==0){

            $validated=$request->validate([
                'advertise'=>'required',
            ]);

            $advertise=$request->input('advertise');
            
            DB::table('home_advertise')->insert(['advertise'=>$advertise ,]);

            return redirect('/admin/home_advertise')->with('error','data submitted successfully!!');
        }

        else{

            $validated=$request->validate([
                'advertise'=>'required',
            ]);

            $advertise=$request->input('advertise');

            DB::table('home_advertise')->where('id',$id)->update(['advertise'=>$advertise ,]);

            return redirect('/admin/home_advertise')->with('error','data updated successfully!!');
        }
    }

    

    public function delete_home_advertise($id){

        DB::table('home_advertise')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }
    
    
    
    
    
    
    public function change_status_testi($id){

        $home_testimonial=DB::table('home_testimonial')->where('id',$id)->get();

        $status=$home_testimonial[0]->status;

        if($status == 0){

            DB::table('home_testimonial')->where('id',$id)->update(['status'=>1]);
        }
        else{

            DB::table('home_testimonial')->where('id',$id)->update(['status'=>0]);
        }

         return response()->json([
            'success'=>$status,
        ]);
    }
    
    
    
    
    
    
    
}
