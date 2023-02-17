<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Models\Admin;
use DB;

class ContactusController extends Controller
{
    public function contact_banner(){

        $contact_banner=DB::table('banner_image')->where('page_name','contact')->get();

        $data['contact_banner']=$contact_banner;

        return view('admin.contact_banner',$data);
    }




    public function contact_title(){

        $contact_title_description=DB::table('contact_title_description')->get();

        $data['contact_title_description']=$contact_title_description;

        return view('admin.contact_title',$data);
    }


    public function update_contact_title_description_data($id){
        
            $contact_title_description=DB::table('contact_title_description')->where('id',$id)->get();

            $data['id']=$contact_title_description[0]->id;

            $data['sub_title']=$contact_title_description[0]->sub_title;

            $data['title']=$contact_title_description[0]->title;

            $data['form_title']=$contact_title_description[0]->form_title;

            $data['location']=$contact_title_description[0]->location;

            $data['email']=$contact_title_description[0]->email; 

            $data['phone_no']=$contact_title_description[0]->phone_no;       

        return view('admin.update_contact_title_description_data',$data);
    }


    public function store_update_contact_title_description_data(Request $request,$id){

        $validated=$request->validate([
            'sub_title'=>'required',
            'title'=>'required',
            'form_title'=>'required',
            'location'=>'required',
            'email'=>'required|email',
            'phone_no'=>'required',
        ]);


            $sub_title=$request->input('sub_title');

            $title=$request->input('title');

            $form_title=$request->input('form_title');

            $location=$request->input('location');

            $email=$request->input('email');

            $phone_no=$request->input('phone_no');
            
            DB::table('contact_title_description')->where('id',$id)->update(['form_title'=>$form_title ,'email'=>$email ,'phone_no'=>$phone_no ,'location'=>$location ,'sub_title'=>$sub_title ,'title'=>$title ]);

            return redirect('/admin/contact_title')->with('error','data updated successfully!!');
        
    }

}
