<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Models\Admin;
use DB;

class ProductController extends Controller
{

    public function product_category_banner(){

        $product_category=DB::table('product_category')->get();

        $data['product_category']=$product_category;

        $product_category_banner=DB::table('banner_image')->get();

        $data['product_category_banner']=$product_category_banner;

        return view('admin.product_category_banner',$data);
    }

    public function product_category(){

        $product_category=DB::table('product_category')->get();

        $data['product_category']=$product_category;

        $product_category_banner=DB::table('banner_image')->get();

        $data['product_category_banner']=$product_category_banner;

        return view('admin.product_category',$data);
    }

    public function add_product_category_data($id){
        
        if($id==0){

            $data['category']='';

            $data['id']=$id;
        }
        else{

            $product_category=DB::table('product_category')->where('id',$id)->get();

            $data['id']=$product_category[0]->id;

            $data['category']=$product_category[0]->category;
        }

        return view('admin.add_product_category_data',$data);
    }


    public function store_add_product_category_data(Request $request,$id){

        if($id ==0){

            $validated=$request->validate([
                'category'=>'required|unique:product_category,category',
            ]);

            $category=$request->input('category');

            DB::table('product_category')->insert(['category'=>$category ,]);

            DB::table('banner_image')->insert(['page_name'=>$category , 'title'=>$category]);

            return redirect('/admin/product_category')->with('error','data submitted successfully!!');
        }

        else{

            $validated=$request->validate([
                'category'=>'required|unique:product_category,category,'.$id,
            ]);


            $category=$request->input('category');

            $oldcategory=$request->input('oldcategory');
            
            DB::table('product_category')->where('id',$id)->update(['category'=>$category ,]);

            DB::table('banner_image')->where('page_name',$oldcategory)->update(['page_name'=>$category ,]);

            return redirect('/admin/product_category')->with('error','data updated successfully!!');
        }
    }

    

    public function delete_product_category($id){

        $data=DB::table('product_category')->where('id',$id)->get();

        $category_name=$data[0]->category;

        DB::table('product_category')->where('id',$id)->delete();

        DB::table('banner_image')->where('page_name',$category_name)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    } 



    public function product_sub_category(){

        $product_sub_category=DB::table('product_sub_category')->get();

        $data['product_sub_category']=$product_sub_category;

        $product_category=DB::table('product_category')->get();

        $data['product_category']=$product_category;

        return view('admin.product_sub_category',$data);
    }

    public function add_product_sub_category_data($id){

        $product_category=DB::table('product_category')->get();

        $data['product_category']=$product_category;
        
        if($id==0){

            $data['sub_category']='';

            $data['id']=$id;

            $data['category_id']='';

            $data['category_name']='Select Category';
        }
        else{

            $product_sub_category=DB::table('product_sub_category')->where('id',$id)->get();

            $data['id']=$product_sub_category[0]->id;

            $data['sub_category']=$product_sub_category[0]->sub_category;

            $category_id=$product_sub_category[0]->category_id;

            $data['category_id']=$product_sub_category[0]->category_id;

            $pr_cat=DB::table('product_category')->where('id',$category_id)->get();

            $data['category_name']=$pr_cat[0]->category;
        }

        return view('admin.add_product_sub_category_data',$data);
    }


    public function store_add_product_sub_category_data(Request $request,$id){

        if($id ==0){

            $validated=$request->validate([
                'sub_category'=>'required|unique:product_sub_category,sub_category',
                'category'=>'required',
            ]);

            $category=$request->input('category');

            $sub_category=$request->input('sub_category');

            DB::table('product_sub_category')->insert(['sub_category'=>$sub_category,'category_id'=>$category,]);

            return redirect('/admin/product_sub_category')->with('error','data submitted successfully!!');
        }

        else{

            $validated=$request->validate([
                'sub_category'=>'required|unique:product_sub_category,sub_category,'.$id,
                'category'=>'required',
            ]);

            $category=$request->input('category');

            $sub_category=$request->input('sub_category');
            
            DB::table('product_sub_category')->where('id',$id)->update(['sub_category'=>$sub_category,'category_id'=>$category ,]);

            return redirect('/admin/product_sub_category')->with('error','data updated successfully!!');
        }
    }

    

