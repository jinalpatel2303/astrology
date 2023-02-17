@extends('admin.layout.header')

@section('content')

  <div class="head-banner">
         <ul class="breadcrumb">
            <li>
               <a href="{{url('admin/home')}}">Home</a>
            </li>
            <li>
               <a href=""><span>Order list</span></a>
            </li>
         </ul>
      </div>

      <div class="page mt-4 hosting-page title1" style="display: block;">
         <div class="list1">
            <h4 class="mb-0">Order list</h4>

              <div class="btn1-main">

                @if($order_status_id==0)

               <button class="btn1 past"><a href="{{url('admin/order_list')}}/1" style="color:white">Complete Order</a></button>
             <!--   <button class="btn1 active"><a href="{{url('admin/member_list')}}" style="color:white">Pending Member+</a></button> -->

             @elseif($order_status_id==1)


                <button class="btn1 past"><a href="{{url('admin/order_list')}}/0" style="color:white">Pending Order</a></button>


             @endif
           
            </div>

            
          
         </div>
         <div class="sear-list">
            <div class="row">
               <div class="col-lg-12">
                  <div class="sear-main">
                    <form>

                        <label><input type="search" name="text" id="search" class="form-control" name="txtSearch" placeholder="Find..." ></label>
                         <!-- <button class="btn1">search</button> -->

                         <input type="hidden" name="order_status_id" id="order_status_id" value="{{$order_status_id}}">
                        
                    </form>
                    
                  </div>
               </div>
            </div>
         </div>
         <div class="pro-table table-responsive" id="table_data">
            
            @include('admin.order_search')
         </div>
      </div>


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

           let order_status_id= $("#order_status_id").val();
            
          $.ajax({
           url:"/admin/search_order?page="+page,
           method: 'GET',
           data:{search_string:search_string,order_status_id:order_status_id},
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

     let order_status_id= $("#order_status_id").val();

     $.ajax({
         url:"{{url('/admin/search_order')}}",
         method: 'GET',
        data:{search_string:search_string, order_status_id:order_status_id},
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
             
               function change_order_status($id){
                
                  swal({
                    title: 'Are you sure?',
                    text: "You  want to change oder status panding to success !!",
                    type: 'warning',
                    buttons:{
                        confirm: {
                            text : 'Yes, i want!',
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
            
                                        
                                   url:BASE_URL+'/admin/change_order_status/'+id,
                                   type:'GET',
                                   dataType: "json",

    
                                    success: function(response){
    
                                          $('#order_list_'+id).hide();
             
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