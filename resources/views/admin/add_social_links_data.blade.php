@extends('admin.layout.header')

@section('content')


 <div class="head-banner">
         <ul class="breadcrumb">
            <li>
               <a href="{{url('admin/home')}}">Home</a>
            </li>
            <li>
               @if($id==0)
               <a href=""><span>Add Social Links</span></a>
               @else
               <a href=""><span>Update Social Links</span></a>
               @endif
            </li>
         </ul>
      </div>
      <div class="page mt-4 hosting-page title1 page-with" style="display: block;">
         <div class="list1">
           @if($id==0)
            <h4 class="mb-4">Add Social Links</h4>
          @else
            <h4 class="mb-4">Update Social Links</h4>
            @endif
         </div>
         <form action="{{url('admin/store_add_social_links_data')}}/{{$id}}" method="post" enctype="multipart/form-data">
         	@csrf
         <div class="detail table-responsive">
            <div class="details_main">
              
               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Facebook_url</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="url" placeholder="Enter facebook_url" name="facebook_url" value="{{$facebook_url}}" >
                             @if($errors->has('facebook_url')) <p class="error_mes">{{ $errors->first('facebook_url') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>

               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Twitter_url</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="url" placeholder="Enter twitter_url" name="twitter_url" value="{{$twitter_url}}" >
                             @if($errors->has('twitter_url')) <p class="error_mes">{{ $errors->first('twitter_url') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>

               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Linkedin_url</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="url" placeholder="Enter linkedin_url" name="linkedin_url" value="{{$linkedin_url}}" >
                             @if($errors->has('linkedin_url')) <p class="error_mes">{{ $errors->first('linkedin_url') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>

               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Instagram_url</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="url" placeholder="Enter instagram_url" name="instagram_url" value="{{$instagram_url}}" >
                             @if($errors->has('instagram_url')) <p class="error_mes">{{ $errors->first('instagram_url') }}</p> @endif
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
      <style type="text/css">
         .row{
            margin-left: 0px!important;
         }
      </style>

      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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

</script>



@endsection