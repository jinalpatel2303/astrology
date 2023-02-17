<table class="table table-bordered table-striped" >
               <thead>
                  <tr>

                    <th><input type="checkbox" name="" id="chkcheckAll"/></th>
                  
                     <th>Date</th>
                     <th>Name</th>
                     <th>Enrollment</th>
                     <th>UserName</th>
                     <th>Password</th>
                     <th>Email</th>
                     <th>Mobile</th>
                     <th>Action</th>
                   
                  </tr>
               </thead>

                <tbody>

                    @foreach($past_student_data as $ps)

                    <tr id="past_{{$ps->id}}">

                        <td><input type="checkbox" name="ids" class="checkBoxClass" value="{{$ps->id}}"/></td>
                        <td> 
                            <?php

                             echo date('d-m-Y', strtotime($ps->date));

                            ?>
                         </td>
                         <td>{{$ps->fname}} {{$ps->lname}}</td>
                         <td>{{$ps->enrollment}}</td>

                          <td>{{$ps->username}}</td>

                        
                         <td>{{$ps->password}}</td> 

                        <td>{{$ps->email}}</td> 

                        <td>{{$ps->mobile}}</td> 

                  

                         <td> <button class="btn_status"  id="change_past_status{{$ps->student_id}}"  onclick="change_past_status({{$ps->id}})" style="background-color: #df453e"; ><a style="color:white;">Active</a></button> </td> 


                    

                    </tr>


                    @endforeach



                 </tbody>


              
            </table>

              {{ $past_student_data->links('admin.pagination') }}



     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script type="text/javascript">

        function change_past_status($id){
                
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


         
                                   url:BASE_URL+'/admin/change_past_status/'+id,
                                   type:'GET',
                                   dataType: "json",

    
                                    success: function(response){
    
                                          $('#past_'+id).hide();
             
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


