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

               @foreach($sub_course_banner_image as $key=>$ad)
                 <tbody class="case_studies_{{$ad->id}}">
                    <tr>
                        <!-- <td><input type="checkbox" name="ids" class="checkBoxClass" value="{{$ad->id}}"/></td> -->
                        <td>{{$key+1}}</td>
                        
                        <td>
                            <img src="/uploads/{{$ad->image}}" width="200" height="100">
                        </td>
                        <td>{{$ad->title}}</td>
                        <td>
                          <a class="icon__1" href="{{url('admin/add_sub_course_banner_image_data')}}/{{$ad->id}}"><i class="fas fa-edit"></i></a>
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
               
            	@foreach($sub_course_detail as $ab)
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

                        <tr>
                           <th><button class="clo btn0"><a href="{{url('admin/add_sub_course_detail_data')}}/{{$ab->id}}">update</a></button></th>
                        </tr>

                 @endforeach
               </tbody>
              
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
               
               @foreach($sub_course_description as $ab)
                        

                        <tr class="w-100">
                          <th>Image</th>
                          <th><img src="/uploads/{{$ab->image}}" height="150" width="200"></th>
                        </tr>

                        <tr class="w-100">
                           <th>Description</th>
                           <th class="text">{!!$ab->description!!}</th>
                        </tr>

                        <tr>
                           <th><button class="clo btn0"><a href="{{url('admin/add_sub_course_description_data')}}/{{$ab->id}}">update</a></button></th>
                        </tr>

                 @endforeach
               </tbody>
              
            </table>
            
         </div>
      </div>



      <div class="d-flex mx-auto">
      <button class="clo btn0 button-new"><a href="{{url('/admin/view_course')}}/{{$course_id}}">Back to Details</a></button>
      </div>



   
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.js"></script>
      <script type="text/javascript">


        $(function() {
                 setTimeout(function() { $("#hideDiv").fadeOut(3000); }, 3000)

             });

        function delete_cs_banner_list($id){


               swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                 
                    buttons: true,
                    dangerMode: true,
                  })
                  .then((willDelete) => {
                    if (willDelete) {

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
                     
                    }
                  });
      


      } 


      </script> 


@endsection