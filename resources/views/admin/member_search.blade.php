 <table class="table table-bordered table-striped" >
               <thead>
                  <tr>
                    <th><input type="checkbox" name="" id="chkcheckAll"/></th>
                  
                     <th>Date</th>
                     <th>Name</th>
                     <th>Enrollment</th>
                     <th>Add Category</th>
                     <th>Status</th>
                     <th>Student Account</th>
                    <!-- <th>Course Complete</th>-->
                     <th>Action</th>
                  </tr>
               </thead>

                <tbody>

                    @foreach($panding_student as $ps)

                    <tr class="panding_{{$ps->r_id}}">

                        <td><input type="checkbox" name="ids" class="checkBoxClass" value="{{$ps->r_id}}"/></td>
                        <td> 
                            <?php

                             echo date('d-m-Y', strtotime($ps->date));

                            ?>
                         </td>
                         <td>{{$ps->fname}} {{$ps->lname}}</td>
                         <td></td>

                          <td></td>

                        
                         <td><div id="loading-bar-spinner" class="spinner"><div class="spinner-icon"></div></div> <button class="btn_status" onclick="change_status({{$ps->r_id}})"><a style="color:white;">pending</a></button> </td> 

                        <td> <a href="" >Still Not Approved</a> </td> 

                     <!--   <td> <button class="btn_status"><a href="" style="color:white;">no</a></button> </td> -->

                        <td>
                          <a class="icon__1" href="{{url('admin/member_detail')}}/{{$ps->r_id}}"><i class="fa-solid fa-eye"></i></a>
                          <a class="icon__1" href="{{url('admin/edit_panding_member')}}/{{$ps->r_id}}"><i class="fas fa-edit"></i></a>
                           <a class="icon__2" onclick="delete_panding_student({{$ps->r_id}})"><i class="fas fa-trash-alt"></i></a>

                        </td>


                    </tr>


                    @endforeach



                 </tbody>


              
            </table>

              {{ $panding_student->links('admin.pagination') }}
              <style type="text/css">

        #myModal{

          top: 100px;
          text-align: center;
        }

     .login-inner{
        position: relative;
      }

.login-inner:after{
       content: '';
    position: absolute;
    top: 0;
    left: 0;
    z-index: 1;
    width: 100%;
    height: 100%;
    background: rgb(0 0 0 / 40%);
    display: none;

}
      

  #loading-bar-spinner.spinner {
   left: 50%;
   margin-left: -20px;
   top: 44%;
   margin-top: -20px;
   position: absolute;
   z-index: 19 !important;
   animation: loading-bar-spinner 700ms linear infinite;
   display: none;
}
 #loading-bar-spinner.spinner .spinner-icon {
   width: 40px;
   height: 40px;
   border: solid 6px transparent;
   border-top-color: black !important;
   border-left-color: black !important;
   border-radius: 50%;
}
 @keyframes loading-bar-spinner {
   0% {
     transform: rotate(0deg);
     transform: rotate(0deg);
  }
   100% {
     transform: rotate(360deg);
     transform: rotate(360deg);
  }
}
 
        

      </style>


      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script type="text/javascript">

          function change_status($id){
                
                  swal({
                    title: 'Are you sure?',
                    text: "Are you want to change Status!",
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


            
                                        
                                   url:BASE_URL+'/admin/change_status/'+id,
                                   type:'GET',
                                   dataType: "json",
                                   
                                   beforeSend: function(){

                            $('#loading-bar-spinner').show();
 
                             $('#overlay').fadeIn()
                             
                         

                           },

                        complete: function(){
                            
                         

                           $('#loading-bar-spinner').hide();
 
                         },

    
                                    success: function(response){
    
                                          $('.panding_'+id).hide();
             
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


                 function delete_panding_student($id){
                
                  swal({
                    title: 'Are you sure?',
                    text: "Are you want to delete student!",
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

                                        
                                   url:BASE_URL+'/admin/delete_panding_student/'+id,
                                   type:'GET',
                                   dataType: "json",

    
                                    success: function(response){
    
                                          $('.panding_'+id).hide();
             
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

              $('.delete').click(function(e){

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

                                $.ajax({

                                      url:BASE_URL+'/admin/delete_panding_all_student',
                                      type:'post',
                                      data:{

                                        ids:allids,
                                         _token: '{!! csrf_token() !!}',
                                    

                                      },

                                      success:function(response){


                                          if(response.status==200){
                                      
                                            $.each(allids,function(key,val){
                  
                                            $('.panding_'+val).hide();

                                      
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



