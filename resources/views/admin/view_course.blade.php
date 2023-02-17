@extends('admin.layout.header')

@section('content')

<style type="text/css">
   .arr_d{
      display: flex;
      flex-wrap: wrap;
   }
   .arr_d1{
      width: 50%;
   }
   .arr_d tr th{
      display: block;
   }
   .table-title{
      font-size: 20px;
      color: #6b6b7a;
   }
   button.clo.btn0 {
       display: block;
       margin-left: auto;
       margin-top: 2%;
       margin-bottom: 2%;
       margin-right: auto;
   }
   .btn0 a{
      padding: 10px 12px!important;
   }
   .button-new{
      margin-right: auto;
      margin-left: 5px!important;
   }
</style>

  <div class="head-banner">
         <ul class="breadcrumb">
            <li>
               <a href="{{url('admin/home')}}">Home</a>
            </li>
            <li>
               <a href=""><span>{{$name}} Detail</span></a>
            </li>
         </ul>
      </div>



      <div class="page mt-4 hosting-page title1" style="display: block;">
         <div class="list1">
            <h4 class="mb-0">Courses Type</h4>

            
            <div class="btn1-main">
                <!-- <button class="btn1 delete-btn1">all delete</button> -->
                <button class="btn1"><a href="{{url('admin/add_sub_course_type_data')}}/{{$id}}" style="color:white;">ADD</a></button>
            </div>
         </div>
         <div class="sear-list">
            <div class="row">
               <div class="col-lg-12">
                  <div class="sear-main">
                    <!--  <label><input type="search" class="form-control " placeholder="Find..."></label> -->
                  </div>
               </div>
            </div>
         </div>
         <div class="pro-table table-responsive">
            <table class="table table-bordered table-striped">
               <thead>
                  <tr>
                    <!-- <th><input type="checkbox" name="" id="chkcheckAll"/></th> -->
                     <th>Sr.No</th>
                     <th>Course Name</th>
                     <th>Time Period</th>
                     <th>Date</th>
                     <th>Visibility</th>
                     <th>Action</th>
                     <th>View Detail</th>
                  </tr>
               </thead>

               @foreach($sub_course_type as $key=>$ad)
                 <tbody class="change_visibility_{{$ad->id}}">
                    <tr>
                        <!-- <td><input type="checkbox" name="ids" class="checkBoxClass" value="{{$ad->id}}"/></td> -->
                        <td>{{$key+1}}</td>
                                              
                        <td>{{$ad->name}}</td> 

                        <td>{{$ad->time_period}}</td>

                        <td>{{$ad->date}}</td>
                        <td>
                           @if($ad->active_cat == '0')

                              <button onclick="change_visibility({{$ad->id}})" class="btn-danger change_button p-2">Hide</button>

                               <button onclick="change_visibility({{$ad->id}})" class="btn-success change_button p-2" style="display:none;">show</button>

                           @else

                              <button onclick="change_visibility({{$ad->id}})" class="btn-success change_button p-2">Show</button>

                              <button onclick="change_visibility({{$ad->id}})" class="btn-danger change_button p-2" style="display:none;">Hide</button>

                           @endif

                        </td> 
                        <td>
                          <a class="icon__1" href="{{url('admin/update_sub_course_type_data')}}/{{$ad->id}}"><i class="fas fa-edit"></i></a>
                           <a  class="icon__2" onclick="delete_cs_banner_list({{$ad->id}})"><i class="fas fa-trash-alt"></i></a>

                        </td>
                        <td class="clo">
                           <button class="clo btn0"><a href="{{url('/admin/view_sub_course')}}/{{$ad->id}}">view</a></button>
                        </td>
                        
                    </tr>
                 </tbody>
               @endforeach
              
            </table>
         
         </div>
      </div>

      <div class="page mt-4 hosting-page title1" style="display: block;">
         <div class="list1">
            <h4 class="mb-0">Course Banner Details</h4>

            
            <div class="btn1-main">
                <!-- <button class="btn1 delete-btn1">all delete</button> -->
               <!--  <button class="btn1"><a href="{{url('admin/add_course_banner_image_data')}}/0" style="color:white;">ADD</a></button> -->
            </div>
         </div>
         <div class="sear-list">
            <div class="row">
               <div class="col-lg-12">
                  <div class="sear-main">
                    <!--  <label><input type="search" class="form-control " placeholder="Find..."></label> -->
                  </div>
               </div>
            </div>
         </div>
         <div class="pro-table table-responsive">
            <table class="table table-bordered table-striped">
               <thead>
                  <tr>
                    <!-- <th><input type="checkbox" name="" id="chkcheckAll"/></th> -->
                     <th>Sr.No</th>
                     <th>Image</th>
                     <th>Title</th>
                     <th>Action</th>
                  </tr>
               </thead>

               @foreach($course_banner_image as $key=>$ad)
                 <tbody class="case_studies_{{$ad->id}}">
                    <tr>
                        <!-- <td><input type="checkbox" name="ids" class="checkBoxClass" value="{{$ad->id}}"/></td> -->
                        <td>{{$key+1}}</td>
                        
                        <td>
                            <img src="/uploads/{{$ad->image}}" width="200" height="100">
                        </td>
                        <td>{{$ad->title}}</td>
                        <td>
                          <a class="icon__1" href="{{url('admin/add_course_banner_image_data')}}/{{$ad->id}}"><i class="fas fa-edit"></i></a>
                           <!-- <a class="icon__2" onclick="delete_cs_banner_list({{$ad->id}})"><i class="fas fa-trash-alt"></i></a> -->

                        </td>
                        
                    </tr>
                 </tbody>
               @endforeach
              
            </table>
         
         </div>
      </div>


      <div class="page mt-4 hosting-page title1" style="display: block;">
         <div class="list1">
            <h4 class="mb-0">{{$name}}  detail</h4>
         
         </div>
         <div class="sear-list">
            <div class="row">
               <div class="col-lg-12">
                
               </div>
            </div>
         </div>
         <div class="pro-table">
            <table class="table table-bordered table-striped text">
               <tbody class="arr_d">
               
            	@foreach($course_detail as $ab)
                        <!-- <tr class="w-100">
                          <th>Image</th>
                          <th><img src="/uploads/{{$ab->image}}" height="150" width="200"></th>
                        </tr> -->

                        <tr class="w-100">
                          <th>Title1</th>
                          <th class="text">{{$ab->title1}}</th>
                        </tr>

                        <tr class="w-100">
                          <th>Title2</th>
                          <th class="text">{{$ab->title2}}</th>
                        </tr>

                        <tr class="w-100">
                       	   <th>Description</th>
                           <th class="text">{{$ab->description}}</th>
                        </tr>

                       <!--  <tr class="w-100">
                          <th>Inner Image</th>
                          <th><img src="/uploads/{{$ab->inner_image}}" height="150" width="200"></th>
                        </tr> -->

                        <tr>
                           <th><button class="clo btn0"><a href="{{url('admin/add_course_detail_data')}}/{{$ab->id}}">update</a></button></th>
                        </tr>

                 @endforeach
               </tbody>
              
            </table>
            
         </div>
      </div>


      <div class="page mt-4 hosting-page title1" style="display: block;">
         <div class="list1">
            <h4 class="mb-0">{{$name}}  Description</h4>
         
         </div>
         <div class="sear-list">
            <div class="row">
               <div class="col-lg-12">
                
               </div>
            </div>
         </div>
         <div class="pro-table">
            <table class="table table-bordered table-striped text">
               <tbody class="arr_d">
               
               @foreach($course_description as $ab)
                        <tr class="w-100">
                          <th>Image</th>
                          <th><img src="/uploads/{{$ab->image}}" height="150" width="200"></th>
                        </tr>

                        <tr class="w-100">
                           <th>Description</th>
                           <th class="text">{!!$ab->description!!}</th>
                        </tr>

                        <tr>
                           <th><button class="clo btn0"><a href="{{url('admin/add_course_description_data')}}/{{$ab->id}}">update</a></button></th>
                        </tr>

                 @endforeach
               </tbody>
              
            </table>
            
         </div>
      </div>


      <div class="d-flex mx-auto">
      <button class="clo btn0 button-new"><a href="{{url('/admin/courser_type')}}">Back to Details</a></button>
      </div>


      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      
          
      
      <script type="text/javascript">


        $(function() {
                 setTimeout(function() { $("#hideDiv").fadeOut(3000); }, 3000)

             });
             
               function delete_cs_banner_list($id){
                
                  swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    buttons:{
                        confirm: {
                            text : 'Yes, delete it!',
                            className : 'btn btn-success'
                        },
                        cancel: {
                            visible: true,
                            className: 'btn btn-danger'
                        }
                    }
                }).then((Delete) => {
                    if (Delete) {

                               var BASE_URL = "{{ url('/') }}";
            
                                var id = $id;
            
                                      $.ajax({
            
                                        
                                            url:BASE_URL+'/admin/delete_sub_course_type/'+id,
                                            type:'GET',
                                            dataType: "json",

            
                                            success: function(response){
            
                                                  $('.case_studies_'+id).hide();
                     
                                                 },
             
                                        error: function(response) {
            
                                                 alert('error');
                      
                                            },        
                      
                                       });

                      } else {
                       swal.close();
                     }
              });

           }
           
           
           
           function change_visibility($id){
                
                  swal({
                    title: 'Are you sure?',
                    text: "Change the Visibility!",
                    type: 'warning',
                    buttons:{
                        confirm: {
                            text : 'Yes, change it!',
                            className : 'btn btn-success'
                        },
                        cancel: {
                            visible: true,
                            className: 'btn btn-danger'
                        }
                    }
                }).then((Delete) => {
                    if (Delete) {

                               var BASE_URL = "{{ url('/') }}";
            
                                var id = $id;
            
                                      $.ajax({
            
                                        
                                            url:BASE_URL+'/admin/change_visibility/'+id,
                                            type:'GET',
                                            dataType: "json",

            
                                            success: function(response){

                                                if(response.success == 1){


                                                
                                                     $('.change_visibility_' +id).find('.btn-success').hide();

                                                     $('.change_visibility_' +id).find('.btn-danger').show();

                                                   }
                                                   else{

                                                      $('.change_visibility_'+id).find('.btn-danger').hide();

                                                      $('.change_visibility_'+id).find('.btn-success').show();
                                                   }
                     
                                                 },
             
                                        error: function(response) {

                                          
                                  
                                            },        
                      
                                       });

                      } else {
                       swal.close();
                     }
              });

           }



      </script> 
   
      
@endsection