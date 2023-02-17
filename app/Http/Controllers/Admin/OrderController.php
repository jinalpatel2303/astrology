<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;
use DB;

class OrderController extends Controller
{

    public function order_list($id){


         $order_data=DB::table('order_item')->join('orders','orders.id','order_item.order_id')->join('product','product.id','order_item.product_id')->where('order_item.status',$id)->select("order_item.*","orders.name as name","orders.email as email","orders.email as email","orders.phone_no as phone_no","orders.address as address","orders.address_type as address_type","orders.city as city","orders.state as state","orders.pincode as pincode","orders.date as date","orders.total_price as total_price","orders.payment_mode as payment_mode","product.product_name as product_name","product.price as price")->orderBy('id','desc')->paginate(2); 

              $order_status_id=$id;


          $product_image=DB::table('product_image')->get();


         return view('admin.order_list', compact('order_data','product_image','order_status_id'))->render();


      }


     public function search_order(Request $request){

          $search=$request->search_string;

          $order_status_id=$request->order_status_id;


      $order_data=DB::table('order_item')->join('orders','orders.id','order_item.order_id')->join('product','product.id','order_item.product_id')->where('order_item.status',$order_status_id)->select("order_item.*","orders.name as name","orders.email as email","orders.email as email","orders.phone_no as phone_no","orders.address as address","orders.address_type as address_type","orders.city as city","orders.state as state","orders.pincode as pincode","orders.date as date","orders.total_price as total_price","orders.payment_mode as payment_mode","product.product_name as product_name","product.price as price")
          ->where(function($query) use($search){
            $query->where('product.product_name', 'like', '%' . $search . '%');
           
            })
          ->where('order_item.status', '=', $order_status_id )
          ->paginate(2);


           $product_image=DB::table('product_image')->get();

     

        if($order_data->count() >= 1){

        return view('admin.order_search' ,compact('order_data','product_image','order_status_id'))->render();  //compact data must be in variable
        }else{

        return response()->json([

                'status'=>'nothing_found',

            ]);
        }




       }

       public function change_order_status($id){


         DB::table('order_item')->where('id', $id)->update(['status'=>1]);

         return response()->json([
           'success' => 'Record has been deleted successfully!'
          ]);

     
       }
    
}
