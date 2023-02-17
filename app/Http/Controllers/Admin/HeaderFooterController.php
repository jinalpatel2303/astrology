<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Auth;
use App\Models\Admin;
use DB;


class HeaderFooterController extends Controller
{


    public function add_banner_image_data($id){
        
        $banner_image=DB::table('banner_image')->where('id',$id)->get();

        $data['image']=$banner_image[0]->image;

        $data['title']=$banner_image[0]->title;

        $data['page_name']=$banner_image[0]->page_name;

        $data['id']=$banner_image[0]->id;
              

        return view('admin.add_banner_image_data',$data);
    }

    public function store_add_banner_image_data(Request $request,$id){

            $validated=$request->validate([
                'title'=>'required',
            ]);

            $title=$request->input('title');

            $page_name=$request->input('page_name');

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

                DB::table('banner_image')->where('id',$id)->update(['image'=>$imagename,]);
            }

            DB::table('banner_image')->where('id',$id)->update(['title'=>$title,]);


            if($page_name == 'aboutus'){

                return redirect('admin/aboutus_banner')->with('error',' update banner data succcesfully!!!!');
            }

            elseif($page_name == 'courser'){

                return redirect('admin/courser_banner')->with('error',' update banner data succcesfully!!!!');
            }

            elseif($page_name == 'consultation'){

                return redirect('admin/consultation_banner')->with('error',' update banner data succcesfully!!!!');
            }

            elseif($page_name == 'partner'){

                return redirect('admin/partner_banner')->with('error',' update banner data succcesfully!!!!');
            }

            elseif($page_name == 'contact'){

                return redirect('admin/contact_banner')->with('error',' update banner data succcesfully!!!!');
            }

            elseif($page_name == 'host_home'){

                return redirect('admin/host_home_banner')->with('error',' update banner data succcesfully!!!!');
            }

            elseif($page_name == 'blog'){

                return redirect('admin/blog_banner')->with('error',' update banner data succcesfully!!!!');
            }

            elseif($page_name == 'education_partner'){

                return redirect('admin/education_banner')->with('error',' update banner data succcesfully!!!!');
            }

            elseif($page_name == 'education_studentloan'){

                return redirect('admin/education_banner')->with('error',' update banner data succcesfully!!!!');
            }
            elseif($page_name == 'allroom'){

                return redirect('admin/allroom_banner')->with('error',' update banner data succcesfully!!!!');
            }
            elseif($page_name == 'country'){

                return redirect('admin/country_banner')->with('error',' update banner data succcesfully!!!!');
            }
            elseif($page_name == 'student_alumni'){

                return redirect('admin/student_alumni_banner')->with('error',' update banner data succcesfully!!!!');
            }
            else{

                return redirect('admin/product_category_banner')->with('error',' update banner data succcesfully!!!!');              
            }
        
    }



    public function header_offer(){

        $header_offer=DB::table('header_offer')->get();

        $data['header_offer']=$header_offer;

        return view('admin.header_offer',$data);
    }

    public function add_header_offer_data($id){

        
        $header_offer=DB::table('header_offer')->where('id',$id)->get();

        $data['offer']=$header_offer[0]->offer;

        $data['id']=$header_offer[0]->id;
              

        return view('admin.add_header_offer_data',$data);
    }

    public function store_add_header_offer_data(Request $request,$id){

            $validated=$request->validate([
                'offer'=>'required',
            ]);

            $offer=$request->input('offer');

            DB::table('header_offer')->where('id',$id)->update(['offer'=>$offer,]);

            return redirect('/admin/header_offer')->with('error','data updated successfully!!!');
        
    }






    public function header_contact(){

        $header_contact=DB::table('header_contact')->get();

        $data['header_contact']=$header_contact;

        return view('admin.header_contact',$data);
    }

    public function add_header_contact_data($id){

        
        $header_contact=DB::table('header_contact')->where('id',$id)->get();

        $data['mobile_no']=$header_contact[0]->mobile_no;

        $data['email']=$header_contact[0]->email;

        $data['id']=$header_contact[0]->id;
              

        return view('admin.add_header_contact_data',$data);
    }

    public function store_add_header_contact_data(Request $request,$id){

            $validated=$request->validate([
                'mobile_no'=>'required',
                'email'=>'required|email',
            ]);

            $mobile_no=$request->input('mobile_no');

            $email=$request->input('email');

            DB::table('header_contact')->where('id',$id)->update(['mobile_no'=>$mobile_no,'email'=>$email,]);

            return redirect('/admin/header_contact')->with('error','data updated successfully!!!');
        
    }


    public function footer_description(){

        $footer_description=DB::table('footer_description')->get();

        $data['footer_description']=$footer_description;

        return view('admin.footer_description',$data);
    }

    public function add_footer_description_data($id){

        
        $footer_description=DB::table('footer_description')->where('id',$id)->get();

        $data['description']=$footer_description[0]->description;

        $data['id']=$footer_description[0]->id;
              

        return view('admin.add_footer_description_data',$data);
    }

    public function store_add_footer_description_data(Request $request,$id){

            $validated=$request->validate([
                'description'=>'required',
            ]);

            $description=$request->input('description');

            DB::table('footer_description')->where('id',$id)->update(['description'=>$description,]);

            return redirect('/admin/footer_description')->with('error','data updated successfully!!!');
        
    }



    public function social_links(){

        $social_links=DB::table('social_links')->get();

        $data['social_links']=$social_links;

        return view('admin.social_links',$data);
    }

    public function add_social_links_data($id){

        
        $social_links=DB::table('social_links')->where('id',$id)->get();

        $data['facebook_url']=$social_links[0]->facebook_url;

        $data['twitter_url']=$social_links[0]->twitter_url;

        $data['linkedin_url']=$social_links[0]->linkedin_url;

        $data['instagram_url']=$social_links[0]->instagram_url;

        $data['id']=$social_links[0]->id;
              

        return view('admin.add_social_links_data',$data);
    }

    public function store_add_social_links_data(Request $request,$id){

            $facebook_url=$request->input('facebook_url');
            $twitter_url=$request->input('twitter_url');
            $linkedin_url=$request->input('linkedin_url');
            $instagram_url=$request->input('instagram_url');

            DB::table('social_links')->where('id',$id)->update(['facebook_url'=>$facebook_url,'twitter_url'=>$twitter_url,'linkedin_url'=>$linkedin_url,'instagram_url'=>$instagram_url,]);

            return redirect('/admin/social_links')->with('error','data updated successfully!!!');
        
    }
}
