<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin;
use DB;
use App\Models\Buyer;

use App\Http\Controllers\DateTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;


use Redirect;
use App\Http\Controllers\Controller;
use Illuminate\support\facades\Auth;
use Illuminate\support\MessageBag;
use Illuminate\Support\Facades\Mail;
use Illuminate\support\facades\Input;
use Hash;

use Monolog\SignalHandler;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
use Session;


class Home_controller extends Controller
{
    public function index(){

        $data['home_banner']=DB::table('home_banner')->get();

        $data['home_about_description']=DB::table('home_about_description')->get();

        $data['home_about']=DB::table('home_about')->get();

        $data['home_blog_description']=DB::table('home_blog_description')->get();

        $data['blog_detail']=DB::table('blog_detail') ->inRandomOrder()->limit(3)->get();

        $home_faq_description=DB::table('home_faq_description')->get();

        $data['faq_image']=$home_faq_description[0]->image;

        $data['faq_bg_image']=$home_faq_description[0]->bg_image;

        $data['home_faq']=DB::table('home_faq')->get();

        $data['home_demo']=DB::table('home_demo')->get();

        $data['home_testimonial_description']=DB::table('home_testimonial_description')->get();

        $data['home_testimonial']=DB::table('home_testimonial')->where('status',1)->get();

        $data['header_offer']=DB::table('header_offer')->get();

        $data['home_product_des']=DB::table('home_product_des')->get();
        
        $data['home_advertise']=DB::table('home_advertise')->get();

        $data['product']=DB::table('product')->get();

        $data['product_image']=DB::table('product_image')->get();




        /*   Common Data   */

        $data['product_category']=DB::table('product_category')->get();

        $data['admins']=DB::table('admins')->get();

        $data['social_links']=DB::table('social_links')->get();

        $data['footer_description']=DB::table('footer_description')->get();

        $data['course_master']=DB::table('course_master')->get();

        $data['category_master']=DB::table('category_master')->where('active_cat',1)->get();

        $data['mytime'] = Carbon::now();

        $data['blog_detail_footer']=DB::table('blog_detail')->orderBy('date','desc')->get()->take(2);

        return view('index',$data);
    }




    public function about_us(){

        $data['banner_image']=DB::table('banner_image')->where('page_name','aboutus')->get();

        $data['aboutus_about_description']=DB::table('aboutus_about_description')->get();

        $data['aboutus_about']=DB::table('aboutus_about')->get();

        $aboutus_occult=DB::table('aboutus_occult')->get();

        $data['occult_banner']=$aboutus_occult[0]->bg_image;

        $data['aboutus_occult']=DB::table('aboutus_occult')->get();

        $data['aboutus_astronomy_description']=DB::table('aboutus_astronomy_description')->get();

        $data['aboutus_detail']=DB::table('aboutus_detail')->get();

        $data['home_demo']=DB::table('home_demo')->get();



        /*   Common Data   */

        $data['product_category']=DB::table('product_category')->get();

        $data['admins']=DB::table('admins')->get();

        $data['social_links']=DB::table('social_links')->get();

        $data['footer_description']=DB::table('footer_description')->get();

        $data['course_master']=DB::table('course_master')->get();

        $data['category_master']=DB::table('category_master')->where('active_cat',1)->get();

        $data['mytime'] = Carbon::now();

        $data['blog_detail_footer']=DB::table('blog_detail')->orderBy('date','desc')->get()->take(2);

        return view('about_us',$data);
    }




    public function blog(){

        $data['banner_image']=DB::table('banner_image')->where('page_name','blog')->get();

        $data['blog_detail']=DB::table('blog_detail')->paginate(3);

        $data['blog_detail_sb']=DB::table('blog_detail')->orderBy('date','desc')->limit(3)->get();




        /*   Common Data   */

        $data['product_category']=DB::table('product_category')->get();

        $data['admins']=DB::table('admins')->get();

        $data['social_links']=DB::table('social_links')->get();

        $data['footer_description']=DB::table('footer_description')->get();

        $data['course_master']=DB::table('course_master')->get();

        $data['category_master']=DB::table('category_master')->where('active_cat',1)->get();

        $data['mytime'] = Carbon::now();

        $data['blog_detail_footer']=DB::table('blog_detail')->orderBy('date','desc')->get()->take(2);

        return view('blog',$data);
    }

    public function blog_detail($id){

        $data['banner_image']=DB::table('banner_image')->where('page_name','blog')->get();

        $data['blog_detail']=DB::table('blog_detail')->where('id',$id)->get();

        $data['blog_detail_sb']=DB::table('blog_detail')->orderBy('date','desc')->limit(3)->get();



        /*   Common Data   */

        $data['product_category']=DB::table('product_category')->get();

        $data['admins']=DB::table('admins')->get();

        $data['social_links']=DB::table('social_links')->get();

        $data['footer_description']=DB::table('footer_description')->get();

        $data['course_master']=DB::table('course_master')->get();

        $data['category_master']=DB::table('category_master')->where('active_cat',1)->get();

        $data['mytime'] = Carbon::now();

        $data['blog_detail_footer']=DB::table('blog_detail')->orderBy('date','desc')->get()->take(2);

        return view('blog_detail',$data);
    }


    public function search_blog(Request $request){

        $data['banner_image']=DB::table('banner_image')->where('page_name','blog')->get();

        $data['blog_detail_sb']=DB::table('blog_detail')->orderBy('date','desc')->limit(3)->get();



        /*   Common Data   */

        $data['product_category']=DB::table('product_category')->get();

        $data['admins']=DB::table('admins')->get();

        $data['social_links']=DB::table('social_links')->get();

        $data['footer_description']=DB::table('footer_description')->get();

        $data['course_master']=DB::table('course_master')->get();

        $data['category_master']=DB::table('category_master')->where('active_cat',1)->get();

        $data['mytime'] = Carbon::now();

        $data['blog_detail_footer']=DB::table('blog_detail')->orderBy('date','desc')->get()->take(2);

        $search = $request->input('search');
        if($search != ""){

        $blog_detail = DB::table('blog_detail')->where ( 'title', 'LIKE', '%' . $search . '%' )->paginate (3)->setPath ( '' );

        $pagination = $blog_detail->appends ( array (
                    'search' => $search
            ) );

        $data['blog_detail']=$blog_detail;

        if (count ( $blog_detail ) > 0){

            return view ( 'blog',$data )->withQuery ( $search );
            }
        }
        $data['blog_detail']=DB::table('blog_detail')->paginate(3);


        return view ( 'blog' ,$data)->withMessage ( 'No Details found. Try to search again !' );
        
    }




