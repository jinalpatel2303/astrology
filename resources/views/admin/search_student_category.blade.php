<table class="table table-bordered table-striped" >
               <thead>
                  <tr>

                    <th><input type="checkbox" name="" id="chkcheckAll"/></th>
                  
                     <th>Course</th>
                     <th>Category</th>
                     <th>Notes</th>
                     <th>Video</th>
                     <th>status</th>
                   
                  </tr>
               </thead>

                <tbody>

                    @foreach($student_category as $sc)

                    @if($category_name==1)

                    <tr id="category_{{$sc->id}}">

                        <td><input type="checkbox" name="ids" class="checkBoxClass" value="{{$sc->id}}"/></td>
                        
                         <td>{{$sc->name}} </td>

                     

                         <td>{{$sc->category_name}}</td>

                      


                           <td><button class="btn_status" style="background-color: #df453e;"><a href="{{url('admin/add_student_notes')}}/{{$sc->id}}" style="color:white;">add</a></button>

                            <button class="btn_status" style="background-color: #df453e;"><a href="{{url('admin/view_student_notes')}}/{{$sc->id}}" style="color:white;">View</a></button>

                           </td> 
                        
                          <td><button class="btn_status" style="background-color: #df453e;"><a href="" style="color:white;">add</a></button>

                            <button class="btn_status" style="background-color: #df453e;"><a href="" style="color:white;">View</a></button>

                           </td> 

                        <td><button class="btn_status" style="background-color: #df453e;"><a href="" style="color:white;">working</a></button></td> 

                    </tr>

                   

                    @endif


                    @endforeach


                 </tbody>
              
            </table>

              {{ $student_category->links('admin.pagination') }}


      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script type="text/javascript">

        

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

                                      url:BASE_URL+'/admin/delete_course_list',
                                      type:'post',
                                      data:{

                                        ids:allids,
                                         _token: '{!! csrf_token() !!}',
                                    

                                      },

                                      success:function(response){


                                          if(response.status==200){
                                      
                                            $.each(allids,function(key,val){
                  
                                            $('#category_'+val).hide();

                                      
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
