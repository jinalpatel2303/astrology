@extends('admin.layout.header')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css">
<style type="text/css">
   .details_inner label {
       color: black;
       font-size: 15px;
   }
   .label{
      text-align: left;
   }
   .new_input{
      width: 20%!important;
      margin-bottom: 5px;
      display: inline-block;
   }
</style>
 <div class="head-banner">
         <ul class="breadcrumb">
            <li>
               <a href="{{url('admin/home')}}">Home</a>
            </li>
            <li>
               @if($id==0)
               <a href=""><span>Add Student Alumni</span></a>
               @else
               <a href=""><span>Update Student Alumni</span></a>
               @endif
            </li>
         </ul>
      </div>
      <div class="page mt-4 hosting-page title1 page-with" style="display: block;">
         <div class="list1">
           @if($id==0)
            <h4 class="mb-4">Add Student Alumni</h4>
          @else
            <h4 class="mb-4">Update Student Alumni</h4>
            @endif
         </div>
         <form action="{{url('admin/store_add_student_alumni_data')}}/{{$id}}" method="post" enctype="multipart/form-data">
         	@csrf
         <div class="detail table-responsive">
            <div class="details_main">

                <div class="details_inner">
                  <div class="part-1">
                     <div class="col-lg-4 label">
                           <label>Image</label>
                        </div>
                     <div class="details_image">
                        <img src="/uploads/{{$image}}" id="blah">
                     </div>
                     <div class="details_sub">
                        <input type="file" name="image" onchange="readURL(this);" >
                           <input type="hidden" name="oldimage" value="{{$image}} "/>
                          @if($errors->has('image')) <p class="error_mes">{{ $errors->first('image') }}</p> @endif
                      
                     </div>  
                  </div>            
               </div>

               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Name</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="text" placeholder="Enter name" name="name" value="{{$name}}" >
                             @if($errors->has('name')) <p class="error_mes">{{ $errors->first('name') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div> 


               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Enrollment_no</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="number" placeholder="Enter enrollment no" name="enrollment_no" value="{{$enrollment_no}}" >
                             @if($errors->has('enrollment_no')) <p class="error_mes">{{ $errors->first('enrollment_no') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>

               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>City</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="text" placeholder="Enter city" name="city" value="{{$city}}">
                             @if($errors->has('city')) <p class="error_mes">{{ $errors->first('city') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>

               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Select Category</label>
                        </div>
                        <div class="col-lg-10 data">
                           <select name="category_id" id="category">
                              <option value="{{$category_id}}">{{$category_name}}</option>
                              @foreach($course_master as $pc)
                              @if($pc->id != $category_id)

                              <option value="{{$pc->id}}">{{$pc->name}}</option>
                               
                              @endif
                              @endforeach
                           </select>
                             @if($errors->has('category_id')) <p class="error_mes">{{ $errors->first('category_id') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>

               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Select Sub Category</label>
                        </div>
                        <div class="col-lg-10 data">
                           @if($id == 0)
                              <select name="sub_category_id[]" multiple id="subcategory">
                                 <option value="" disabled="disabled">{{$sub_category_id}}</option>
                                 @foreach($category_master as $pc)

                                 <option value="{{$pc->id}}">{{$pc->name}}</option>
                                 @endforeach
                              </select>
                           @else

                              
                                 @foreach($category_master_data as $pcd)
                                 <div class="new_input">
                                    <input type="text" readonly value="{{$pcd->sc_sub_category}}">
                                    <a href="{{url('/admin/delete_student_course_list')}}/{{$pcd->list_id}}"><i class="fas fa-trash-alt"></i></a>
                                 </div>
                                 

                                 @endforeach
                             

                              <select name="sub_category_id[]" multiple id="subcategory">
                                 <option value="" disabled="disabled">{{$sub_category_id}}</option>
                                 
                                 @foreach($category_master as $pc)

                                 <option value="{{$pc->id}}">{{$pc->name}}</option>

                                 @endforeach
                                 
                                 
                              </select>

                           @endif
                             @if($errors->has('sub_category_id')) <p class="error_mes">{{ $errors->first('sub_category_id') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div> 

               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Date</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="date" placeholder="Enter date" name="date" value="{{$date}}" >
                             @if($errors->has('date')) <p class="error_mes">{{ $errors->first('date') }}</p> @endif
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
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
        <script type="text/javascript">

           function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(130)
                        .height(130);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah1')
                        .attr('src', e.target.result)
                        .width(130)
                        .height(130);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

       $('#summernote').summernote({
        placeholder: 'About Us',
        tabsize: 2,
        height: 120,
        callbacks: {
                onImageUpload: function(image) {
                    uploadImage(image[0]);
                }
        },
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
      /*    ['view', ['fullscreen', 'codeview', 'help']]*/
        ]
      });




       $(document).ready(function () {
          $('#category').on('change',function(e) {
            var cat_id = e.target.value;
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': "{{ csrf_token() }}"
          }
      });

        $.ajax({
          url:"/admin/open_course",
          type:"POST",
          data: {
             cat_id: cat_id
          },
        success:function(data) {

              
              $('#subcategory').empty();

               $('#subcategory').html(data);

           }
          });
          });
        });

</script>



@endsection