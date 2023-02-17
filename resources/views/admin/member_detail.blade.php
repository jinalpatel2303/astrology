@extends('admin.layout.header')

@section('content')

  <div class="head-banner">
         <ul class="breadcrumb">
            <li>
               <a href="{{url('admin/home')}}">Home</a>
            </li>
            <li>
               <a href=""><span>Member Details</span></a>
            </li>
         </ul>
      </div>

   


      <div class="page mt-4 hosting-page title1" style="display: block;">
         <div class="list1">
            <h4 class="mb-0">Member Details</h4>

            
            <div class="btn1-main">
                <!-- <button class="btn1 delete-btn1">all delete</button> -->
              
            </div>
         </div>
        <div class="sear-list">
            <div class="row">
               <div class="col-lg-12">
                  <div class="sear-main">
                    
                    
                  </div>
               </div>
            </div>
         </div>
         <div class="pro-table table-responsive">
            <table class="table table-bordered table-striped">
               <thead>
                  <tr>
                     
                   <th>Date</th>

                   <th><?php

                   echo date('d-m-Y', strtotime($date));

                   ?>

                   </th>
                 
                 
                  </tr>
                   <tr>
                     
                   <th>Course</th>

                   <th>


                   @foreach($course as $c)
                     @foreach($apply_course as $ac)

                     @if($c->id==$ac->course_id)


                        {{$c->name}} <br>


                     @endif

                     @endforeach

                   @endforeach

                   </th>
                 
                 
                  </tr>
                  <tr>
                     
                   <th>First Name</th>

                   <th>{{$fname}}</th>
                 
                 
                  </tr>
                  <tr>
                     
                   <th>Last Name</th>

                   <th>{{$lname}}</th>
                 
                 
                  </tr>
                   <tr>
                     
                   <th>Email</th>

                   <th>{{$email}}</th>
                 
                 
                  </tr>

                   <tr>
                     
                   <th>Mobile</th>

                   <th>{{$mobile}}</th>
                 
                 
                  </tr>

                  @if($status==0)

                   <tr>

                       <th>Status</th>

                       <th style="color: red">Pending</th>

                     
                  </tr>

                    <tr>

                       <th>UserName</th>

                       <th></th>

                     
                  </tr>

                    <tr>

                       <th>Password</th>

                       <th></th>

                     
                  </tr>
                  @else


                   <tr>

                       <th>Status</th>

                       <th style="color: red">Approve</th>

                     
                  </tr>

                    <tr>

                       <th>UserName</th>

                       <th>{{$username}}</th>

                     
                  </tr>

                    <tr>

                       <th>Password</th>

                       <th>{{$password}}</th>

                     
                  </tr>

                


                  @endif
                 
               

               </thead>

              </table>




         
         </div>
      </div>

       <div class="btn1-main">
                <button class="btn1 delete-btn1"><a href="{{url('admin/member_list')}}" style="color: white;">Back</a></button>
              
            </div>

            <style type="text/css">

                .btn1-main{

                    position: relative;
                }

                
                .btn1 {
  
                top: 0px !important; 
 
                }
                .pdf_view{

                   color: bule;
                   cursor: pointer;

                }
               
            </style>

         

               
  @endsection