    public function courser_offered(){

        $data['banner_image']=DB::table('banner_image')->where('page_name','courser')->get();

        $data['courser_about_description']=DB::table('courser_about_description')->get();

        $data['courser_about']=DB::table('courser_about')->get();

        $courser_detail_description=DB::table('courser_detail_description')->get();

        $data['detail_image']=$courser_detail_description[0]->image;

        $data['detail_bg_image']=$courser_detail_description[0]->bg_image;

        $data['courser_detail']=DB::table('courser_detail')->get();

        $data['home_demo']=DB::table('home_demo')->get();



        /*   Common Data   */

        $data['product_category']=DB::table('product_category')->get();

        $data['admins']=DB::table('admins')->get();

        $data['social_links']=DB::table('social_links')->get();

        $data['footer_description']=DB::table('footer_description')->get();

        $data['course_master']=DB::table('course_master')->get();

        $data['category_master']=DB::table('category_master')->where('active_cat',1)->get();

        $data['mytime'] = Carbon::now();

        $data['blog_detail_footer']=DB::table('blog_detail')->orderBy('date','desc')->get()->take(2);

        return view('courser_offered',$data);
    }


    public function consultation(){

        $banner_image=DB::table('banner_image')->where('page_name','consultation')->get();

        $our_astrologer=DB::table('our_astrologer')->paginate(6);

        $expertise_list=DB::table('expertise_list')->get();



        /*   Common Data   */

        $product_category=DB::table('product_category')->get();

        $admins=DB::table('admins')->get();

        $social_links=DB::table('social_links')->get();

        $footer_description=DB::table('footer_description')->get();

        $course_master=DB::table('course_master')->get();

        $category_master=DB::table('category_master')->where('active_cat',1)->get();

        $mytime = Carbon::now();

        $blog_detail_footer=DB::table('blog_detail')->orderBy('date','desc')->get()->take(2);

        return view('consultation' ,compact('banner_image','admins','social_links','footer_description','course_master','category_master','mytime','blog_detail_footer','our_astrologer','expertise_list','product_category'))->render();
    }




    public function filter_data(Request $request){

        $banner_image=DB::table('banner_image')->where('page_name','consultation')->get();

        /*   Common Data   */

        $data['product_category']=DB::table('product_category')->get();

        $admins=DB::table('admins')->get();

        $social_links=DB::table('social_links')->get();

        $footer_description=DB::table('footer_description')->get();

        $course_master=DB::table('course_master')->get();

        $category_master=DB::table('category_master')->where('active_cat',1)->get();

        $mytime = Carbon::now();

        $blog_detail_footer=DB::table('blog_detail')->orderBy('date','desc')->get()->take(2);

        

        $filter_data = $request->search_string;
        if($filter_data != ""){

        if($filter_data == 1){

            $our_astrologer = DB::table('our_astrologer')->orderBy('experience', 'desc')->paginate (6)->setPath ( '' );

            $pagination = $our_astrologer->appends ( array (
                    'select_val' => $filter_data
            ) );

            $our_astrologer=$our_astrologer;

            $expertise_list=DB::table('expertise_list')->get();

        }
        elseif($filter_data == 2){

            $our_astrologer = DB::table('our_astrologer')->orderBy('experience')->paginate (6)->setPath ( '' );

            $pagination = $our_astrologer->appends ( array (
                    'select_val' => $filter_data
            ) );

            $our_astrologer=$our_astrologer;

            $expertise_list=DB::table('expertise_list')->get();

        }
        elseif($filter_data == 3){

            $our_astrologer = DB::table('our_astrologer')->orderBy('price', 'desc')->paginate (6)->setPath ( '' );

            $pagination = $our_astrologer->appends ( array (
                    'select_val' => $filter_data
            ) );

            $our_astrologer=$our_astrologer;

            $expertise_list=DB::table('expertise_list')->get();

        }
        elseif($filter_data == 4){

            $our_astrologer = DB::table('our_astrologer')->orderBy('price')->paginate (6)->setPath ( '' );

            $pagination = $our_astrologer->appends ( array (
                    'select_val' => $filter_data
            ) );

            $our_astrologer=$our_astrologer;

            $expertise_list=DB::table('expertise_list')->get();

        }
        else{

            $our_astrologer = DB::table('our_astrologer')->paginate (6)->setPath ( '' );

            $pagination = $our_astrologer->appends ( array (
                    'select_val' => $filter_data
            ) );

            $our_astrologer=$our_astrologer;

            $expertise_list=DB::table('expertise_list')->get();
        }

        

        if (count ( $our_astrologer ) > 0){

            

            return view('consultation_data' ,compact('banner_image','admins','social_links','footer_description','course_master','category_master','mytime','blog_detail_footer','our_astrologer','expertise_list'))->render();
            }
        }

        $expertise_list=DB::table('expertise_list')->get();
        
        $our_astrologer=DB::table('our_astrologer')->paginate(6);


        

            return view('consultation_data' ,compact('banner_image','admins','social_links','footer_description','course_master','category_master','mytime','blog_detail_footer','our_astrologer','expertise_list'))->render();
        
    }


    public function contact_us(){

        $data['banner_image']=DB::table('banner_image')->where('page_name','contact')->get();

        $data['contact_title']=DB::table('contact_title_description')->get();



        /*   Common Data   */

        $data['product_category']=DB::table('product_category')->get();

        $data['admins']=DB::table('admins')->get();

        $data['social_links']=DB::table('social_links')->get();

        $data['footer_description']=DB::table('footer_description')->get();

        $data['course_master']=DB::table('course_master')->get();

        $data['category_master']=DB::table('category_master')->where('active_cat',1)->get();

        $data['mytime'] = Carbon::now();

        $data['blog_detail_footer']=DB::table('blog_detail')->orderBy('date','desc')->get()->take(2);

        return view('contact_us',$data);
    }


    public function login(){

        return view('login');
    }


    public function register(){

        $data['course_master']=DB::table('course_master')->get();

        return view('register',$data);
    }

    public function studentalumni(){
        
        $data['banner_image']=DB::table('banner_image')->where('page_name','student_alumni')->get();

        $data['student_data']=DB::table('student_alumni')->paginate(4);
        
        $data['student_course_list']=DB::table('student_course_list')->join('category_master','category_master.id','student_course_list.sub_category_id')->select('category_master.name as sub_name','student_course_list.studentalumni_id as studentalumni_id')->get();

        /*   Common Data   */

        $data['product_category']=DB::table('product_category')->get();

        $data['admins']=DB::table('admins')->get();

        $data['social_links']=DB::table('social_links')->get();

        $data['footer_description']=DB::table('footer_description')->get();

        $data['course_master']=DB::table('course_master')->get();

        $data['category_master']=DB::table('category_master')->where('active_cat',1)->get();

        $data['mytime'] = Carbon::now();

        $data['blog_detail_footer']=DB::table('blog_detail')->orderBy('date','desc')->get()->take(2);

        return view('studentalumni',$data);
    }





    public function course_detail($id){

        $data['course_banner_image']=DB::table('course_banner_image')->where('course_id',$id)->get();

        $data['course_description']=DB::table('course_description')->where('course_id',$id)->get();

        $data['course_detail']=DB::table('course_detail')->where('course_id',$id)->get();

        $data['home_demo']=DB::table('home_demo')->get();



        /*   Common Data   */

        $data['product_category']=DB::table('product_category')->get();

        $data['admins']=DB::table('admins')->get();

        $data['social_links']=DB::table('social_links')->get();

        $data['footer_description']=DB::table('footer_description')->get();

        $data['course_master']=DB::table('course_master')->get();

        $data['category_master']=DB::table('category_master')->where('active_cat',1)->get();

        $data['mytime'] = Carbon::now();

        $data['blog_detail_footer']=DB::table('blog_detail')->orderBy('date','desc')->get()->take(2);

        return view('course_detail',$data);
    }