    public function delete_product_sub_category($id){

        DB::table('product_sub_category')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    } 





    




    public function product(){

        $product=DB::table('product')->select("product.*")->orderBy('id','Desc')->paginate(2);

        $product_category=DB::table('product_category')->get();

        $product_sub_category=DB::table('product_sub_category')->get();

        $product_image=DB::table('product_image')->get();


           return view('admin.product', compact('product','product_category','product_sub_category','product_image'))->render();


       
       }

       public function search_product(Request $request){

        $search=$request->search_string;

        $product_category=DB::table('product_category')->get();

        $product_sub_category=DB::table('product_sub_category')->get();

        $product_image=DB::table('product_image')->get();

         $product = DB::table('product')->join('product_category','product_category.id','product.category_id')->join('product_sub_category','product_sub_category.id','product.sub_category_id')->select("product.*","product_category.category as category","product_sub_category.sub_category as sub_category")
          ->where(function($query) use($search){
            $query->where('product.product_name', 'like', '%' . $search . '%')
              ->orwhere('product_category.category', 'like', '%' . $search . '%')
             ->orwhere('product_sub_category.sub_category', 'like', '%' . $search . '%')
             ->orwhere('product.price', 'like', '%' . $search . '%')
             ->orwhere('product.quantity', 'like', '%' . $search . '%');
            })
          ->orderBy('id','Desc')
          ->paginate(2);
 

        if($product->count() >= 1){

        return view('admin.product_search' ,compact('product','product_category','product_sub_category','product_image'))->render();  //compact data must be in variable
        }else{

        return response()->json([

                'status'=>'nothing_found',

            ]);
         }

       }




    public function add_product_data($id){

        $data['product_category']=DB::table('product_category')->get();

        $data['product_sub_category']=DB::table('product_sub_category')->get();
        
        if($id==0){

            $data['product_name']='';

            $data['id']=$id;

            $data['price']='';

            $data['quantity']='';

            $data['category_id']='';

            $data['sub_category_id']='';

            $data['description']='';

            $data['sub_category_name']='Select Sub Category';

            $data['category_name']='Select Category';

            $data['product_image']='';
        }
        else{

            $product=DB::table('product')->where('id',$id)->get();

            $data['id']=$product[0]->id;

            $data['product_name']=$product[0]->product_name;

            $data['price']=$product[0]->price;

            $data['quantity']=$product[0]->quantity;

            $data['category_id']=$product[0]->category_id;

            $data['sub_category_id']=$product[0]->sub_category_id;

            $data['description']=$product[0]->description;

            $category_id=$product[0]->category_id;

            $sub_category_id=$product[0]->sub_category_id;

            $data['category_id']=$product[0]->category_id;

            $data['sub_category_id']=$product[0]->sub_category_id;

            $pr_cat=DB::table('product_category')->where('id',$category_id)->get();

            $data['category_name']=$pr_cat[0]->category;

            $pr_sub_cat=DB::table('product_sub_category')->where('id',$sub_category_id)->get();

            $data['sub_category_name']=$pr_sub_cat[0]->sub_category;

            $data['product_image']=DB::table('product_image')->where('product_id',$id)->get();
        }

        return view('admin.add_product_data',$data);
    }


