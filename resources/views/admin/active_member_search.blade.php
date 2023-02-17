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
                     <th>Course Complete</th>
                     <th>Action</th>
                  </tr>
               </thead>

                <tbody>

                    @foreach($active_student_data as $ps)

                    <tr class="active_{{$ps->student_id}}">

                        <td><input type="checkbox" name="ids" class="checkBoxClass" value="{{$ps->id}}"/></td>
                        <td> 
                            <?php

                             echo date('d-m-Y', strtotime($ps->date));

                            ?>
                         </td>
                         <td>{{$ps->fname}} {{$ps->lname}}</td>
                         <td>{{$ps->enrollment}}</td>

                          <td><button class="btn_status"><a href="{{url('admin/student_category')}}/{{$ps->student_id}}"style="color: white;">add category</a></button> </td>

                        
                         <td> <button class="btn_status" onclick="change_status({{$ps->student_id}})"><a style="color:white;">Approved</a></button> </td> 

                        <td> <a href=""  class="status">Valid</a> </td> 

                       <td> <button class="btn_status"  id="course_status_{{$ps->student_id}}"  onclick="course_status({{$ps->student_id}})" style="background-color: #df453e"; ><a style="color:white;">no</a></button> </td> 


                        <td>
                          <a class="icon__1" href="{{url('admin/member_detail')}}/{{$ps->student_id}}"><i class="fa-solid fa-eye"></i></a>
                        <a class="icon__1" href="{{url('admin/edit_active_member')}}/{{$ps->id}}"><i class="fas fa-edit"></i></a>
                       <!--    <a class="icon__2" onclick="delete_notes({{$ps->id}})"><i class="fas fa-trash-alt"></i></a>-->

                        </td>

                           </tr>
                


                    @endforeach



                 </tbody>


              
            </table>

              {{ $active_student_data->links('admin.pagination') }}



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
            
                                        
                                   url:BASE_URL+'/admin/active_panding/'+id,
                                   type:'GET',
                                   dataType: "json",

    
                                    success: function(response){
    
                                          $('.active_'+id).hide();
             
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
              
              
                function course_status($id){
                
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
            
                                        
                                   url:BASE_URL+'/admin/course_status/'+id,
                                   type:'GET',
                                   dataType: "json",

    
                                    success: function(response){
    
                                          $('.active_'+id).hide();
             
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