    public function sub_course_detail($id){

        $data['sub_course_banner_image']=DB::table('sub_course_banner_image')->where('sub_course_id',$id)->get();

        $data['sub_course_description']=DB::table('sub_course_description')->where('sub_course_id',$id)->get();

        $data['sub_course_detail']=DB::table('sub_course_detail')->where('sub_course_id',$id)->get();

        $data['home_demo']=DB::table('home_demo')->get();



        /*   Common Data   */

        $data['product_category']=DB::table('product_category')->get();

        $data['admins']=DB::table('admins')->get();

        $data['social_links']=DB::table('social_links')->get();

        $data['footer_description']=DB::table('footer_description')->get();

        $data['course_master']=DB::table('course_master')->get();

        $data['category_master']=DB::table('category_master')->where('active_cat',1)->get();

        $data['mytime'] = Carbon::now();

        $data['blog_detail_footer']=DB::table('blog_detail')->orderBy('date','desc')->get()->take(2);

        return view('sub_course_detail',$data);
    }


    public function faq(){

        $data['home_faq']=DB::table('home_faq')->get();

        /*   Common Data   */

        $data['product_category']=DB::table('product_category')->get();

        $data['admins']=DB::table('admins')->get();

        $data['social_links']=DB::table('social_links')->get();

        $data['footer_description']=DB::table('footer_description')->get();

        $data['course_master']=DB::table('course_master')->get();

        $data['category_master']=DB::table('category_master')->where('active_cat',1)->get();

        $data['mytime'] = Carbon::now();

        $data['blog_detail_footer']=DB::table('blog_detail')->orderBy('date','desc')->get()->take(2);

        return view('faq',$data);
    }


    public function review(){

        /*   Common Data   */

        $data['product_category']=DB::table('product_category')->get();

        return view('review');
    }


    public function submit_review(Request $request){

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

        
        DB::table('home_testimonial')->insert(['image'=>$imagename,'address'=>$address , 'description'=>$description ,'name'=>$name,'status'=>0]);

        return redirect('/review')->with('error','data submitted successfully!!');
    }


    public function product($id){

        $product=DB::table('product')->where('category_id',$id)->select("product.*")->orderBy('id','Desc')->paginate(4);

        $product_sub_category=DB::table('product_sub_category')->get();

        $product_image=DB::table('product_image')->get();

        $side_product=DB::table('product')->select("product.*")->orderBy('id','Desc')->take(3)->get();

        $category=DB::table('product_category')->where('id',$id)->get();

        $cat_name = $category[0]->category;

        $banner_image=DB::table('banner_image')->where('page_name',$cat_name)->get();




        /*   Common Data   */

        $product_category=DB::table('product_category')->get();

        $admins=DB::table('admins')->get();

        $social_links=DB::table('social_links')->get();

        $footer_description=DB::table('footer_description')->get();

        $course_master=DB::table('course_master')->get();

        $category_master=DB::table('category_master')->where('active_cat',1)->get();

        $mytime = Carbon::now();

        $blog_detail_footer=DB::table('blog_detail')->orderBy('date','desc')->get()->take(2);

        /*-----------------------------------------------------------------------------------------------*/
        
         $buyer_id=Auth::guard('buyer')->id();

         $already_in_cart=0;
          $cart_id=0;
         
           $count_cart=DB::table('cart')->where('buyer_id',$buyer_id)->where('product_id',$id)->count();
          

        if($buyer_id !='' &&  $count_cart!=0 ){

         $count_cart=DB::table('cart')->where('buyer_id',$buyer_id)->where('product_id',$id)->count();

            $cart_data=DB::table('cart')->where('buyer_id',$buyer_id)->where('product_id',$id)->get();

            $cart_id=$cart_data[0]->id;

         }

         $already_in_cart=$count_cart;


        return view('product', compact('product','product_sub_category','product_image','id','side_product','product_category','admins','social_links','footer_description','course_master','category_master','mytime','blog_detail_footer','banner_image','cart_id','already_in_cart'))->render();
    }



    public function search_product(Request $request,$id){

        $product_sub_category=DB::table('product_sub_category')->get();

        $product_image=DB::table('product_image')->get();

        $side_product=DB::table('product')->select("product.*")->orderBy('id','Desc')->take(3)->get();

        $search=$request->search_string;

        $id=$request->id;

        $category=DB::table('product_category')->where('id',$id)->get();

        $cat_name = $category[0]->category;

        $banner_image=DB::table('banner_image')->where('page_name',$cat_name)->get();



        /*   Common Data   */

        $product_category=DB::table('product_category')->get();

        $admins=DB::table('admins')->get();

        $social_links=DB::table('social_links')->get();

        $footer_description=DB::table('footer_description')->get();

        $course_master=DB::table('course_master')->get();

        $category_master=DB::table('category_master')->where('active_cat',1)->get();

        $mytime = Carbon::now();

        $blog_detail_footer=DB::table('blog_detail')->orderBy('date','desc')->get()->take(2);

        $product = DB::table('product')->join('product_category','product_category.id','product.category_id')->join('product_sub_category','product_sub_category.id','product.sub_category_id')->select("product.*","product_category.category as category","product_sub_category.sub_category as sub_category")
          ->where(function($query) use($search){
            $query->where('product.product_name', 'like', '%' . $search . '%')
             ->orwhere('product.price', 'like', '%' . $search . '%');
            })
          ->where('product.category_id','=',$id)
          ->orderBy('id','Desc')
          ->paginate(4);

          /*echo "<pre>";

          print_r($product);

          exit;*/
          
          
          $buyer_id=Auth::guard('buyer')->id();

         $already_in_cart=0;
          $cart_id=0;
         
           $count_cart=DB::table('cart')->where('buyer_id',$buyer_id)->where('product_id',$id)->count();
          

        if($buyer_id !='' &&  $count_cart!=0 ){

         $count_cart=DB::table('cart')->where('buyer_id',$buyer_id)->where('product_id',$id)->count();

            $cart_data=DB::table('cart')->where('buyer_id',$buyer_id)->where('product_id',$id)->get();

            $cart_id=$cart_data[0]->id;

         }

         $already_in_cart=$count_cart;



        if($product->count() >= 1){

            return view('search_product' ,compact('product','product_sub_category','product_image','id','side_product','product_category','admins','social_links','footer_description','course_master','category_master','mytime','blog_detail_footer','banner_image','cart_id','already_in_cart'))->render();  //compact data must be in variable
        }else{

        return response()->json([

                'status'=>'nothing_found',

            ]);
         }
        
    }




