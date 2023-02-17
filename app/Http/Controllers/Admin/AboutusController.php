<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Auth;
use App\Models\Admin;
use DB;



class AboutusController extends Controller
{
    public function aboutus_banner(){

        $aboutus_banner=DB::table('banner_image')->where('page_name','aboutus')->get();

        $data['aboutus_banner']=$aboutus_banner;

        return view('admin.aboutus_banner',$data);
    }




    public function aboutus_about(){

        $aboutus_about=DB::table('aboutus_about')->get();

        $data['aboutus_about']=$aboutus_about;

        $aboutus_about_description=DB::table('aboutus_about_description')->get();

        $data['aboutus_about_description']=$aboutus_about_description;

        return view('admin.aboutus_about',$data);
    }


    public function update_aboutus_about_description_data($id){
        
            $aboutus_about_description=DB::table('aboutus_about_description')->where('id',$id)->get();

            $data['id']=$aboutus_about_description[0]->id;

            $data['sub_title']=$aboutus_about_description[0]->sub_title;

            $data['title']=$aboutus_about_description[0]->title;

            $data['description']=$aboutus_about_description[0]->description;        

        return view('admin.update_aboutus_about_description_data',$data);
    }


    public function store_update_aboutus_about_description_data(Request $request,$id){

        $validated=$request->validate([
            'sub_title'=>'required',
            'title'=>'required',
            'description'=>'required',
        ]);


            $sub_title=$request->input('sub_title');

            $title=$request->input('title');

            $description=$request->input('description');
            
            DB::table('aboutus_about_description')->where('id',$id)->update(['description'=>$description ,'sub_title'=>$sub_title ,'title'=>$title ]);

            return redirect('/admin/aboutus_about')->with('error','data updated successfully!!');
        
    }


    public function add_aboutus_about_data($id){
        
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

            $aboutus_about=DB::table('aboutus_about')->where('id',$id)->get();

            $data['id']=$aboutus_about[0]->id;

            $data['image']=$aboutus_about[0]->image;

            $data['image1']=$aboutus_about[0]->image1;

            $data['title']=$aboutus_about[0]->title;

            $data['count']=$aboutus_about[0]->count;

            $data['count_name']=$aboutus_about[0]->count_name;

            $data['description']=$aboutus_about[0]->description;
        }