    public function store_add_product_data(Request $request,$id){

        if($id ==0){

            $validated=$request->validate([
                'image'=>'required',
                'product_name'=>'required',
                'price'=>'required',
                'quantity'=>'required',                
                'sub_category_id'=>'required',
                'category_id'=>'required',
                'description'=>'required',
            ]);

            $product_name=$request->input('product_name');

            $price=$request->input('price');

            $quantity=$request->input('quantity');

            $description=$request->input('description');

            $category_id=$request->input('category_id');

            $sub_category_id=$request->input('sub_category_id');

            DB::table('product')->insert(['product_name'=>$product_name,'price'=>$price,'quantity'=>$quantity,'description'=>$description,'sub_category_id'=>$sub_category_id,'category_id'=>$category_id,]);

            $product_id=DB::table('product')->max('id');

            $file=$request->file('image');

            if($file !=''){

                foreach($file as $f){

                    $imagename= '';

                    $destination_path='uploads';

                    $imagename=time().'_'.$f->getClientOriginalName();

                    $f->move($destination_path ,$imagename);

                    DB::table('product_image')->insert(['image'=>$imagename , 'product_id'=>$product_id]);
                }
            }

            return redirect('/admin/product')->with('error','data submitted successfully!!');
        }

        else{

            $validated=$request->validate([
                'product_name'=>'required',
                'price'=>'required',
                'quantity'=>'required',                
                'sub_category_id'=>'required',
                'category_id'=>'required',
                'description'=>'required',
            ]);

            $product_name=$request->input('product_name');

            $price=$request->input('price');

            $quantity=$request->input('quantity');

            $description=$request->input('description');

            $category_id=$request->input('category_id');

            $sub_category_id=$request->input('sub_category_id');
            
            DB::table('product')->where('id',$id)->update(['product_name'=>$product_name,'price'=>$price,'quantity'=>$quantity,'description'=>$description,'sub_category_id'=>$sub_category_id,'category_id'=>$category_id,]);

            $file=$request->file('image');

            if($file !=''){

                foreach($file as $f){

                    $imagename= '';

                    $destination_path='uploads';

                    $imagename=time().'_'.$f->getClientOriginalName();

                    $f->move($destination_path ,$imagename);

                    DB::table('product_image')->insert(['image'=>$imagename , 'product_id'=>$id]);
                }
            }

            return redirect('/admin/product')->with('error','data updated successfully!!');
        }
    }







    public function delete_product_image($id){

        $userdata=DB::table('product_image')->where('id',$id)->get();

        $image=$userdata[0]->image;

        $product_id=$userdata[0]->product_id;

        if($image){
            unlink(public_path('/uploads/'.$image));
        }

        DB::table('product_image')->where('id',$id)->delete();

        return redirect('/admin/add_product_data/'.$product_id);
    }

    public function update_product_image($id){

        $userdata=DB::table('product_image')->where('id',$id)->get();

        $data['id']=$userdata[0]->id;

        $data['image']=$userdata[0]->image;

        return view('admin.update_product_image',$data);
    }

    public function store_update_product_image(Request $request,$id){

        $file=$request->file('image');

        $imagename='';

        $oldimage=$request->input('oldimage');

        if($file){

            $destination_path='uploads';

            $imagename=time().'_'.$file->getClientOriginalName();

            $file->move($destination_path,$imagename);

            if($oldimage){

                unlink(public_path('/uploads/'.$oldimage));
            }

            DB::table('product_image')->where('id',$id)->update(['image'=>$imagename]);
        }

        $userdata=DB::table('product_image')->where('id',$id)->get();

        $product_id=$userdata[0]->product_id;

        return redirect('/admin/add_product_data/'.$product_id)->with('error','Image updated successfully !!');
    }




    

    public function delete_product($id){

        $image_file=DB::table('product_image')->where('product_id', $id)->get();

                    if($image_file !=''){

                      foreach($image_file as $pi){


                          if ($pi->image!=''){

                            unlink(public_path("/uploads/".$pi->image));
                          }

                      }
 
                  }

        DB::table('product_image')->where('product_id',$id)->delete();

        DB::table('product')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);


    }





    public function view_product($id){

        $data['product']=DB::table('product')->where('id',$id)->get();

        $data['product_category']=DB::table('product_category')->get();

        $data['product_sub_category']=DB::table('product_sub_category')->get();

        $data['product_image']=DB::table('product_image')->get();

        return view('admin.view_product',$data);
    }




    public function open_cat(Request $request){
         
        $parent_id = $request->cat_id;
         
        $subcategories = DB::table('product_sub_category')->where('category_id',$parent_id)->get();

        $output='';

        if($subcategories  !=''){

            $output .='<option value="">Select your category</option>';

        foreach($subcategories as $s){

           $output .='<option value="'.$s->id.'">'.$s->sub_category.'</option>';
        }
    }

        return response($output);
    }



}
