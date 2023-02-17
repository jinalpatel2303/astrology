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
               <a href=""><span>Category Detail</span></a>
            </li>
         </ul>
      </div>



      <div class="page mt-4 hosting-page title1" style="display: block;">
         <div class="list1">
            <h4 class="mb-0">Products</h4>

            
            <div class="btn1-main">
                <!-- <button class="btn1 delete-btn1">all delete</button> -->
                <button class="btn1"><a href="{{url('admin/add_product_data')}}/0" style="color:white;">ADD</a></button>
            </div>
         </div>
         <div class="sear-list">
            <div class="row">
               <div class="col-lg-12">
                  <div class="sear-main">
                    <form>
                        <label><input type="search" name="text" class="form-control" name="txtSearch" placeholder="Find..." id="search"></label>
                    </form>
                  </div>
               </div>
            </div>
         </div>
         <div class="pro-table table-responsive" id="table_data">
            @include('admin.product_search')
         
         </div>
      </div>

      

      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
           url:"/admin/search_product?page="+page,
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
                 url:"{{url('/admin/search_product')}}",
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
            
                                        
                                            url:BASE_URL+'/admin/delete_product/'+id,
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

      </script> 
   
      
@endsection