    public function search_product_ck(Request $request,$id){

        $product_sub_category=DB::table('product_sub_category')->get();

        $product_image=DB::table('product_image')->get();

        $side_product=DB::table('product')->select("product.*")->orderBy('id','Desc')->take(3)->get();

        $search=$request->input('search');

        $id=$request->input('id');

        $category=DB::table('product_category')->where('id',$id)->get();

        $cat_name = $category[0]->category;

        $banner_image=DB::table('banner_image')->where('page_name',$cat_name)->get();



        /*   Common Data   */

        $product_category=DB::table('product_category')->get();

        $admins=DB::table('admins')->get();

        $social_links=DB::table('social_links')->get();

        $footer_description=DB::table('footer_description')->get();

        $course_master=DB::table('course_master')->get();

        $category_master=DB::table('category_master')->where('active_cat',1)->get();

        $mytime = Carbon::now();

        $blog_detail_footer=DB::table('blog_detail')->orderBy('date','desc')->get()->take(2);

        $product = DB::table('product')->join('product_category','product_category.id','product.category_id')->join('product_sub_category','product_sub_category.id','product.sub_category_id')->select("product.*","product_category.category as category","product_sub_category.sub_category as sub_category")
          ->where(function($query) use($search){
            $query->where('product.product_name', 'like', '%' . $search . '%')
             ->orwhere('product.price', 'like', '%' . $search . '%');
            })
          ->where('product.category_id','=',$id)
          ->orderBy('id','Desc')
          ->paginate(4);

          /*echo "<pre>";

          print_r($product);

          exit;*/
          
        
        $buyer_id=Auth::guard('buyer')->id();

         $already_in_cart=0;
          $cart_id=0;
         
           $count_cart=DB::table('cart')->where('buyer_id',$buyer_id)->where('product_id',$id)->count();
          

        if($buyer_id !='' &&  $count_cart!=0 ){

         $count_cart=DB::table('cart')->where('buyer_id',$buyer_id)->where('product_id',$id)->count();

            $cart_data=DB::table('cart')->where('buyer_id',$buyer_id)->where('product_id',$id)->get();

            $cart_id=$cart_data[0]->id;

         }

         $already_in_cart=$count_cart;



        if($product->count() >= 1){

            return view('product' ,compact('product','product_sub_category','product_image','id','side_product','product_category','admins','social_links','footer_description','course_master','category_master','mytime','blog_detail_footer','banner_image','cart_id','already_in_cart'))->render();  //compact data must be in variable
        }else{

        return redirect('/product')->with('error','nothing found');
         }
        
    }



    



  
   /* public function product_detail($id){

        $data['product']=DB::table('product')->where('id',$id)->select("product.*")->orderBy('id','Desc')->get();

        $product=DB::table('product')->where('id',$id)->select("product.*")->orderBy('id','Desc')->get();

        $category_id=$product[0]->category_id;

        $data['product_image']=DB::table('product_image')->get();

        $data['related_product']=DB::table('product')->where('category_id',$category_id)->whereNot('id',$id)->select("product.*")->orderBy('id','Desc')->get();

    
    
    
        $data['product_category']=DB::table('product_category')->get();

        $data['admins']=DB::table('admins')->get();

        $data['social_links']=DB::table('social_links')->get();

        $data['footer_description']=DB::table('footer_description')->get();

        $data['course_master']=DB::table('course_master')->get();

        $data['category_master']=DB::table('category_master')->where('active_cat',1)->get();

        $data['mytime'] = Carbon::now();

        $data['blog_detail_footer']=DB::table('blog_detail')->orderBy('date','desc')->get()->take(2);

        $buyer_id=Auth::guard('buyer')->id();

         $already_in_cart=0;
         
           $count_cart=DB::table('cart')->where('buyer_id',$buyer_id)->where('product_id',$id)->count();
          

        if($buyer_id !='' &&  $count_cart!=0 ){

         $count_cart=DB::table('cart')->where('buyer_id',$buyer_id)->where('product_id',$id)->count();

            $cart_data=DB::table('cart')->where('buyer_id',$buyer_id)->where('product_id',$id)->get();

            $data['cart_id']=$cart_data[0]->id;

         }

         $data['already_in_cart']=$count_cart;


        return view('product_detail',$data);
    }

*/


 public function product_detail($id){

        $data['product']=DB::table('product')->where('id',$id)->select("product.*")->orderBy('id','Desc')->get();

        $product=DB::table('product')->where('id',$id)->select("product.*")->orderBy('id','Desc')->get();

        $category_id=$product[0]->category_id;

        $data['product_image']=DB::table('product_image')->get();

        $data['related_product']=DB::table('product')->where('category_id',$category_id)->whereNot('id',$id)->select("product.*")->orderBy('id','Desc')->get();

        /*   Common Data   */

        $data['product_category']=DB::table('product_category')->get();

        $data['admins']=DB::table('admins')->get();

        $data['social_links']=DB::table('social_links')->get();

        $data['footer_description']=DB::table('footer_description')->get();

        $data['course_master']=DB::table('course_master')->get();

        $data['category_master']=DB::table('category_master')->where('active_cat',1)->get();

        $data['mytime'] = Carbon::now();

        $data['blog_detail_footer']=DB::table('blog_detail')->orderBy('date','desc')->get()->take(2);

        $buyer_id=Auth::guard('buyer')->id();

         $already_in_cart=0;
         
           $count_cart=DB::table('cart')->where('buyer_id',$buyer_id)->where('product_id',$id)->count();
          

        if($buyer_id !='' &&  $count_cart!=0 ){

         $count_cart=DB::table('cart')->where('buyer_id',$buyer_id)->where('product_id',$id)->count();

            $cart_data=DB::table('cart')->where('buyer_id',$buyer_id)->where('product_id',$id)->get();

            $data['cart_id']=$cart_data[0]->id;

         }

         $data['already_in_cart']=$count_cart;



        return view('product_detail',$data);
    }











    public function sub_product($id){

        $product=DB::table('product')->where('sub_category_id',$id)->select("product.*")->orderBy('id','Desc')->paginate(4);

        $product_sub_category=DB::table('product_sub_category')->get();

        $product_image=DB::table('product_image')->get();

        $side_product=DB::table('product')->select("product.*")->orderBy('id','Desc')->take(3)->get();

        if(count($product) !=0){

            $category_id=$product[0]->category_id;

        }else{

            $category_id="1";
        }

        

        $category=DB::table('product_category')->where('id',$category_id)->get();

        $cat_name = $category[0]->category;

        $banner_image=DB::table('banner_image')->where('page_name',$cat_name)->get();






        /*   Common Data   */

        $product_category=DB::table('product_category')->get();

        $admins=DB::table('admins')->get();

        $social_links=DB::table('social_links')->get();

        $footer_description=DB::table('footer_description')->get();

        $course_master=DB::table('course_master')->get();

        $category_master=DB::table('category_master')->where('active_cat',1)->get();

        $mytime = Carbon::now();

        $blog_detail_footer=DB::table('blog_detail')->orderBy('date','desc')->get()->take(2);
        
        
        
        
        $buyer_id=Auth::guard('buyer')->id();
         
           $count_cart=DB::table('cart')->where('buyer_id',$buyer_id)->where('product_id',$id)->count();
          

        if($buyer_id !='' &&  $count_cart!=0 ){

         $count_cart=DB::table('cart')->where('buyer_id',$buyer_id)->where('product_id',$id)->count();

            $cart_data=DB::table('cart')->where('buyer_id',$buyer_id)->where('product_id',$id)->get();

            $cart_id=$cart_data[0]->id;

            $already_in_cart=$count_cart;

         }else{

            $already_in_cart=0;

            $cart_id=0;
         }

        return view('sub_product', compact('product','product_sub_category','product_image','id','side_product','product_category','admins','social_links','footer_description','course_master','category_master','mytime','blog_detail_footer','banner_image','cart_id','already_in_cart'))->render();
    }



