@extends('admin.layout.header')

@section('content')

<style type="text/css">
   .co_edit {
       padding: 20px 0 80px;
   }
   .in_manu {
       background: #f5f6f9;
       margin: 30px 0;
   }
   .in_manu .container{
      max-width: 1250px!important;
   }
   .in_manu .breadcumbs1 {
       padding: 13px 72px;
   }
   .box-button {
       text-align: right;
       padding-top: 40px;
       position: relative;
       right: -15px;
   }
   .edit_image img {
       width:10%;
       border-radius: 10px;
       margin: 0 auto;
   }
   .nav1 {
       display: block!important;
       width: 40%;
       margin: 0 0 0 auto !important;
   }
   .edit_image {
       padding-bottom: 20px;
       text-align: center;
   }
   .edit_inner {
       padding-bottom: 20px;
   }
   .edit1 {
      width: 20%;
       padding-bottom: 20px;
   }
   .edit2 {
      width: 40%;
       padding-bottom: 20px;
   }
   .edit3 {
       width: 100%;
       padding-bottom: 20px;
   }
   .col-md-12.data {
       padding-left: 0;
   }
   .col-md-12.label {
       padding-left: 0;
   }
   .edit1 input {
       padding: 8px 10px;
       width:100%;
       border: 1px solid #adb5bd;
       border-radius: 7px;
   }
   .edit_d-flex {
       display: flex;
       justify-content: center;
   }
   .edit1 label {
       font-weight: 600;
   }
   .edit_btn button {
       border: none;
       padding: 8px 60px;
       background-color: #df453e;
       color: white;
       font-size: 20px;
       font-weight: 600;
       border-radius: 7px;
   }
   .edit_sub {
      text-align: center;
      padding-left: 90px;
   }
   .edit_btn {
       padding-top: 20px;
       text-align: center;
   }
   .edit_main {
       padding-top: 40px;
   }
   ul.tabs{
      margin: 0px;
      padding: 0px;
      list-style: none;
      text-align: center;
   }
   ul.tabs li{
      background: none;
      color: #222;
      display: inline-block;
      padding: 10px 40px;
      cursor: pointer;
   }
   ul.tabs li.current {
       background: #1b3e41;
       color: #f5f6f9;
   }
   .edit_main .tab-content{
      display: none;
      padding: 15px;
   }
   .tab-content.current{
      display: inherit;
   }
   .e_main{
      width: 50%;
      margin: 0 auto;
   }
   .e_main {
       width: 25%;
       margin: 0 auto;
       padding-top: 40px;
   }
   .co_edit textarea {
       overflow: auto;
       resize: vertical;
       width: 100%;
       height: 100px;
       border-radius: 7px;
       border: 1px solid #adb5bd;
   }


   /*edit profile responsive*/

   @media only screen and (max-width: 767px){  
      .row1 {
           align-items: center;
           margin: 0 !important;
       }
       .edit_image img {
           width: 40% !important;
       }
       ul.tabs li {
           padding: 10px 32px !important;
       }
       .edit_sub input[type="file"] {
          width: 100%;
      }
      .edit_d-flex {
          display: block;
          justify-content: center;
      }
      .edit1 {
          width: 100%;
      }
      .e_main {
          width: 100%;
      }

   }
   @media only screen and (max-width: 320px){
      ul.tabs li {
          padding: 10px 23px !important;
      }
      .m_menu nav {
          width: 227px;
      }
   }
</style>

<div class="co_edit">
      <!-- <div class="container"> -->
         <!-- <ul class="tabs">
           <a href="{{url('/student/edit_profile')}}/{{Auth::id()}}"><li class="tab-link current" data-tab="tab">Edit Profile</li></a> 
              <a href="student/change_password"><li class="tab-link" data-tab="tab">Change Password</li></a>
         </ul> -->
         <div class="page mt-4 hosting-page title1" style="display: block;">
            <h4 class="mb-0">Edit Profile</h4>
         </div>
         <form action="{{url('/admin/store_edit_profile')}}" enctype="multipart/form-data" method="POST">

            @csrf
            
               <div id="tab-1" class="tab-content current">
                  <div class="edit_main">
                     <div class="edit_inner">
                        <div class="edit_image">
                           
                           <img id="blah" src="/uploads/dummy_image.webp">

                                             </div>
                        <!-- <div class="edit_sub">
                           <input type="file" name="image" onchange="readURL(this);">
                           <input type="hidden" name="oldimage" value="">
                         
                        </div>  --> 
                     </div>
                     <div class="edit_d-flex">
                        <div class="edit1">
                           <div class="col-md-12 label">
                              <label>Name</label>
                           </div>
                           <div class="col-md-12 data">
                             <input type="text" name="name" value="{{$name}}">
                           </div>    
                        </div>

                        <div class="edit1">
                           <div class="col-md-12 label">
                              <label>Phone Number</label>
                           </div>
                           <div class="col-md-12 data">
                              <input type="text" name="phone_no" value="{{$phone_no}}">
                           </div>   
                        </div>
                     </div>
                     <div class="edit_d-flex">
                        <div class="edit1 edit2">
                           <div class="col-md-12 label">
                              <label>Email</label>
                           </div>
                           <div class="col-md-12 data">
                              <input type="text" name="email" value="{{$email}}">
                           </div>   
                        </div>
                     </div>
                     <div class="edit_d-flex">
                        <div class="edit1 edit2">
                           <div class="col-md-12 label">
                              <label>Address</label>
                           </div>
                           <div class="col-md-12 data">
                              <textarea name="address">{{$address}}</textarea>
                           </div>   
                        </div>
                     </div>
                     <div class="edit_btn">
                        <button>Submit</button>
                     </div>
                  </div>
               </div>
         </form>


       
    <!-- </div> -->
   </div>


   @endsection