@extends('admin.layout.header')

@section('content')

  <div class="head-banner">
         <ul class="breadcrumb">
            <li>
               <a href="{{url('admin/home')}}">Home</a>
            </li>
            <li>
               <a href="index.html"><span>Home Demo Detail</span></a>
            </li>
         </ul>
      </div>

      <div class="page mt-4 hosting-page title1" style="display: block;">
         <div class="list1">
            <h4 class="mb-0">Home Demo Detail</h4>
         
         </div>
         <div class="sear-list">
            <div class="row">
               <div class="col-lg-12">
                
               </div>
            </div>
         </div>
         <div class="pro-table table-responsive">
            <table class="table table-bordered table-striped text">

            	@foreach($home_demo as $id)

                  <tr>
                     <th>Image</th>
                  </tr>

                  <tr>
                     <th><div class="set_width"><img src="/uploads/{{$id->image}}" class="w-100"></div></th>
                  </tr>


                  <tr>
                     <th>Title1</th>
                  </tr>

                  <tr>
                     <th class="text">{{$id->title1}}</th>
                  </tr>



                  <tr>
                     <th>Title2</th>
                  </tr>

                  <tr>
                     <th class="text">{{$id->title2}}</th>
                  </tr>



                  <tr>
                     <th>Title3</th>
                  </tr>

                  <tr>
                     <th class="text">{{$id->title3}}</th>
                  </tr>
                  

                  <tr>
               	   <th><button class="clo btn0"><a href="{{url('admin/add_home_demo_data')}}/{{$id->id}}">update</a></button></th>  
                  </tr>

                 @endforeach
                    
              
            </table>
            
         </div>
      </div>

      <style type="text/css">
         .set_width{

            height: 200px;
            width: 200px;
            object-fit: cover;
         }
      </style>


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

                                url:BASE_URL+'/admin/delete_home_faq/'+id,
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