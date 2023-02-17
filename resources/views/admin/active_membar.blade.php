@extends('admin.layout.header')

@section('content')

  <div class="head-banner">
         <ul class="breadcrumb">
            <li>
               <a href="{{url('admin/home')}}">Home</a>
            </li>
            <li>
               <a href=""><span>Active Member Data</span></a>
            </li>
         </ul>
      </div>

      <div class="page mt-4 hosting-page title1" style="display: block;">
         <div class="list1">
            <h4 class="mb-0">Active Member Data</h4>

            
            <div class="btn1-main">

               <button class="btn1 past"><a href="{{url('admin/past_member')}}" style="color:white">Past Member+</a></button>
               <button class="btn1 active"><a href="{{url('admin/member_list')}}" style="color:white">Pending Member+</a></button>
           <!--    <button class="btn1 delete">checked delete</button>-->
                <button class="btn1 export"><a href="{{ url('admin/Exportactivemember') }}" style="color:white;">Export to excel</a></button>
            </div>
         </div>
         <div class="sear-list">
            <div class="row">
               <div class="col-lg-12">
                  <div class="sear-main">
                 

                        <label><input type="search" name="text" class="form-control" name="txtSearch" placeholder="Find..." id="search" ></label>
                       
                        
                  
                    
                  </div>
               </div>
            </div>
         </div>
         <div class="pro-table table-responsive" id="table_data">

            @include('admin.active_member_search')
           

          
         
         </div>
      </div>
      <style type="text/css">
          
          button.btn_status {
    padding: 5px 15px;
    background-color: #1b3e41;
    border: 2px solid #fff;
    color: #f8f9fa;
    border-radius: 3px;
    font-weight: 600;
    /* position: absolute; */
    top: 9px;
    right: 10px;
    text-transform: uppercase;
}

.status{

    color: green;
    font-weight: 800;
}
      </style>

     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   
      
      <script type="text/javascript">


            $(document).on('click', '.pagination a', function(event){
          event.preventDefault();
          var page = $(this).attr('href').split('page=')[1];
          fetch_data(page)
;
         });

         function fetch_data(page)

         {
            let search_string = $("#search").val();
            
          $.ajax({
           url:"/admin/search_active_student?page="+page,
           method: 'GET',
           data:{search_string:search_string},
           success:function(res)
           {
            $('#table_data').html(res);
            $('#search').val(search_string);
           }
          });
         }
         
       
  


    //search product
$(document) .on('keyup',function(e){
    e.preventDefault();
     let search_string = $("#search").val();
     $.ajax({
         url:"{{url('/admin/search_active_student')}}",
         method: 'GET',
        data:{search_string:search_string},
        success:function(res){

             $('#table_data').html(res);
            if(res. status== 'nothing_found'){
                $('#table_data').html('<span class="text-danger"> '+'Nothing Found'+'</span>');
        }
    }
    });

});



        $(function() {
                 setTimeout(function() { $("#hideDiv").fadeOut(3000); }, 3000)

             });
             
               function delete_notes($id){
                
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
            
                                        
                                   url:BASE_URL+'/admin/delete_notes/'+id,
                                   type:'GET',
                                   dataType: "json",

    
                                    success: function(response){
    
                                          $('#notes_list_'+id).hide();
             
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


                $(function(e) {

               $('#chkcheckAll').click(function(){

                   $(".checkBoxClass").prop('checked', $(this).prop('checked'));

               });

              $('.delete-btn1').click(function(e){

                 $.ajaxSetup({
                   headers: {
                     'X-CSSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                         }
                    });


                   var BASE_URL = "{{ url('/') }}";

                      e.preventDefault();    

                      var allids=[];

                      console.log(allids);


                      $("input:checkbox[name=ids]:checked").each(function(){

                         allids.push($(this).val());

                        
                      });


                 if(allids !=''){



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

                               alert(BASE_URL);
            
                                $.ajax({

                                      url:BASE_URL+'/admin/delete_all_list',
                                      type:'post',
                                      data:{

                                        ids:allids,
                                         _token: '{!! csrf_token() !!}',
                                    

                                      },

                                      success:function(response){


                                          if(response.status==200){
                                      
                                            $.each(allids,function(key,val){
                  
                                            $('#notes_list_'+val).hide();

                                      
                                            });
                                            
                                                                        
                                          }
                                          else{
                                              alert(response.message)
                                          }

                                       }

                                    });

                             } else {

                            swal.close();
                        }
                   });


               


                          }

                    });
                

               });



 
</script>

 

@endsection