    public function sub_search_product(Request $request,$id){

        $product_sub_category=DB::table('product_sub_category')->get();

        $product_image=DB::table('product_image')->get();

        $side_product=DB::table('product')->select("product.*")->orderBy('id','Desc')->take(3)->get();

        $search=$request->search_string;

        $id=$request->id;

        



        /*   Common Data   */

        $product_category=DB::table('product_category')->get();

        $admins=DB::table('admins')->get();

        $social_links=DB::table('social_links')->get();

        $footer_description=DB::table('footer_description')->get();

        $course_master=DB::table('course_master')->get();

        $category_master=DB::table('category_master')->where('active_cat',1)->get();

        $mytime = Carbon::now();

        $blog_detail_footer=DB::table('blog_detail')->orderBy('date','desc')->get()->take(2);

        $product = DB::table('product')->join('product_category','product_category.id','product.category_id')->join('product_sub_category','product_sub_category.id','product.sub_category_id')->select("product.*","product_category.category as category","product_sub_category.sub_category as sub_category")
          ->where(function($query) use($search){
            $query->where('product.product_name', 'like', '%' . $search . '%')
             ->orwhere('product.price', 'like', '%' . $search . '%');
            })
          ->where('product.sub_category_id','=',$id)
          ->orderBy('id','Desc')
          ->paginate(4);

          /*echo "<pre>";

          print_r($product);

          exit;*/



        if(count($product) !=0){

            $category_id=$product[0]->category_id;
            
        }else{

            $category_id=1;
        }

        $category=DB::table('product_category')->where('id',$category_id)->get();

        $cat_name = $category[0]->category;

        $banner_image=DB::table('banner_image')->where('page_name',$cat_name)->get();
        
        
        

        
        $buyer_id=Auth::guard('buyer')->id();
         
           $count_cart=DB::table('cart')->where('buyer_id',$buyer_id)->where('product_id',$id)->count();
          

        if($buyer_id !='' &&  $count_cart!=0 ){

         $count_cart=DB::table('cart')->where('buyer_id',$buyer_id)->where('product_id',$id)->count();

            $cart_data=DB::table('cart')->where('buyer_id',$buyer_id)->where('product_id',$id)->get();

            $cart_id=$cart_data[0]->id;

            $already_in_cart=$count_cart;

         }else{

            $already_in_cart=0;

            $cart_id=0;
         }
        
        
        

        if($product->count() >= 1){

            return view('sub_search_product' ,compact('product','product_sub_category','product_image','id','side_product','product_category','admins','social_links','footer_description','course_master','category_master','mytime','blog_detail_footer','banner_image','already_in_cart','cart_id'))->render();  //compact data must be in variable
        }else{

        return response()->json([

                'status'=>'nothing_found',

            ]);
         }
        
    }




    public function sub_search_product_ck(Request $request,$id){

        $product_sub_category=DB::table('product_sub_category')->get();

        $product_image=DB::table('product_image')->get();

        $side_product=DB::table('product')->select("product.*")->orderBy('id','Desc')->take(3)->get();

        $search=$request->input('search');

        $id=$request->input('id');

        



        /*   Common Data   */

        $product_category=DB::table('product_category')->get();

        $admins=DB::table('admins')->get();

        $social_links=DB::table('social_links')->get();

        $footer_description=DB::table('footer_description')->get();

        $course_master=DB::table('course_master')->get();

        $category_master=DB::table('category_master')->where('active_cat',1)->get();

        $mytime = Carbon::now();

        $blog_detail_footer=DB::table('blog_detail')->orderBy('date','desc')->get()->take(2);

        $product = DB::table('product')->join('product_category','product_category.id','product.category_id')->join('product_sub_category','product_sub_category.id','product.sub_category_id')->select("product.*","product_category.category as category","product_sub_category.sub_category as sub_category")
          ->where(function($query) use($search){
            $query->where('product.product_name', 'like', '%' . $search . '%')
             ->orwhere('product.price', 'like', '%' . $search . '%');
            })
          ->where('product.sub_category_id','=',$id)
          ->orderBy('id','Desc')
          ->paginate(4);

          /*echo "<pre>";

          print_r($product);

          exit;*/

        if(count($product) !=0){

            $category_id=$product[0]->category_id;
            
        }else{

            $category_id=1;
        }

        $category=DB::table('product_category')->where('id',$category_id)->get();

        $cat_name = $category[0]->category;

        $banner_image=DB::table('banner_image')->where('page_name',$cat_name)->get();
        
        
        
        
        $buyer_id=Auth::guard('buyer')->id();
         
           $count_cart=DB::table('cart')->where('buyer_id',$buyer_id)->where('product_id',$id)->count();
          

        if($buyer_id !='' &&  $count_cart!=0 ){

         $count_cart=DB::table('cart')->where('buyer_id',$buyer_id)->where('product_id',$id)->count();

            $cart_data=DB::table('cart')->where('buyer_id',$buyer_id)->where('product_id',$id)->get();

            $cart_id=$cart_data[0]->id;

            $already_in_cart=$count_cart;

         }else{

            $already_in_cart=0;

            $cart_id=0;
         }
         



        if($product->count() >= 1){

            return view('sub_product' ,compact('product','product_sub_category','product_image','id','side_product','product_category','admins','social_links','footer_description','course_master','category_master','mytime','blog_detail_footer','banner_image','already_in_cart','cart_id'))->render();  //compact data must be in variable
        }else{

        return redirect('/sub_product')->with('error','nothing found');
         }
        
    }

