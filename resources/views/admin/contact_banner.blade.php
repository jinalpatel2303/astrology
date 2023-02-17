@extends('admin.layout.header')

@section('content')

  <div class="head-banner">
         <ul class="breadcrumb">
            <li>
               <a href="{{url('admin/home')}}">Home</a>
            </li>
            <li>
               <a href=""><span>Contact Detail</span></a>
            </li>
         </ul>
      </div>

   


      <div class="page mt-4 hosting-page title1" style="display: block;">
         <div class="list1">
            <h4 class="mb-0">Contact Banner Details</h4>

            
            <div class="btn1-main">
                <!-- <button class="btn1 delete-btn1">all delete</button> -->
                <!-- <button class="btn1"><a href="{{url('admin/add_banner_image_data')}}/0" style="color:white;">ADD</a></button> -->
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

               @foreach($contact_banner as $key=>$ad)
                 <tbody class="case_studies_{{$ad->id}}">
                    <tr>
                        <!-- <td><input type="checkbox" name="ids" class="checkBoxClass" value="{{$ad->id}}"/></td> -->
                        <td>{{$key+1}}</td>
                        
                        <td>
                            <img src="/uploads/{{$ad->image}}" width="200" height="100">
                        </td>
                        <td>{{$ad->title}}</td>
                        <td>
                          <a class="icon__1" href="{{url('admin/add_banner_image_data')}}/{{$ad->id}}"><i class="fas fa-edit"></i></a>
                           <!-- <a class="icon__2" onclick="delete_cs_banner_list({{$ad->id}})"><i class="fas fa-trash-alt"></i></a> -->

                        </td>
                        
                    </tr>
                 </tbody>
               @endforeach
              
            </table>
         
         </div>
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

                                url:BASE_URL+'/admin/delete_home_banner/'+id,
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