@extends('student.layout.header')

@section('content')

  <div class="head-banner">
         <ul class="breadcrumb">
            <li>
               <a href="{{url('/student/home')}}/{{Auth::id()}}">Home</a>
            </li>
            <li>
               <a href=""><span>Notes Detail</span></a>
            </li>
         </ul>
      </div>

   


      <div class="page mt-4 hosting-page title1" style="display: block;">
         <div class="list1">
            <h4 class="mb-0">Notes Details</h4>

            
            <div class="btn1-main">
                <!-- <button class="btn1 delete-btn1">all delete</button> -->
                <form>
                    <label><input type="search" name="text" class="form-control" placeholder="Find..." id="search"></label>
                    <label><input type="hidden" id="id" name="id" class="form-control" placeholder="Find..." value="{{$member_course_category_id}}"></label>
                </form>
                <button class="btn1"><a href="{{url('/student/notes_videos')}}/{{Auth::id()}}" style="color:white;">Back</a></button>
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
         <div class="pro-table table-responsive" id="table_data">
            @include('student.search_notes')
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




           $(document).on('click', '.pagination a', function(event){
          event.preventDefault();
          var page = $(this).attr('href').split('page=')[1];
          fetch_data(page);
         });

         function fetch_data(page)
         {
            let search_string = $("#search").val();
            var id = $("#id").val();
            
          $.ajax({
           url:"/student/search_notes/{{$member_course_category_id}}?page="+page,
           method: 'GET',
           data:{search_string:search_string,id:id,},
           success:function(res)
           {
            $('#table_data').html(res);
            $('#search').val(search_string);
           },
          });
         }
         
       
  


        //search product
    $(document) .on('keyup',function(e){
        e.preventDefault();
         let search_string = $("#search").val();
         var id = $("#id").val();

         $.ajax({
             url:"{{url('/student/search_notes')}}/{{$member_course_category_id}}",
             method: 'GET',
            data:{search_string:search_string,id:id,},
            success:function(res){

                 $('#table_data').html(res);
                 $('#search').val(search_string);
                if(res. status== 'nothing_found'){
                    $('#table_data').html('<span class="text-danger"> '+'Nothing Found'+'</span>');
            }
            },
            error:function(){

                alert(11);
            }
        });

    });
      

      </script> 


@endsection