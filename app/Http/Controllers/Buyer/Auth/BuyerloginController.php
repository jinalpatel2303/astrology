<?php

namespace App\Http\Controllers\Buyer\Auth;

use Illuminate\Http\Request;
use Redirect;
use App\Http\Controllers\Controller;
use Illuminate\support\facades\Auth;
use App\Models\Buyer;
use Illuminate\support\MessageBag;
use Illuminate\Support\Facades\Mail;
use Illuminate\support\facades\Input;
use DB;
use Hash;


class BuyerloginController extends Controller
{
      /* public function __construct(){

                $this->middleware('guest:buyer')->except('logout');
        }
*/
         protected function guard(){

           return Auth::guard('buyer');

         }

        public function buyer_login(){
            
            return view('Buyer.login');
        }

        public function registration(){


         return view('Buyer.registration');

        }


        public function buyer_logout(){

           Auth::guard('buyer')->logout();

          return redirect('/');
      }


        public function store_buyer(Request $request){


             $validated=$request->validate([
              
                'name'=>'required',
                'email'=>'required|email|unique:buyers',
                'mobile'=>'required|size:10|unique:buyers',
                'password'=>'required|min:6',
                'confirm_password'=>'required|same:password',
                'address'=>'required',
               
            ]);

             $name=$request->input('name');
             $email=$request->input('email');
             $mobile=$request->input('mobile');
             $password=$request->input('password');
             $address=$request->input('address');
             $country_code='+91';

            Buyer::create(['name'=>$name,'email'=>$email,'country_code'=>$country_code,'mobile'=>$mobile,'password'=>$password,'address'=>$address]);


            return redirect('Buyer/buyer_login');


        }

        public function buyer_authenticate(Request $request){

               $validated=$request->validate([
              
               
                'email'=>'required|email',
             
                'password'=>'required|min:6',
         
               
            ]);

       $remember=($request->input('remember')) ? true : false;
       $login_atempt=Auth::guard('buyer')->attempt([



        'email'=>$request->input('email'),
        'password'=>$request->input('password')



      ],$remember);

        if($login_atempt) {
        
           $request->session()->regenerate();

           return redirect('/');

         }else{

           $email=$request->input('email');

           $count=Buyer::where('email',$email)->count();

        if($count ==0){

              return redirect('Buyer/buyer_login')->with('error','complete your Registration !');

             }else{

                  return redirect('Buyer/buyer_login')->with('error','please check your password !');

             } 

          }
       }

       public function forget_password(){
  
            return view('Buyer.forget_password');

       }

       public function send_url(Request $request){


           $validated=$request->validate([


                'email'=>'required|email',
             
               
            ]);

           $email=$request->input('email');

          $count=Buyer::where('email',$email)->count();

         if($count==0){

              return redirect('Buyer/forget_password')->with('error','Invalid User!');

             }else{

                  $user_data=Buyer::where('email',$email)->get();

                  $id=$user_data[0]->id;

                  $name=$user_data[0]->name;


                  $email=$request->email;
                  $buyer=Buyer::where('email',$email)->get();
                  $buyer_id=$buyer[0]->id;
                  $name=$buyer[0]->name;

                  $meta['FROM_EMAIL']="apptest2303@gmail.com";
                  $meta['email']=$request->email;
                  $meta['subject']="reset password mail";  
                  $meta['id']=$id;
                  $meta['name']=$name;
         
                 Mail::send('email.buyer_reset_password', $meta, function($m) use($meta){
        
                    $m->from($meta['FROM_EMAIL'],'reset password mail');
                    $m->to($meta['email']);
                    $m->subject($meta['subject']); 

                  });
    
                  return redirect('Buyer/forget_password')->with('success','reset password url send on your email address!');

             } 

       }

       public function reset_password($id){


          $data['id']=$id;

          return view('Buyer.reset_password',$data);

       }

       public function update_password(Request $request, $id){

           $validated=$request->validate([


                'password'=>'required|min:6',

                'confirm_password'=>'required|same:password',
             
               
            ]);

            $password=$request->input('password');

            Buyer::where('id',$id)->update(['password'=>Hash::make($password)]);

            return redirect('Buyer/buyer_login')->with('success','password updated successfully!');


       }

    





        

}
