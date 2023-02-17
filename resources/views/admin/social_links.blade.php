@extends('admin.layout.header')

@section('content')

  <div class="head-banner">
         <ul class="breadcrumb">
            <li>
               <a href="{{url('admin/home')}}">Home</a>
            </li>
            <li>
               <a href="index.html"><span>Social Links</span></a>
            </li>
         </ul>
      </div>

      <div class="page mt-4 hosting-page title1" style="display: block;">
         <div class="list1">
            <h4 class="mb-0">Social Links</h4>
         
         </div>
         <div class="sear-list">
            <div class="row">
               <div class="col-lg-12">
                
               </div>
            </div>
         </div>
         <div class="pro-table table-responsive">
            <table class="table table-bordered table-striped text">

            	@foreach($social_links as $id)
           
                  <tr>
                    
                     <th>facebook_url</th>

                 </tr>

                 <tr>

                 	<th class="text"><a href="{{$id->facebook_url}}">{{$id->facebook_url}}</a></th>

                 </tr>



                 <tr>
                    
                     <th>twitter_url</th>

                 </tr>

                 <tr>

                   <th class="text"><a href="{{$id->twitter_url}}">{{$id->twitter_url}}</a></th> 

                 </tr>



                 <tr>
                    
                     <th>linkedin_url</th>

                 </tr>

                 <tr>

                    <th class="text"><a href="{{$id->linkedin_url}}">{{$id->linkedin_url}}</a></th> 

                 </tr>



                 <tr>
                    
                     <th>instagram_url</th>

                 </tr>

                 <tr>

                   <th class="text"><a href="{{$id->instagram_url}}">{{$id->instagram_url}}</a></th>  

                 </tr>

                  <tr>

                  	 <th><button class="clo btn0"><a href="{{url('admin/add_social_links_data')}}/{{$id->id}}">update</a></button></th>  
                  	

                  </tr>

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


         function delete_industries($id){


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

                                url:BASE_URL+'/admin/delete_industries/'+id,
                                type:'GET',
                                dataType: "json",

                                success: function(response){
        
                                     $('.industries_'+id).hide();
         
   
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