   /* public function view_cart($id){

        $data['cart_data'] = DB::table('product')->join('cart','cart.product_id','product.id')->select("product.*","cart.buyer_id as buyer_id","cart.quantity as cart_quantity","cart.id as cart_id")
          ->where('cart.buyer_id','=',$id)
          ->orderBy('id','Desc')
          ->get();

          $data['product_image']=DB::table('product_image')->get();


        

        $data['product_category']=DB::table('product_category')->get();

        $data['admins']=DB::table('admins')->get();

        $data['social_links']=DB::table('social_links')->get();

        $data['footer_description']=DB::table('footer_description')->get();

        $data['course_master']=DB::table('course_master')->get();

        $data['category_master']=DB::table('category_master')->where('active_cat',1)->get();

        $data['mytime'] = Carbon::now();

        $data['blog_detail_footer']=DB::table('blog_detail')->orderBy('date','desc')->get()->take(2);


        return view('add_cart',$data);
    }
*/

public function view_cart($id){




         $cart_data = DB::table('product')->join('cart','cart.product_id','product.id')->select("product.*","cart.buyer_id as buyer_id","cart.quantity as cart_quantity","cart.id as cart_id")
          ->where('cart.buyer_id','=',$id)
          ->orderBy('id','Desc')
          ->get();

          $data['cart_count']=count($cart_data);


        $data['cart_data'] = DB::table('product')->join('cart','cart.product_id','product.id')->select("product.*","cart.buyer_id as buyer_id","cart.quantity as cart_quantity","cart.id as cart_id")
          ->where('cart.buyer_id','=',$id)
          ->orderBy('id','Desc')
          ->get();

            $total=0;


                 foreach ($cart_data as $key => $b) {

                    $total1=$b->price*$b->cart_quantity;

                    $total=$total+$total1;
                   
                 }


          $data['total_amount']= $total;

          $data['product_image']=DB::table('product_image')->get();


        /*   Common Data   */

        $data['product_category']=DB::table('product_category')->get();

        $data['admins']=DB::table('admins')->get();

        $data['social_links']=DB::table('social_links')->get();

        $data['footer_description']=DB::table('footer_description')->get();

        $data['course_master']=DB::table('course_master')->get();

        $data['category_master']=DB::table('category_master')->where('active_cat',1)->get();

        $data['mytime'] = Carbon::now();

        $data['blog_detail_footer']=DB::table('blog_detail')->orderBy('date','desc')->get()->take(2);


        return view('add_cart',$data);
    }





    public function add_cart(Request $request,$id){

        $validated=$request->validate([
            'counter'=>'required',
        ]);

        $quantity=$request->input('counter');

        $buyer_id=Auth::guard('buyer')->id();

        DB::table('cart')->insert(['buyer_id'=>$buyer_id , 'product_id'=>$id , 'quantity'=>$quantity]);

        return redirect('/view_cart/'.$buyer_id)->with('error', 'Product added to Cart !!');
    }
    
    public function delete_add_cart($id){

        DB::table('cart')->where('id',$id)->delete();

        $buyer_id=Auth::guard('buyer')->id();

          $cart_data = DB::table('product')->join('cart','cart.product_id','product.id')->select("product.*","cart.buyer_id as buyer_id","cart.quantity as cart_quantity","cart.id as cart_id")
          ->where('cart.buyer_id','=',$buyer_id)
          ->orderBy('id','Desc')
          ->get();

                $total=0;


                 foreach ($cart_data as $key => $b) {

                    $total1=$b->price*$b->cart_quantity;

                    $total=$total+$total1;
                   
                 }


                $response = [
                            'success'=>true,
                            'total'=>$total,
                            
                           ];

             return response()->json($response, 200);




        return response()->json([
            'success'=>'200',
        ]);
    }




   
       public function minus_qty(Request $request)
    {

          $new_qty=$request->new_qty;
          $cart_id=$request->cart_id;
          $buyer_id=Auth::guard('buyer')->id();

 
         DB::table('cart')->where('id',$cart_id)->update(['quantity'=>$new_qty]);

          $cart_data = DB::table('product')->join('cart','cart.product_id','product.id')->select("product.*","cart.buyer_id as buyer_id","cart.quantity as cart_quantity","cart.id as cart_id")
          ->where('cart.buyer_id','=',$buyer_id)
          ->orderBy('id','Desc')
          ->get();

          $total=0;

            foreach ($cart_data as $key => $b) {

                $total1=$b->price*$b->cart_quantity;

                $total=$total+$total1;
               
             }

            $cart=DB::table('cart')->where('id',$cart_id)->get();

           $product_id=$cart[0]->product_id;


          $product_data=DB::table('product')->where('id',$product_id)->get();



          $price=$product_data[0]->price;

           $qty=$new_qty;

      

           $data['total_amount']= $total;

             $response = [
                            'success'=>true,
                            'price' =>$price,
                            'qty' =>$qty,
                            'total'=>$total,
                            
                         ];

             return response()->json($response, 200);

       }

       public function plus_qty(Request $request){


          $new_qty=$request->new_qty;
          $cart_id=$request->cart_id;
          $buyer_id=Auth::guard('buyer')->id();

 
          DB::table('cart')->where('id',$cart_id)->update(['quantity'=>$new_qty]);

          $cart_data = DB::table('product')->join('cart','cart.product_id','product.id')->select("product.*","cart.buyer_id as buyer_id","cart.quantity as cart_quantity","cart.id as cart_id")
          ->where('cart.buyer_id','=',$buyer_id)
          ->orderBy('id','Desc')
          ->get();

          $total=0;

            foreach ($cart_data as $key => $b) {

                $total1=$b->price*$b->cart_quantity;

                $total=$total+$total1;
               
             }

             
          $cart=DB::table('cart')->where('id',$cart_id)->get();

           $product_id=$cart[0]->product_id;


          $product_data=DB::table('product')->where('id',$product_id)->get();



          $price=$product_data[0]->price;

      

           $qty=$new_qty;

      

           $data['total_amount']= $total;

             $response = [
                            'success'=>true,
                            'price' =>$price,
                            'qty' =>$qty,
                            'total'=>$total,
                            
                         ];

             return response()->json($response, 200);





        }
         public function checkout(){









            $data['product_category']=DB::table('product_category')->get();

            $data['admins']=DB::table('admins')->get();

            $data['social_links']=DB::table('social_links')->get();

            $data['footer_description']=DB::table('footer_description')->get();

            $data['course_master']=DB::table('course_master')->get();

            $data['category_master']=DB::table('category_master')->where('active_cat',1)->get();

            $data['mytime'] = Carbon::now();

            $data['blog_detail_footer']=DB::table('blog_detail')->orderBy('date','desc')->get()->take(2);
            
             $data['product_id'] =0;


            $buyer_id=Auth::guard('buyer')->id();


              $cart_data = DB::table('product')->join('cart','cart.product_id','product.id')->select("product.*","cart.buyer_id as buyer_id","cart.quantity as cart_quantity","cart.id as cart_id")
              ->where('cart.buyer_id','=',$buyer_id)
              ->orderBy('id','Desc')
              ->get();

                    $total=0;


                     foreach ($cart_data as $key => $b) {

                        $total1=$b->price*$b->cart_quantity;

                        $total=$total+$total1;
                       
                     }


                $data['cart_data']=$cart_data;      

                $data['total_amount']=$total;     



            $buyer_data=Buyer::where('id',$buyer_id)->get();

            $data['name']=$buyer_data[0]->name;
            $data['email']=$buyer_data[0]->email;
            $data['country_code']=$buyer_data[0]->country_code;
            $data['mobile']=$buyer_data[0]->mobile;



            $billing_detail=DB::table('billing_detail')->where('user_id',$buyer_id)->get();

            if(count($billing_detail) !=0){

                $data['address']=$billing_detail[0]->address;

                $data['city']=$billing_detail[0]->city;

                $data['state']=$billing_detail[0]->state;

                $data['pincode']=$billing_detail[0]->pincode;

                $data['address_type']=$billing_detail[0]->address_type;

            }
            else{

                $data['address']='';

                $data['city']='';

                $data['state']='';

                $data['pincode']='';

                $data['address_type']=1;
            }

           $data['states']=DB::table('states')->get(); 

           return view('checkout',$data);
        }
    
