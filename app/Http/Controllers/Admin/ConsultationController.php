<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Models\Admin;
use DB;

class ConsultationController extends Controller
{
    public function consultation_banner(){

        $consultation_banner=DB::table('banner_image')->where('page_name','consultation')->get();

        $data['consultation_banner']=$consultation_banner;

        return view('admin.consultation_banner',$data);
    }


    public function delete_technology($id){

         DB::table('expertise_list')->where('id', $id)->delete();

             return response()->json([
            'success' => 'Record has been deleted successfully!'
            ]);

       }



    public function our_astrologer(){

        $our_astrologer=DB::table('our_astrologer')->get();

        $data['our_astrologer']=$our_astrologer;

        $data['expertise_list']=DB::table('expertise_list')->get();

        return view('admin.our_astrologer',$data);
    }


    public function add_our_astrologer_data($id){
        
        if($id==0){

            $data['image']='';

            $data['title']='';

            $data['description']='';

            $data['experience']='';

            $data['price']='';

            $data['name']='';

            $data['id']=$id;

            $data['expertise_list']=[];
        }
        else{

            $our_astrologer=DB::table('our_astrologer')->where('id',$id)->get();

            $data['id']=$our_astrologer[0]->id;

            $data['image']=$our_astrologer[0]->image;

            $data['title']=$our_astrologer[0]->title;

            $data['experience']=$our_astrologer[0]->experience;

            $data['price']=$our_astrologer[0]->price;

            $data['name']=$our_astrologer[0]->name;

            $data['description']=$our_astrologer[0]->description;

            $data['expertise_list']=DB::table('expertise_list')->where('list_id',$id)->get();
        }

        return view('admin.add_our_astrologer_data',$data);
    }


    public function store_add_our_astrologer_data(Request $request,$id){

        if($id ==0){

            $validated=$request->validate([
                'image'=>'required',
                'title'=>'required',
                'experience'=>'required',
                'price'=>'required',
                'name'=>'required',
                'description'=>'required',
            ]);

            $title=$request->input('title');

            $experience=$request->input('experience');

            $price=$request->input('price');

            $name=$request->input('name');

            $description=$request->input('description');

            $file=$request->file('image');

            $imagename='';

            if($file !=''){

                $destination_path='uploads';

                $imagename=time().'_'.$file->getClientOriginalName();

                $file->move($destination_path,$imagename);

            }

            DB::table('our_astrologer')->insert(['image'=>$imagename,'title'=>$title,'price'=>$price , 'description'=>$description ,'experience'=>$experience,'name'=>$name]);


            $list_id=DB::table('our_astrologer')->max('id');

            $expertise=$request->input('expertise');

            $expertise1 = explode(",", $expertise);

                 if($expertise !=''){

                    foreach ($expertise1 as $key =>$l) {

                        DB::table('expertise_list')->insert(['expertise'=>$l, 'list_id'=>$list_id ,]);
            
                }
            }

            return redirect('/admin/our_astrologer')->with('error','data submitted successfully!!');
        }

        else{

            $validated=$request->validate([
                'title'=>'required',
                'experience'=>'required',
                'price'=>'required',
                'name'=>'required',
                'description'=>'required',
            ]);

            $title=$request->input('title');

            $experience=$request->input('experience');

            $price=$request->input('price');

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

                DB::table('our_astrologer')->where('id',$id)->update(['image'=>$imagename ]);

            }

            
            DB::table('our_astrologer')->where('id',$id)->update(['title'=>$title , 'description'=>$description ,'price'=>$price ,'experience'=>$experience,'name'=>$name]);



            $list_id=DB::table('our_astrologer')->max('id');

            $expertise=$request->input('expertise');

            $expertise1 = explode(",", $expertise);

                 if($expertise !=''){

                    foreach ($expertise1 as $key =>$l) {

                        DB::table('expertise_list')->insert(['expertise'=>$l, 'list_id'=>$list_id ,]);
            
                }
            }

            return redirect('/admin/our_astrologer')->with('error','data updated successfully!!');
        }
    }

    

    public function delete_our_astrologer($id){

        $userdata=DB::table('our_astrologer')->where('id',$id)->get();

        $image=$userdata[0]->image;

        if($image !=''){

            unlink(public_path('/uploads/'.$image));
        }

        DB::table('expertise_list')->where('list_id',$id)->delete();

        DB::table('our_astrologer')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }
}
