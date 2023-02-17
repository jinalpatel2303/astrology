<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use Redirect;
use App\Http\Controllers\Controller;
use Illuminate\support\facades\Auth;
use App\Models\Admin;
use Illuminate\support\MessageBag;
use Illuminate\Support\Facades\Mail;
use Illuminate\support\facades\Input;
use DB;
use Hash;

use Carbon\Carbon;

class Studentlogincontroller extends Controller
{
    public function login_user(Request $request){

        
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);



        if ($validator->passes()) {

          
            /*$credentials = $request->only('username', 'password');*/

            $user=DB::table('student_login')->where('username',$request->username)->get();

            if(count($user) == 0){

                return response()->json(['error'=>'invalid credentials !!']);

            }else{

                $password=$user[0]->password;
                $user_id=$user[0]->id;

            if ($password == $request->password) {

                    auth()->loginUsingId($user_id);

                    return response()->json(['status'=>$user_id,
                                        'success'=>'welcome user !!']);

            }

            else{

                return response()->json(['error'=>'invalid credentials !!']);

                }
            }

            
            }
        else{

            return response()->json(['error'=>$validator->errors()]);
        }

    }

    public function logout(){

         Auth::guard('web')->logout();

         return redirect('/login');
      }
}
