<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Models\Admin;
use DB;

class NotesController extends Controller
{
     public function notes(){



           $data = DB::table('notes_master')->join('category_master','category_master.id','notes_master.cat_id')->join('course_master','course_master.id','notes_master.course_id')->select("notes_master.*","category_master.name as cname","course_master.name as sname")->orderBy('id','desc')->paginate(10); 

          
        return view('admin.notes', compact('data'))->render();

    }


   


      public function search_notes(Request $request){

        $text=$request->search_string;

        $data = DB::table('notes_master')->join('category_master','category_master.id','notes_master.cat_id')->join('course_master','course_master.id','notes_master.course_id')->
            where('notes_master.notes_title', 'like', '%' . $text . '%')->orwhere('notes_master.date', 'like', '%' . $text . '%')->orwhere('category_master.name', 'like', '%' . $text .'%')->orwhere('course_master.name', 'like', '%' . $text . '%')->select("notes_master.*","category_master.name as cname","course_master.name as sname")->orderBy('id','desc')->paginate(10); 

        if($data->count() >= 1){

        return view('admin.notes_search' ,compact('data'))->render();  //compact data must be in variable
        }else{

        return response()->json([
                'status'=>'nothing_found',
            ]);
        }

      }


      public function add_notes(){


      $data['category']=DB::table('category_master')->get();

      $data['course']=DB::table('course_master')->get();

       return view ('admin.add_notes',$data);


      }

      public function get_category($id){

       return json_encode( DB::table('category_master')->where('course_id',$id)->get()->toArray());

      }

      public function store_notes(Request $request){


          $validated=$request->validate([

                'course'=>'required',
                'category'=>'required',
                'title'=>'required',
                'file'=>'required',
               
            ]);


            $title=$request->input('title');
            $category=$request->input('category');
            $course=$request->input('course');

            $file=$request->file('file');

           $description=$request->input('description');

            $date = date('Y-m-d', time());

            $filename='';

            if($file){

                $destinationPath='uploads/notes';

                $filename=time().'_'.$file->getClientOriginalName();

                $file->move($destinationPath, $filename);


            }

            DB::table('notes_master')->insert(['notes_title'=>$title,'cat_id'=>$category,'course_id'=>$course,'upload'=>$filename,'description'=>$description,'date'=>$date]);

            return redirect('admin/notes')->with('error','New Notes Added !');


    
      }

      public function view_notes_detail($id){



         $notes=DB::table('notes_master')->where('id',$id)->get();

          $data['notes_title']=$notes[0]->notes_title;
          $course=$notes[0]->course_id;
          $category=$notes[0]->cat_id;
          $data['file']=$notes[0]->upload;
          $data['description']=$notes[0]->description;
          $data['date']=$notes[0]->date;


           $category_row=DB::table('category_master')->where('id',$category)->get();

           $data['category']=$category_row[0]->name;

           $course_row=DB::table('course_master')->where('id',$course)->get();

           $data['course']=$course_row[0]->name;

           return view('admin.notes_detail',$data);


      }

      public function delete_notes($id){


      $notes=DB::table('notes_master')->where('id', $id)->get();


        $file=$notes[0]->upload;

        if($file !=''){

            unlink(public_path('/uploads/notes/'.$file));
        }

        DB::table('notes_master')->where('id', $id)->delete();

        return response()->json([
         'success' => 'Record has been deleted successfully!'
        ]);

      }

      public function delete_all_list(Request $request){

        $ids = $request->ids;
            foreach($ids as $id){

            $notes_master=DB::table('notes_master')->where('id', $id)->get();

            if($notes_master !=''){

                foreach($notes_master as $pi){


                      if ($pi->upload!=''){

                        unlink(public_path("/uploads/notes/".$pi->upload));
                      }


                  }

              }

           DB::table('notes_master')->where('id', $id)->delete();
          
            }

            return response()->json(['status'=>200]);

      }

     public function update_notes($id)
      {

         $notes=DB::table('notes_master')->where('id',$id)->get();

          $data['notes_title']=$notes[0]->notes_title;
          $data['course']=$notes[0]->course_id;
          $data['category']=$notes[0]->cat_id;
          $data['file']=$notes[0]->upload;
          $data['description']=$notes[0]->description;
          $data['date']=$notes[0]->date;
           $data['id']=$notes[0]->id;

          $file=$notes[0]->upload;

          $infoPath = pathinfo(public_path('/uploads/notes/'.$file));
  
          $extension = $infoPath['extension'];

          $data['extension']=$extension;

           $category_row=DB::table('category_master')->get();

           $data['category_list']=$category_row;

           $course_row=DB::table('course_master')->get();

           $data['course_list']=$course_row;

           return view('admin.update_notes',$data);
        
      }

      public function store_update_notes(Request $request,$id){


          $validated=$request->validate([

                'course'=>'required',
                'category'=>'required',
                'title'=>'required',
               
               
            ]);


            $title=$request->input('title');
            $category=$request->input('category');
            $course=$request->input('course');

            $file=$request->file('file');

           $description=$request->input('description');

            /*$date = date('Y-m-d', time());*/


            if($file){

                $filename='';

                $destinationPath='uploads/notes';

                $filename=time().'_'.$file->getClientOriginalName();

                 $file->move($destinationPath, $filename);
                 
                  DB::table('notes_master')->where('id',$id)->update(['upload'=>$filename]);

                 if($request->oldfile !=''){


                    unlink(public_path('/uploads/notes/'.$request->oldfile));

                 }

                 
 
              }

          DB::table('notes_master')->where('id',$id)->update(['notes_title'=>$title,'cat_id'=>$category,'course_id'=>$course,'description'=>$description]);

            return redirect('admin/notes')->with('error','Notes Data Updated !');


      }
}
