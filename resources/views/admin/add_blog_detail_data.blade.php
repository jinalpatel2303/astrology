@extends('admin.layout.header')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css">
 <div class="head-banner">
         <ul class="breadcrumb">
            <li>
               <a href="{{url('admin/home')}}">Home</a>
            </li>
            <li>
               @if($id==0)
               <a href=""><span>Add Blog Detail</span></a>
               @else
               <a href=""><span>Update Blog Detail</span></a>
               @endif
            </li>
         </ul>
      </div>
      <div class="page mt-4 hosting-page title1 page-with" style="display: block;">
         <div class="list1">
           @if($id==0)
            <h4 class="mb-4">Add Blog Detail</h4>
          @else
            <h4 class="mb-4">Update Blog Detail</h4>
            @endif
         </div>
         <form action="{{url('admin/store_add_blog_detail_data')}}/{{$id}}" method="post" enctype="multipart/form-data">
         	@csrf
         <div class="detail table-responsive">
            <div class="details_main">

                <div class="details_inner">
                  <div class="part-1">
                     <div class="details_image">
                        <img src="/uploads/{{$image}}" id="blah">
                     </div>
                     <div class="details_sub">
                        <input type="file" name="image" onchange="readURL(this);" >
                           <input type="hidden" name="oldimage" value="{{$image}} "/>
                          @if($errors->has('image')) <p class="error_mes">{{ $errors->first('image') }}</p> @endif
                      <!-- <img id="blah" src="#" alt=""> -->
                     </div>  
                  </div>            
               </div>

               <div class="details_inner">
                  <div class="part-1">
                     <div class="details_image">
                        <img src="/uploads/{{$inner_image}}" id="blah1">
                     </div>
                     <div class="details_sub">
                        <input type="file" name="inner_image" onchange="readURL1(this);" >
                           <input type="hidden" name="oldimage1" value="{{$inner_image}} "/>
                          @if($errors->has('inner_image')) <p class="error_mes">{{ $errors->first('inner_image') }}</p> @endif
                      <!-- <img id="blah" src="#" alt=""> -->
                     </div>  
                  </div>            
               </div>


               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Creator Name</label>
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
                           <label>Date</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="date" placeholder="Enter date" name="date" value="{{$date}}" >
                             @if($errors->has('date')) <p class="error_mes">{{ $errors->first('date') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>

               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Number Of Comments</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="number" placeholder="Enter comment" name="comment" value="{{$comment}}" >
                             @if($errors->has('comment')) <p class="error_mes">{{ $errors->first('comment') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>
              
               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>title</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="text" placeholder="Enter title" name="title" value="{{$title}}" >
                             @if($errors->has('title')) <p class="error_mes">{{ $errors->first('title') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>

               <div class="part part">
                  <div class="col-md-12 label">
                     <label>Description</label>
                  </div>
                  <div class="col-md-12 data data1">
                     <div class="days data1">
                       <textarea type="text" name="description">{{$description}}</textarea>   
                     </div>
                  </div>
               </div>   

               <div class="part part">
                  <div class="col-md-12 label">
                     <label>Detail_Description</label>
                  </div>
                  <div class="col-md-12 data data1">
                     <div class="days data1">
                       <textarea type="text" name="detail_description" id="summernote">{{$detail_description}}</textarea>   
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
      <style type="text/css">
         .row{
            margin-left: 0px!important;
         }
      </style>
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


</script>



@endsection