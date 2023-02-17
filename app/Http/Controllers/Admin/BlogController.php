<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Models\Admin;
use DB;

class BlogController extends Controller
{
    public function blog_banner(){

        $blog_banner=DB::table('banner_image')->where('page_name','blog')->get();

        $data['blog_banner']=$blog_banner;

        return view('admin.blog_banner',$data);
    }


    public function blog_detail(){

            $blog_detail=DB::table('blog_detail')->get();

            $data['blog_detail']=$blog_detail;

            return view('admin.blog_detail',$data);
    }



    public function add_blog_detail_data($id){

        if($id==0){

                $data['image']='';
                $data['name']='';
                $data['date']='';
                $data['title']='';
                $data['comment']='';
                $data['description']='';
                $data['inner_image']='';
                $data['detail_description']='';
                

                
                
                $data['id']=0;


        }else{

                $blog_detail=DB::table('blog_detail')->where('id',$id)->get();

                $data['image']=$blog_detail[0]->image;
                $data['name']=$blog_detail[0]->name;
                $data['date']=$blog_detail[0]->date;
                $data['title']=$blog_detail[0]->title;
                $data['comment']=$blog_detail[0]->comment;
                $data['description']=$blog_detail[0]->description;
                $data['inner_image']=$blog_detail[0]->inner_image;
                $data['detail_description']=$blog_detail[0]->detail_description;

                $data['id']=$blog_detail[0]->id;


        } 

           return view('admin.add_blog_detail_data',$data);
    }

    public function store_add_blog_detail_data(Request $request,$id){

        if($id==0){

            $validated=$request->validate([
                'image'=>'required',
                'name'=>'required',
                'inner_image'=>'required',
                'date'=>'required',
                'title'=>'required',
                'comment'=>'required',
                'description'=>'required',
                'detail_description'=>'required',
            ]);

            $name=$request->input('name');

            $date=$request->input('date');

            $comment=$request->input('comment');

            $title=$request->input('title');

            $description=$request->input('description');

            $detail_description=$request->input('detail_description');

            $file=$request->file('image');

            $imagename='';

            if($file !=''){

                $destination_path='uploads';

                $imagename=time().'_'.$file->getClientOriginalName();

                $file->move($destination_path , $imagename);
            }


            $file1=$request->file('inner_image');

            $imagename1='';

            if($file1 !=''){

                $destination_path='uploads';

                $imagename1=time().'_'.$file1->getClientOriginalName();

                $file1->move($destination_path , $imagename1);
            }

            DB::table('blog_detail')->insert(['name'=>$name,'date'=>$date,'title'=>$title,'comment'=>$comment,'description'=>$description,'image'=>$imagename,'inner_image'=>$imagename1,'detail_description'=>$detail_description,]);

            return redirect('/admin/blog_detail')->with('error','data submitted successfully!!!');
        }else{

            $validated=$request->validate([
                'name'=>'required',
                'date'=>'required',
                'title'=>'required',
                'comment'=>'required',
                'description'=>'required',
                'detail_description'=>'required',
            ]);

            $name=$request->input('name');

            $date=$request->input('date');

            $title=$request->input('title');

            $comment=$request->input('comment');

            $description=$request->input('description');

            $detail_description=$request->input('detail_description');

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

                DB::table('blog_detail')->where('id',$id)->update(['image'=>$imagename,]);
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

                DB::table('blog_detail')->where('id',$id)->update(['inner_image'=>$imagename1,]);
            }

            DB::table('blog_detail')->where('id',$id)->update(['name'=>$name,'date'=>$date,'title'=>$title,'comment'=>$comment,'description'=>$description,'detail_description'=>$detail_description,]);

            return redirect('/admin/blog_detail')->with('error','data updated successfully!!!');
        }
    }


    public function delete_blog_detail($id){

        $userdata=DB::table('blog_detail')->where('id', $id)->get();

        $image=$userdata[0]->image;

        if($image !=''){

            unlink(public_path('/uploads/'.$image));
        }

        $inner_image=$userdata[0]->inner_image;

        if($inner_image !=''){

            unlink(public_path('/uploads/'.$inner_image));
        }

        DB::table('blog_detail')->where('id', $id)->delete();

        return response()->json([
         'success' => 'Record has been deleted successfully!'
        ]);

    }



    public function view_blog_detail($id){

        $blog_detail=DB::table('blog_detail')->where('id',$id)->get();

        $data['blog_detail']=$blog_detail;

        return view('admin.view_blog_detail',$data);
    }
}