        return view('admin.add_aboutus_about_data',$data);
    }


    public function store_add_aboutus_about_data(Request $request,$id){

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

            DB::table('aboutus_about')->insert(['image'=>$imagename,'image1'=>$imagename1,'title'=>$title , 'description'=>$description ,'count'=>$count,'count_name'=>$count_name]);

            return redirect('/admin/aboutus_about')->with('error','data submitted successfully!!');
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

                DB::table('aboutus_about')->where('id',$id)->update(['image'=>$imagename ]);

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

                DB::table('aboutus_about')->where('id',$id)->update(['image1'=>$imagename1 ]);

            }
            
            DB::table('aboutus_about')->where('id',$id)->update(['title'=>$title , 'description'=>$description ,'count'=>$count,'count_name'=>$count_name]);

            return redirect('/admin/aboutus_about')->with('error','data updated successfully!!');
        }
    }

    

    public function delete_aboutus_about($id){

        $userdata=DB::table('aboutus_about')->where('id',$id)->get();

        $image=$userdata[0]->image;

        if($image !=''){

            unlink(public_path('/uploads/'.$image));
        }

        $image1=$userdata[0]->image1;

        if($image1 !=''){

            unlink(public_path('/uploads/'.$image1));
        }

        DB::table('aboutus_about')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }






    public function aboutus_occult(){

        $aboutus_occult=DB::table('aboutus_occult')->get();

        $data['aboutus_occult']=$aboutus_occult;

        return view('admin.aboutus_occult',$data);
    }

    public function add_aboutus_occult_data($id){
        
        if($id==0){

            $data['title']='';

            $data['description']='';

            $data['image']='';

            $data['bg_image']='';

            $data['id']=$id;
        }
        else{

            $aboutus_occult=DB::table('aboutus_occult')->where('id',$id)->get();

            $data['id']=$aboutus_occult[0]->id;

            $data['title']=$aboutus_occult[0]->title;

            $data['image']=$aboutus_occult[0]->image;

            $data['bg_image']=$aboutus_occult[0]->bg_image;

            $data['description']=$aboutus_occult[0]->description;
        }

        return view('admin.add_aboutus_occult_data',$data);
    }


    public function store_add_aboutus_occult_data(Request $request,$id){

        if($id ==0){

            $validated=$request->validate([
                'title'=>'required',
                'description'=>'required',
            ]);

            $title=$request->input('title');

            $description=$request->input('description');

            $file=$request->file('image');
            
            $imagename='';

            if($file !=''){

                $destination_path='uploads';

                $imagename=time().'_'.$file->getClientOriginalName();

                $file->move($destination_path,$imagename);

            }
            
            $file1=$request->file('bg_image');

            $bg_imagename='';

            if($file1 !=''){

                $destination_path='uploads';

                $bg_imagename=time().'_'.$file1->getClientOriginalName();

                $file1->move($destination_path,$bg_imagename);

            }
            
            DB::table('aboutus_occult')->insert(['image'=>$imagename,'bg_image'=>$bg_imagename,'title'=>$title , 'description'=>$description ,]);

            return redirect('/admin/aboutus_occult')->with('error','data submitted successfully!!');
        }

        else{

            $validated=$request->validate([
                'title'=>'required',
                'description'=>'required',
            ]);

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

                DB::table('aboutus_occult')->where('id',$id)->update(['image'=>$imagename ]);

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

                DB::table('aboutus_occult')->where('id',$id)->update(['bg_image'=>$bg_imagename ]);

            }

            DB::table('aboutus_occult')->where('id',$id)->update(['title'=>$title , 'description'=>$description ,]);

            return redirect('/admin/aboutus_occult')->with('error','data updated successfully!!');
        }
    }




    public function aboutus_astronomy(){

        $aboutus_astronomy_description=DB::table('aboutus_astronomy_description')->get();

        $data['aboutus_astronomy_description']=$aboutus_astronomy_description;

        return view('admin.aboutus_astronomy',$data);
    }


    public function update_aboutus_astronomy_description_data($id){
        
            $aboutus_astronomy_description=DB::table('aboutus_astronomy_description')->where('id',$id)->get();

            $data['id']=$aboutus_astronomy_description[0]->id;

            $data['image']=$aboutus_astronomy_description[0]->image;

            $data['image1']=$aboutus_astronomy_description[0]->image1;

            $data['sub_title']=$aboutus_astronomy_description[0]->sub_title;

            $data['title']=$aboutus_astronomy_description[0]->title;

            $data['description']=$aboutus_astronomy_description[0]->description;        

        return view('admin.update_aboutus_astronomy_description_data',$data);
    }


    public function store_update_aboutus_astronomy_description_data(Request $request,$id){

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

                DB::table('aboutus_astronomy_description')->where('id',$id)->update(['image'=>$imagename ]);

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

                DB::table('aboutus_astronomy_description')->where('id',$id)->update(['image1'=>$imagename1 ]);

            }
            
            DB::table('aboutus_astronomy_description')->where('id',$id)->update(['description'=>$description ,'sub_title'=>$sub_title ,'title'=>$title ]);

            return redirect('/admin/aboutus_astronomy')->with('error','data updated successfully!!');
        
    }





    public function aboutus_detail(){

        $aboutus_detail=DB::table('aboutus_detail')->get();

        $data['aboutus_detail']=$aboutus_detail;

        return view('admin.aboutus_detail',$data);
    }


    public function add_aboutus_detail_data($id){
        
        if($id==0){

            $data['image']='';

            $data['title']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $aboutus_detail=DB::table('aboutus_detail')->where('id',$id)->get();

            $data['id']=$aboutus_detail[0]->id;

            $data['image']=$aboutus_detail[0]->image;

            $data['title']=$aboutus_detail[0]->title;

            $data['description']=$aboutus_detail[0]->description;
        }

        return view('admin.add_aboutus_detail_data',$data);
    }


    public function store_add_aboutus_detail_data(Request $request,$id){

        if($id ==0){

            $validated=$request->validate([
                'image'=>'required',
                'title'=>'required',
                'description'=>'required',
            ]);

            $title=$request->input('title');

            $description=$request->input('description');

            $file=$request->file('image');

            $imagename='';

            if($file !=''){

                $destination_path='uploads';

                $imagename=time().'_'.$file->getClientOriginalName();

                $file->move($destination_path,$imagename);

            }

            DB::table('aboutus_detail')->insert(['image'=>$imagename,'title'=>$title , 'description'=>$description ,]);

            return redirect('/admin/aboutus_detail')->with('error','data submitted successfully!!');
        }

        else{

            $validated=$request->validate([
                'title'=>'required',
                'description'=>'required',
            ]);

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

                DB::table('aboutus_detail')->where('id',$id)->update(['image'=>$imagename ]);

            }
            
            DB::table('aboutus_detail')->where('id',$id)->update(['title'=>$title , 'description'=>$description ,]);

            return redirect('/admin/aboutus_detail')->with('error','data updated successfully!!');
        }
    }

    

    public function delete_aboutus_detail($id){

        $userdata=DB::table('aboutus_detail')->where('id',$id)->get();

        $image=$userdata[0]->image;

        if($image !=''){

            unlink(public_path('/uploads/'.$image));
        }

        DB::table('aboutus_detail')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }

    
}