        public function buy_product($id){


            $data['product_category']=DB::table('product_category')->get();

        $data['admins']=DB::table('admins')->get();

        $data['social_links']=DB::table('social_links')->get();

        $data['footer_description']=DB::table('footer_description')->get();

        $data['course_master']=DB::table('course_master')->get();

        $data['category_master']=DB::table('category_master')->where('active_cat',1)->get();

        $data['mytime'] = Carbon::now();

        $data['blog_detail_footer']=DB::table('blog_detail')->orderBy('date','desc')->get()->take(2);




         $buyer_id=Auth::guard('buyer')->id();

         $product_data=DB::table('product')->where('id',$id)->get();

         $data['total_amount']=$product_data[0]->price;

         DB::table('cart')->insert(['buyer_id'=>$buyer_id , 'product_id'=>$id , 'quantity'=>1]);

         $data['cart_data']=DB::table('product')->where('id',$id)->get();

         $buyer_data=Buyer::where('id',$buyer_id)->get();

        $data['product_id']=$id;

        $data['name']=$buyer_data[0]->name;
        $data['email']=$buyer_data[0]->email;
        $data['country_code']=$buyer_data[0]->country_code;
        $data['mobile']=$buyer_data[0]->mobile;
        
        
        
        $billing_detail=DB::table('billing_detail')->where('user_id',$buyer_id)->get();

            if(count($billing_detail) !=0){

                $data['address']=$billing_detail[0]->address;

                $data['city']=$billing_detail[0]->city;

                $data['state']=$billing_detail[0]->state;

                $data['pincode']=$billing_detail[0]->pincode;

                $data['address_type']=$billing_detail[0]->address_type;

            }
            else{

                $data['address']='';

                $data['city']='';

                $data['state']='';

                $data['pincode']='';

                $data['address_type']=1;
            }

           $data['states']=DB::table('states')->get(); 

           return view('checkout',$data);
    

        }


           
     public function checkout_process(Request $request){

        
          $validator = Validator::make($request->all(), [

              'name' => 'required',
              'email' => 'required|email',
              'phone_no' => 'required',
              'address' => 'required',
              'city' => 'required',
              'state' => 'required',
              'pincode' => 'required',
              'address_type' => 'required',

          ]);

        if ($validator->passes()) {

             $name=$request->name;
             $email=$request->email;
             $phone_no=$request->phone_no;
             $address=$request->address;
             $address_type=$request->address_type;
             $city=$request->city;
             $state=$request->state;
             $pincode=$request->pincode;
             $mytime = Carbon::now('Asia/Kolkata');


             $buyer_id=$request->buyer_id;
             $cart_id[]=$request->cart_id;
             
             $total_amount=$request->total_amount;

      
         
             
            $product_id=$request->product_id;
      

             $status=0;


             $detail=DB::table('billing_detail')->where('user_id',$buyer_id)->get();

             if(count($detail) == 0){

                $billing_detail=DB::table('billing_detail')->insert(['user_id'=>$buyer_id,'name'=>$name,'email'=>$email,'phone_no'=>$phone_no,'address'=>$address,'address_type'=>$address_type,'city'=>$city,'state'=>$state,'pincode'=>$pincode,'date'=>$mytime,]);
             }else{

                $billing_detail=DB::table('billing_detail')->where('user_id',$buyer_id)->update(['user_id'=>$buyer_id,'name'=>$name,'email'=>$email,'phone_no'=>$phone_no,'address'=>$address,'address_type'=>$address_type,'city'=>$city,'state'=>$state,'pincode'=>$pincode,'date'=>$mytime]);
             }
                     
             
          /*  if(count($cart_id) !=0){

                    foreach($cart_id as $c_id){

                    $order_detail=DB::table('order_detail')->insert(['buyer_id'=>$buyer_id,'cart_id'=>$c_id,'product_id'=>$product_id,'status'=>$status,'date'=>$mytime,]);
                 }
             }
             else{

                $order_detail=DB::table('order_detail')->insert(['buyer_id'=>$buyer_id,'cart_id'=>$c_id,'product_id'=>$product_id,'status'=>$status,'date'=>$mytime,]);
             }*/

           if($billing_detail){
                
             return response()->json([

             'email'=>$email,
             'phone_no'=>$phone_no,
             'address'=>$address,
             'address_type'=>$address_type,
             'name'=>$name,
             'city'=>$city,
             'state'=>$state,
             'pincode'=>$pincode,
             'buyer_id'=>$buyer_id,
             'cart_id'=>$cart_id,
             'product_id'=>$product_id,
             'total_amount'=>$total_amount,
            ]);
                
            }
        }

        return response()->json(['error'=>$validator->errors()]);
        
    }

        public function place_order(Request $request){

            $email=$request->email;
            $name=$request->name;
            $phone_no=$request->phone_no;
            $total_amount=$request->total_amount;
            $address=$request->address;
            $address_type=$request->address_type;
            $city=$request->city;
            $state=$request->state;
            $pincode=$request->pincode;
            $buyer_id=$request->buyer_id;
           /* $cart[]=$request->cart_id;*/
            $product_id=$request->product_id;
            $payment_id=$request->payment_id;


            $payment_mode='rezorpay_payment';
            $status=1;

            $time = Carbon::now('Asia/Kolkata');

            $date = Carbon::now();
            $formatedDate = $date->format('Y-m-d');

           $api = new Api('rzp_test_f5Nc4nKOhOrZX0','ZxjKhRkFTgWprtDfjQHdDtxA');


      /*  $api = new Api('rzp_test_f5Nc4nKOhOrZX0','ZxjKhRkFTgWprtDfjQHdDtxA');*/

               $payment = $api->payment->fetch($payment_id);

            
            if(!empty($payment_id)) {
                 try {

                    $payment->capture(array('amount'=>$payment['amount']));

              } catch (\Exception $e) {
                   return  $e->getMessage();
                   \Session::put('error',$e->getMessage());
                  return redirect()->back();
                }
            }


      $order_detail=DB::table('orders')->insert(['name'=>$name,'email'=>$email,'phone_no'=>$phone_no,'address'=>$address, 'address_type'=>$address_type,'city'=>$city,'pincode'=>$pincode,'state'=>$state, 'buyer_id'=>$buyer_id,'buyer_id'=>$buyer_id,'status'=>$status,'date'=>$formatedDate,'total_price'=>$total_amount,'payment_id'=>$payment_id,'payment_mode'=>$payment_mode,'created_at'=>$time]);

            $order_id=DB::table('orders')->max('id');


             if($product_id !=''){


                  $product=DB::table('product')->where('id',$product_id)->get();

                  $product_price=$product[0]->price;

                  $status=0;


                 $order= DB::table('order_item')->insert(['order_id'=>$order_id,'product_id'=>$product_id,'qty'=>1,'buyer_id'=>$buyer_id,'created_at'=>$time,'price'=>$product_price, 'status'=>$status,'created_at'=>$time]);


                 if($order){

                        $cart_id=DB::table('cart')->max('id');

                         DB::table('cart')->where('id',$cart_id)->delete();
                     }



                 }else{


                    $cart_data=DB::table('cart')->where('buyer_id',$buyer_id)->get();


  
                   if(count($cart_data)!=0){


                foreach($cart_data as $c_id){

                
                           $cart_data1=DB::table('cart')->where('id',$c_id->id)->get();
                    
                           $product_id=$cart_data1[0]->product_id;

                           $quantity=$cart_data1[0]->quantity;

                           $product=DB::table('product')->where('id',$product_id)->get();

                           $product_price=$product[0]->price;

                           $order=DB::table('order_item')->insert(['order_id'=>$order_id,'product_id'=>$product_id,'qty'=>$quantity,'price'=>$product_price,'buyer_id'=>$buyer_id, 'status'=>$status, 'created_at'=>$time]);


                            if($order){

                                DB::table('cart')->where('id',$c_id->id)->delete();
                             }

                      }

                }

            }

          
               return response()->json([

                    'message'=>'place order successfully'

            ]);
                
            }


       
    
    
    public  function privacy_policy()
        {
             /*   Common Data   */

          $data['product_category']=DB::table('product_category')->get();

        $data['admins']=DB::table('admins')->get();

        $data['social_links']=DB::table('social_links')->get();

        $data['footer_description']=DB::table('footer_description')->get();

        $data['course_master']=DB::table('course_master')->get();

        $data['category_master']=DB::table('category_master')->where('active_cat',1)->get();

        $data['mytime'] = Carbon::now();

        $data['blog_detail_footer']=DB::table('blog_detail')->orderBy('date','desc')->get()->take(2);


            return view('privacy_policy',$data);
        }

