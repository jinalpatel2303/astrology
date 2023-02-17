@extends('admin.layout.header')

@section('content')

  <div class="head-banner">
         <ul class="breadcrumb">
            <li>
               <a href="{{url('admin/home')}}">Home</a>
            </li>
            <li>
               <a href="#"><span>Student Alumni Detail</span></a>
            </li>
         </ul>
      </div>

      <div class="page mt-4 hosting-page title1" style="display: block;">
         <div class="list1">
            <h4 class="mb-0">Details</h4>

            
            <div class="btn1-main">
                <!-- <button class="btn1 delete-btn1">all delete</button> -->
                <button class="btn1"><a href="{{url('admin/add_student_alumni_data')}}/0" style="color:white;">ADD</a></button>
            </div>
         </div>
         <div class="sear-list">
            <div class="row">
               <div class="col-lg-2">
                  <div class="sear-main">
                    <!--  <label><input type="search" class="form-control " placeholder="Find..."></label> -->
                    <select name="course" id="search">
                        <option value="">Select Course</option>
                        @foreach($course_master as $cm)
                        <option value="{{$cm->id}}">{{$cm->name}}</option>
                        @endforeach
                    </select>
                  </div>
               </div>
            </div>
         </div>
         <div class="pro-table table-responsive" id="table_data">
            @include('admin.student_alumni_data')
         
         </div>
      </div>

      <style type="text/css">
         .set_width{

            height: 200px;
            width: 200px;
            object-fit: cover;
         }
         select#search {
            width: 100%;
            padding: 5px;
            border: 1px solid #ffba33;
        }
      </style>
      
      
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
            
                                        
                                            url:BASE_URL+'/admin/delete_student_alumni/'+id,
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





           $(document).on('click', '.pagination a', function(event){
          event.preventDefault();
          var page = $(this).attr('href').split('page=')[1];
          fetch_data(page);
         });

         function fetch_data(page)
         {
            let search_string = $("#search").val();
            
          $.ajax({
           url:"/admin/filter_student_alumni?page="+page,
           method: 'GET',
           data:{search_string:search_string},
           success:function(res)
           {
            $('#table_data').html(res);
            $('#search').val(search_string);
           },
          });
         }
         
       
  


    //search product
$(document) .on('change',function(e){
    e.preventDefault();
     let search_string = $("#search").val();

     $.ajax({
         url:"{{url('/admin/filter_student_alumni')}}",
         method: 'GET',
        data:{search_string:search_string},
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