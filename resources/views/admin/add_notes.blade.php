@extends('admin.layout.header')

@section('content')

 <div class="head-banner">
         <ul class="breadcrumb">
            <li>
               <a href="{{url('admin/home')}}">Home</a>
            </li>
            <li>
               
               <a href=""><span>Add New Notes</span></a>
             
            
            </li>
         </ul>
      </div>
      <div class="page mt-4 hosting-page title1 page-with" style="display: block;">
         <div class="list1">
          
            <h4 class="mb-4">Add New Notes</h4>
          
         </div>
         <form action="{{url('admin/store_notes')}}" method="post" enctype="multipart/form-data">
         	@csrf
         <div class="detail table-responsive">
            <div class="details_main">


                <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Course</label>
                        </div>
                        <div class="col-lg-10 data">
                        <select name="course" id="course" >
                           <option value="">Select Course</option>

                             @foreach($course as $c)

                              <option value="{{$c->id}}">{{$c->name}}</option>

                             @endforeach
                                       
                        </select>
                         @if($errors->has('course')) <p class="error_mes">{{ $errors->first('course') }}</p> @endif

                        </div>
                     </div>   
                  </div>
               </div>


                <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Category</label>
                        </div>
                        <div class="col-lg-10 data">
                        <select name="category" id="category">
                           <option value="">Select Category</option>

                          
                                       
                       </select>
                         @if($errors->has('category')) <p class="error_mes">{{ $errors->first('category') }}</p> @endif

                        </div>
                     </div>   
                  </div>
               </div>




               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Title</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="text" placeholder="Enter title" name="title" value="" >
                             @if($errors->has('title')) <p class="error_mes">{{ $errors->first('title') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>

              

               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Description</label>
                        </div>
                        <div class="col-lg-10 data">
                           <textarea type="text" placeholder="Enter Description" name="description" value=""></textarea >
                             @if($errors->has('description')) <p class="error_mes">{{ $errors->first('description') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>

                 <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-10 label">
                           <label>Notes</label>
                        </div>
                      
                        <div class="col-lg-6 data">
                            <input type="file" name="file" onchange="readURL(this);" >
                        
                            @if($errors->has('file')) <p class="error_mes">{{ $errors->first('file') }}</p> @endif
                        </div>
                          <div class="details_image" style="display: none">
                        <img src="/uploads/" id="blah">
                     </div>
                     </div>   
                  </div>
               </div>


                       
               <div class="uplode-btn" style="text-align: center;">
                  <button>submit</button>
                  <a href="{{url('admin/home')}}">Back to Home?</a>
               </div>
            </div>
         </div>

         </form>
      </div>
     

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script type="text/javascript">

        function readURL(input) {

             

            if (input.files && input.files[0]) {
                var reader = new FileReader();
         

                reader.onload = function (e) {
                      $('.details_image').css("display", "block");
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(130)
                        .height(130);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }


           $(document).ready(function(){

            $('select[name="course"]').on('change',function(){
                var id=$(this).val();

             
              
          if(id){

                $.ajax({

                     url:'get_category/'+id,
                     type:'GET',
                     dataType:'json',
              success:function(data){

                    console.log(data);

                  /*  var json = JSON.stringify(data);
                      console.log(json);
                    */

                       $('select[name="category"]').empty(); 

                       $('select[name="category"]').append('<option value="">Select Category </option>');


                       $.each(data,function(key,value){

                       $('select[name="category"]').append('<option value="'+value.id+'">'+value.name+'</option>');

                     });

                   }

                }); 
              }else{

                   $('select[name=""]').empty();
              }
               
            });
       
        });   



</script>



@endsection