        public function term_and_condition(){


          $data['product_category']=DB::table('product_category')->get();

        $data['admins']=DB::table('admins')->get();

        $data['social_links']=DB::table('social_links')->get();

        $data['footer_description']=DB::table('footer_description')->get();

        $data['course_master']=DB::table('course_master')->get();

        $data['category_master']=DB::table('category_master')->where('active_cat',1)->get();

        $data['mytime'] = Carbon::now();

        $data['blog_detail_footer']=DB::table('blog_detail')->orderBy('date','desc')->get()->take(2);


            return view('term_and_condition',$data);

        }

        public function cancellation_refund(){


        $data['product_category']=DB::table('product_category')->get();

        $data['admins']=DB::table('admins')->get();

        $data['social_links']=DB::table('social_links')->get();

        $data['footer_description']=DB::table('footer_description')->get();

        $data['course_master']=DB::table('course_master')->get();

        $data['category_master']=DB::table('category_master')->where('active_cat',1)->get();

        $data['mytime'] = Carbon::now();

        $data['blog_detail_footer']=DB::table('blog_detail')->orderBy('date','desc')->get()->take(2);


            return view('cancellation_refund',$data);

      }

      public function order_success(){

         return view('success');


      }

      public function order_histroy($id){

        $data['product_category']=DB::table('product_category')->get();

        $data['admins']=DB::table('admins')->get();

        $data['social_links']=DB::table('social_links')->get();

        $data['footer_description']=DB::table('footer_description')->get();

        $data['course_master']=DB::table('course_master')->get();

        $data['category_master']=DB::table('category_master')->where('active_cat',1)->get();

        $data['mytime'] = Carbon::now();

        $data['blog_detail_footer']=DB::table('blog_detail')->orderBy('date','desc')->get()->take(2);



         $order_data=DB::table('order_item')->join('orders','orders.id','order_item.order_id')->join('product','product.id','order_item.product_id')->where('order_item.buyer_id',$id)->select("order_item.*","orders.name as name","orders.email as email","orders.email as email","orders.phone_no as phone_no","orders.address as address","orders.address_type as address_type","orders.city as city","orders.state as state","orders.pincode as pincode","orders.date as date","orders.total_price as total_price","orders.payment_mode as payment_mode","product.product_name as product_name","product.price as price")->orderBy('id','desc')->get(); 


           $data['order_data_count']=count($order_data);
           $data['order_data']=$order_data;


          $data['product_image']=DB::table('product_image')->get();



        

        return view('order_histroy',$data);
      }


      public function register_student(Request $request){


          $validator = Validator::make($request->all(), [

            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|unique:registration_master,email',
            'mobile_no'=>'required',
            'subject'=>'required',
        ]);

        if ($validator->passes()) {


           $first_name=$request->first_name;

           $last_name=$request->last_name;

           $email=$request->email;

           $mobile_no=$request->mobile_no;

            $date = date('Y-m-d', time());


            $detail = DB::table('registration_master')->insert(['fname'=>$first_name,'lname'=>$last_name,'email'=>$email,'mobile'=>$mobile_no,'status'=>0,'date'=>$date]);


        $member_id=DB::table('registration_master')->max('r_id');

        $course_master=DB::table('course_master')->get();

        $subject=$request->subject;

        foreach($subject as $cm){

            DB::table('register_member_course')->insert(['member_id'=>$member_id,'course_id'=>$cm,'date'=>$date]);
        }


         

           $admin_detail=DB::table('admins')->get();

            $aemail=$admin_detail[0]->email;
            $aname=$admin_detail[0]->name;
            $aphone_no=$admin_detail[0]->phone_no;
       
            $meta['FROM_EMAIL']="jaypatel07072001@gmail.com";
            $meta['admin_email']="jaypatel07072001@gmail.com";
            $meta['subject']="Someone registered in School Of Occult Science";
            $meta['name']=$aname;
            $meta['email']=$email;
            $meta['phone_no']=$mobile_no;
            $meta['data']="New User For registration !!";
            $meta['title']="Registration";
            $meta['description']="New Student have requested to become a part of School Of Occult Science !!";

                 
           Mail::send('email.new_email', $meta, function($m) use($meta){
        
               $m->from($meta['FROM_EMAIL'],'New Get Started Inquiry');
               $m->to($meta['admin_email']);
               $m->subject($meta['subject']); 
             });


              Session::put('id', $member_id);



            $meta['FROM_EMAIL']="jaypatel07072001@gmail.com";
            $meta['client_email']=$email;
            $meta['subject']="New Get Started Inquiry"; 
            $meta['name']=$first_name;
            $meta['data']="You Have registered for School Of Occult Science successfully !!"; 
            $meta['title']="Registration";
            
          
      
           Mail::send('email.new_email', $meta, function($m) use($meta){
        
               $m->from($meta['FROM_EMAIL'],'Inquiry submitted successfully');
               $m->to($meta['client_email']);
               $m->subject($meta['subject']); 
             });


            return response()->json(['success'=>'Response Sent successfully.']);
        
     
        
         }

        return response()->json(['error'=>$validator->errors()]);



      }

      public function check_register_student(){


         $member_id=1;

         Session::put('id', $member_id);


        return response()->json(['success'=>'Response Sent successfully.']);


      }




   
    

 

    

}
