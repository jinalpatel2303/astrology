@extends('admin.layout.header')

@section('content')

  <div class="head-banner">
         <ul class="breadcrumb">
            <li>
               <a href="{{url('admin/home')}}">Home</a>
            </li>
            <li>
               <a href=""><span>Notes details</span></a>
            </li>
         </ul>
      </div>

   


      <div class="page mt-4 hosting-page title1" style="display: block;">
         <div class="list1">
            <h4 class="mb-0">Notes details</h4>

            
            <div class="btn1-main">
                <button class="btn1 delete-btn1">all delete</button>
            <!--     <button class="btn1"><a href="{{url('admin/add_blog_detail_data')}}/0" style="color:white;">ADD</a></button> -->
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
         <div class="pro-table table-responsive">
            <table class="table table-bordered table-striped">
               <thead>
                  <tr>
                    <th><input type="checkbox" name="" id="chkcheckAll"/></th>
                    
                     <th>Notes title</th>
                     <th>Notes View</th>
                     <th>Start Date</th>
                     <th>End Date</th>  
                     <th>Action</th>
                    
                  </tr>
               </thead>

               @foreach($student_notes as $sn)
                 <tbody id="student_{{$sn->id}}" class="connected-sortable">
                    <tr>
                        <td><input type="checkbox" name="ids" class="checkBoxClass" value="{{$sn->id}}"/></td>
                      
                        <td>{{$sn->notes_title}}</td>
                        <td> <a id="moo" href="/uploads/notes/{{$sn->upload}}#toolbar=0">{{$sn->upload}}</a></td>
                        <td>{{$sn->start_date}}</td>

                       <td>{{$sn->end_date}}</td>
                        
                        <td>
                         
                        <a class="icon__2" onclick="delete_student_note({{$sn->id}})"><i class="fas fa-trash-alt"></i></a>

                        </td>
                       
                        
                    </tr>
                 </tbody>
               @endforeach
              
            </table>
             {{ $student_notes->links('pagination') }}
         
         </div>
      </div>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      
      <script type="text/javascript">

        $(function() {
                 setTimeout(function() { $("#hideDiv").fadeOut(3000); }, 3000)

             });

               function delete_student_note($id){
                
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
                          
                                   url:BASE_URL+'/admin/delete_student_note/'+id,
                                   type:'GET',
                                   dataType: "json",

                                    success: function(response){
    
                                          $('#student_'+id).hide();
             
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

            
                                $.ajax({

                                      url:BASE_URL+'/admin/delete_all_student_note',
                                      type:'post',
                                      data:{

                                        ids:allids,
                                         _token: '{!! csrf_token() !!}',
                                    

                                      },

                                      success:function(response){


                                          if(response.status==200){
                                      
                                            $.each(allids,function(key,val){
                  
                                            $('#student_'+val).hide();

                                      
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