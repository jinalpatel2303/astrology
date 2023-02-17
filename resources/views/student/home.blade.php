@extends('student.layout.header')

@section('content')


<div class="page mt-4 hosting-page title1" style="display: block;">
      <h4 class="mb-0">{{$fname}} {{$lname}} - Dashboard</h4>
   </div>

 <div class="head-banner">
         <ul class="breadcrumb">
            <li>
               <a href="{{url('/student/home')}}/{{Auth::id()}}">Home</a>
            </li>
            <li>
               <a href=""><span>{{$fname}} {{$lname}}</span></a>
            </li>
         </ul>
      </div>
      
      <?php 
      
      $auth_id=Auth::id();
      
      
       $student_data =DB::table('student_login')->where('id',$auth_id)->get();
       
       $student_id= $student_data[0]->student_id;
      
      
      
      ?>



      <div class="dash_card">
         <div class="row">
            <div class="col-lg-3">
                
                  <div class="small-box bg-success">
                   
                   <a href="{{url('/student/notes_videos')}}/{{Auth::id()}}">
               
                  <div class="inner">
                         <p><h4>{{$notes}}</h4></p>
                     <h3>Notes</h3>
                  
                  </div>
                
                  <div class="icon">
                   <i class="fa-solid fa-book"></i>
                  </div>
                  <a class="small-box-footer"></a>
                  </a>
               </div>
            
              
            </div>
              <div class="col-lg-3">
                
                  <div class="small-box bg-danger">
                   
                   <a href="#<!--{{url('/student/videos')}}/{{ $student_id}}-->">
               
                  <div class="inner">
                         <p><h4>{{$videos}}</h4></p>
                     <h3>Videos</h3>
                  
                  </div>
                
                  <div class="icon">
                   <i class="fa-solid fa-book"></i>
                  </div>
                  <a class="small-box-footer"></a>
                  </a>
               </div>
            
              
            </div>
            
           
            
         </div>
      </div>
      
    
      
   
   
@endsection