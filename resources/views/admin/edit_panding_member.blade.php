@extends('admin.layout.header')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css">
 <div class="head-banner">
         <ul class="breadcrumb">
            <li>
               <a href="{{url('admin/home')}}">Home</a>
            </li>
            <li>
              
               <a href=""><span>Edit Student Detail</span></a>
             
            </li>
         </ul>
      </div>
      <div class="page mt-4 hosting-page title1 page-with" style="display: block;">
         <div class="list1">
        
            <h4 class="mb-4">Edit Student Detail</h4>
       
         </div>
         <form action="{{url('admin/store_panding_student')}}/{{$id}}" method="post" enctype="multipart/form-data">
         	@csrf
         <div class="detail table-responsive">
            <div class="details_main">

               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>FirstName</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="text" placeholder="Enter first name" name="fname" value="{{$fname}}" >
                             @if($errors->has('fname')) <p class="error_mes">{{ $errors->first('fname') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>

                <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>LastName</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="text" placeholder="Enter last name" name="lname" value="{{$lname}}" >
                             @if($errors->has('lname')) <p class="error_mes">{{ $errors->first('lname') }}</p> @endif
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
                           <input type="text" placeholder="Enter Email" name="email" value="{{$email}}" >
                             @if($errors->has('email')) <p class="error_mes">{{ $errors->first('email') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>
                
               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Mobile No</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="text" placeholder="Enter mobile" name="mobile" value="{{$mobile}}" >
                             @if($errors->has('mobile')) <p class="error_mes">{{ $errors->first('mobile') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>
                <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>UserName</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="text" placeholder="Enter username" name="username" value="{{$username}}" >
                             @if($errors->has('username')) <p class="error_mes">{{ $errors->first('username') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>
                <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Password</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="text" placeholder="Enter password" name="password" value="{{$password}}" >
                             @if($errors->has('password')) <p class="error_mes">{{ $errors->first('password') }}</p> @endif
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
     


@endsection