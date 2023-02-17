@extends('admin.layout.header')

@section('content')


 <div class="head-banner">
         <ul class="breadcrumb">
            <li>
               <a href="{{url('admin/home')}}">Home</a>
            </li>
            <li>

               <a href=""><span>Update Contact Title</span></a>
               
            </li>
         </ul>
      </div>
      <div class="page mt-4 hosting-page title1 page-with" style="display: block;">
         <div class="list1">

            <h4 class="mb-4">Update Contact Title</h4>
            
         </div>
         <form action="{{url('admin/store_update_contact_title_description_data')}}/{{$id}}" method="post" enctype="multipart/form-data">
         	@csrf
         <div class="detail table-responsive">
            <div class="details_main">

               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Sub_title</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="text" placeholder="Enter sub_title" name="sub_title" value="{{$sub_title}}" >
                             @if($errors->has('sub_title')) <p class="error_mes">{{ $errors->first('sub_title') }}</p> @endif
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

               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>form_title</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="text" placeholder="Enter form_title" name="form_title" value="{{$form_title}}" >
                             @if($errors->has('form_title')) <p class="error_mes">{{ $errors->first('form_title') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>

               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>email</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="text" placeholder="Enter email" name="email" value="{{$email}}" >
                             @if($errors->has('email')) <p class="error_mes">{{ $errors->first('email') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>

               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>phone_no</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="number" placeholder="Enter phone_no" name="phone_no" value="{{$phone_no}}" >
                             @if($errors->has('phone_no')) <p class="error_mes">{{ $errors->first('phone_no') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>

                <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Location</label>
                        </div>
                        <div class="col-lg-10 data">
                            <textarea type="text" name="location">{{$location}}</textarea> 
                            @if($errors->has('location')) <p class="error_mes">{{ $errors->first('location') }}</p> @endif
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