@extends('admin.layout.header')

@section('content')


 <div class="head-banner">
         <ul class="breadcrumb">
            <li>
               <a href="{{url('admin/home')}}">Home</a>
            </li>
            <li>
               @if($id==0)
               <a href=""><span>Add Header Contact</span></a>
               @else
               <a href=""><span>Update Header Contact</span></a>
               @endif
            </li>
         </ul>
      </div>
      <div class="page mt-4 hosting-page title1 page-with" style="display: block;">
         <div class="list1">
           @if($id==0)
            <h4 class="mb-4">Add Header Contact</h4>
          @else
            <h4 class="mb-4">Update Header Contact</h4>
            @endif
         </div>
         <form action="{{url('admin/store_add_header_contact_data')}}/{{$id}}" method="post" enctype="multipart/form-data">
         	@csrf
         <div class="detail table-responsive">
            <div class="details_main">
              
               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Mobile no</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="number" placeholder="Enter Mobile no" name="mobile_no" value="{{$mobile_no}}" >
                             @if($errors->has('mobile_no')) <p class="error_mes">{{ $errors->first('mobile_no') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>

               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Email</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="text" placeholder="Enter email" name="email" value="{{$email}}" >
                             @if($errors->has('email')) <p class="error_mes">{{ $errors->first('email') }}</p> @endif
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